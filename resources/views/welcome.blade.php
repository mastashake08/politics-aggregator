<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="All Around Politics" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{url('/')}}" />
        <meta property="og:description" content="Political news from left, right, and center points-of-view all aggregated in one spot. Create an account today and get daily newsletters." />

        <title>All Around Politics</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
        <script>

        function notifyMe(message,link) {
          // Let's check if the browser supports notifications
          if (!("Notification" in window)) {
            alert("This browser does not support desktop notification");
          }

          // Let's check whether notification permissions have already been granted
          else if (Notification.permission === "granted") {
            // If it's okay let's create a notification
            if (permission === "granted") {
              var options = {
                data: {
                  url:link,
                }
              };
              var notification = new Notification(message,options);
              notification.onclick = function(event) {
              event.preventDefault(); // prevent the browser from focusing the Notification's tab
              window.open("https://politics.socketdroid.com/articles/"+link, '_blank');
            }
            }
          }

          // Otherwise, we need to ask the user for permission
          else if (Notification.permission !== 'denied') {
            Notification.requestPermission(function (permission) {
              // If the user accepts, let's create a notification
              if (permission === "granted") {
                var options = {
                  data: {
                    url:link,
                  }
                };
                var notification = new Notification(message,options);
                notification.onclick = function(event) {
                event.preventDefault(); // prevent the browser from focusing the Notification's tab
                window.open("https://politics.socketdroid.com/articles/"+link, '_blank');
              }
              }
            });
          }

          // At last, if the user has denied notifications, and you
          // want to be respectful there is no need to bother them any more.
          }
          // Let's check if the browser supports notifications
          if (!("Notification" in window)) {
            alert("This browser does not support desktop notification");
          }

          // Let's check whether notification permissions have already been granted
          else if (Notification.permission === "granted") {
            // If it's okay let's create a notification

          }

          // Otherwise, we need to ask the user for permission
          else if (Notification.permission !== 'denied') {
            Notification.requestPermission(function (permission) {

            });
          }
          var socket = io.connect("https://politics.socketdroid.com:6002");
          socket.on('new-article',function(data){
            notifyMe(data.title,data.url);
          });
        </script>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    All Around Politics
                </div>

                <div class="links">
                    <a href="/articles">Articles</a>
                </div>
            </div>
        </div>
    </body>
</html>
