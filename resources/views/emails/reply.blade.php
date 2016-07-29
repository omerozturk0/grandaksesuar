<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>

    <h2>{{ $subject }}</h2>

    <div>
        {!! $content !!}
        <br/>
        <br/>
        Sitemizi ziyaret etmeyi unutmayınız: <a href="{{ url('/') }}">{{ $site_title }}</a><br/>

    </div>

</body>
</html>