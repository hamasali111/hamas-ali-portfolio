<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  *{margin:0;padding:0;box-sizing:border-box}
  body{font-family:Arial,sans-serif;background:#f0f4f8;padding:20px}
  .wrap{max-width:600px;margin:0 auto}
  .header{background:linear-gradient(135deg,#6366f1,#4f46e5);border-radius:16px 16px 0 0;padding:36px 32px;text-align:center}
  .header img{width:48px;height:48px;margin-bottom:12px}
  .header h1{color:#fff;font-size:22px;font-weight:700;margin-bottom:4px}
  .header p{color:rgba(255,255,255,0.75);font-size:14px}
  .body{background:#fff;padding:36px 32px}
  .greeting{font-size:16px;color:#1e293b;margin-bottom:20px;font-weight:500}
  .msg{font-size:15px;color:#334155;line-height:1.8;white-space:pre-wrap;background:#f8fafc;border-left:3px solid #6366f1;border-radius:0 8px 8px 0;padding:16px 20px;margin:20px 0}
  .sig{font-size:13px;color:#64748b;margin-top:24px;padding-top:20px;border-top:1px solid #e2e8f0}
  .footer{background:#f8fafc;border-radius:0 0 16px 16px;padding:20px 32px;text-align:center;font-size:12px;color:#94a3b8;border-top:1px solid #e2e8f0}
  .footer a{color:#6366f1;text-decoration:none}
</style>
</head>
<body>
<div class="wrap">
  <div class="header">
    <h1>📬 Message from Portfolio</h1>
    <p>You received a reply to your contact request</p>
  </div>
  <div class="body">
    <p class="greeting">Hi {{ $data['to_name'] }},</p>
    <div class="msg">{{ $data['message'] }}</div>
    <div class="sig">
      <strong>{{ $data['from_name'] }}</strong><br>
      {{ $data['from_title'] ?? '' }}<br>
      <a href="mailto:{{ $data['from_email'] }}">{{ $data['from_email'] }}</a>
    </div>
  </div>
  <div class="footer">
    This is a reply to your message sent via the portfolio contact form.<br>
    You can reply directly to <a href="mailto:{{ $data['from_email'] }}">{{ $data['from_email'] }}</a>
  </div>
</div>
</body>
</html>
