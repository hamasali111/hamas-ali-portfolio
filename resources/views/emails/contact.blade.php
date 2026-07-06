<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
  body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
  .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
  .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; text-align: center; }
  .header h1 { margin: 0; font-size: 24px; }
  .body { padding: 30px; }
  .field { margin-bottom: 20px; }
  .field label { font-weight: bold; color: #6366f1; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 5px; }
  .field p { margin: 0; color: #333; font-size: 15px; background: #f9f9f9; padding: 10px 14px; border-radius: 6px; border-left: 3px solid #6366f1; }
  .footer { background: #f9f9f9; padding: 20px 30px; text-align: center; color: #888; font-size: 13px; border-top: 1px solid #eee; }
</style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>📬 New Portfolio Message</h1>
      <p style="margin:8px 0 0; opacity:0.85;">Someone reached out via your portfolio contact form</p>
    </div>
    <div class="body">
      <div class="field">
        <label>Name</label>
        <p>{{ $data['name'] }}</p>
      </div>
      <div class="field">
        <label>Email</label>
        <p>{{ $data['email'] }}</p>
      </div>
      @if(!empty($data['subject']))
      <div class="field">
        <label>Subject</label>
        <p>{{ $data['subject'] }}</p>
      </div>
      @endif
      <div class="field">
        <label>Message</label>
        <p style="white-space: pre-wrap; line-height: 1.6;">{{ $data['message'] }}</p>
      </div>
    </div>
    <div class="footer">
      <p>This message was sent from your portfolio website &bull; Reply directly to <strong>{{ $data['email'] }}</strong></p>
    </div>
  </div>
</body>
</html>
