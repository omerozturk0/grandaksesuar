<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Verify Your Email Address</h2>

<div>
    Thanks for creating an account with the verification demo app.
    Please follow the link below to verify your email address.
    <br/>
    <br/>
    <br/>
    <a href="{{ url('user/verify/'.$code) }}">{{ url('user/verify/'.$code) }}</a>.<br/>

</div>

</body>
</html>