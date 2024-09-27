
{{-- email template --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Reset password link</h1>
    <p>click the link below to reset password</p>
    <a href="{{route('user.resetPassword',$token)}}">Reset Password</a>
  
    
</body>
</html>