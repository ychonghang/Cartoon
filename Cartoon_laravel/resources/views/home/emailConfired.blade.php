<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>邮件确认</title>
</head>
<body>
        <h1>你好，请确认你的邮件验证</h1>
        <a href="{{url('/verify',$confirmed_code)}}">点击确认</a>
</body>
</html>