<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ReplyMail;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $messages       = Message::latest()->get();
        $replyTemplate  = Setting::get('reply_template', "Thank you for reaching out!\n\nI've received your message and will get back to you as soon as possible, usually within 24 hours.\n\nBest regards,");
        $fromName       = Setting::get('name', 'Portfolio Admin');
        $fromTitle      = Setting::get('title', '');
        $fromEmail      = Setting::get('email', config('mail.from.address', ''));

        Message::where('is_read', false)->update(['is_read' => true]);

        return view('admin.messages.index', compact('messages', 'replyTemplate', 'fromName', 'fromTitle', 'fromEmail'));
    }

    public function reply(Request $request, Message $message)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'body'    => 'required|string|max:5000',
        ]);

        try {
            Mail::to($message->email)->send(new ReplyMail([
                'to_name'    => $message->name,
                'subject'    => $request->subject,
                'message'    => $request->body,
                'from_name'  => Setting::get('name', 'Portfolio Admin'),
                'from_title' => Setting::get('title', ''),
                'from_email' => Setting::get('email', config('mail.from.address', '')),
            ]));

            $message->update(['is_replied' => true]);
            return redirect()->route('admin.messages.index')->with('success', "Reply sent to {$message->name} ({$message->email}) successfully!");
        } catch (\Throwable $e) {
            return redirect()->route('admin.messages.index')->with('error', 'Failed to send reply: ' . $e->getMessage() . '. Check your mail settings in .env.');
        }
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted.');
    }
}
