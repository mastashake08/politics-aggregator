<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="manifest" href="manifest.json">

<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="msapplication-starturl" content="/">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="icon" href="/images/icons/icon-72x72.png">
<link rel="icon" href="/images/icons/icon-96x96.png">
<link rel="icon" href="/images/icons/icon-128x128.png">
<link rel="icon" href="/images/icons/icon-144x144.png">
<link rel="icon" href="/images/icons/icon-152x152.png">
<link rel="icon" href="/images/icons/icon-192x192.png">
<link rel="icon" href="/images/icons/icon-384x384.png">
<link rel="icon" href="/images/icons/icon-512x512.png">
<link rel="apple-touch-icon" href="/images/icons/icon-128x128.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="@yield('url')" />
    <meta property="og:description" content="@yield('description')" />

    <meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@mastashake08"/>
<meta name="twitter:title" content="@yield('title')" />
<meta name="twitter:description" content="@yield('description')" />
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-68044308-3', 'auto');
  ga('send', 'pageview');

</script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
    <div id="app">


        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
