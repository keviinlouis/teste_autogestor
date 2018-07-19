<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=utf-8>
    <meta http-equiv=X-UA-Compatible content="IE=edge">
    <meta name=viewport content="width=device-width,initial-scale=1">
    <title>autogertor_frontend</title>
    <link rel=icon type=image/png sizes=32x32 href={{asset('/static/img/icons/favicon-32x32.png')}}>
    <link rel=icon type=image/png sizes=16x16 href={{asset('/static/img/icons/favicon-16x16.png')}}>
    <!--[if IE]>
    <link rel="shortcut icon" href="{{asset('/static/img/icons/favicon.ico')}}"><![endif]-->
    <link rel=manifest href={{asset('/static/manifest.json')}}>
    <meta name=theme-color content=#4DBA87>
    <meta name=apple-mobile-web-app-capable content=yes>
    <meta name=apple-mobile-web-app-status-bar-style content=black>
    <meta name=apple-mobile-web-app-title content=autogertor_frontend>
    <link rel=apple-touch-icon href={{asset('/static/img/icons/apple-touch-icon-152x152.png')}}>
    <link rel=mask-icon href={{asset('/static/img/icons/safari-pinned-tab.svg')}} color=#4DBA87>
    <meta name=msapplication-TileImage content=/static/img/icons/msapplication-icon-144x144.png>
    <meta name=msapplication-TileColor content=#000000>
    <link rel=preload href={{asset('/static/js/vendor.9a19f1bf8e62d6dd7c56.js')}} as=script>
    <link rel=preload href={{asset('/static/js/app.608f5426fbf4587bfa05.js')}} as=script>
    <link rel=preload href={{asset('/static/css/app.05ff9b65ebf7f37ab8b2be8427fd206e.css')}} as=style>
    <link rel=preload href={{asset('/static/js/manifest.2ae2e69a05c33dfc65f8.js')}} as=script>
    <link href={{asset('/static/css/app.05ff9b65ebf7f37ab8b2be8427fd206e.css')}} rel=stylesheet>
</head>
<body>
<noscript>This is your fallback content in case JavaScript fails to load.</noscript>
<div id=app></div>
<script>!function () {
        "use strict";
        var o = Boolean("localhost" === window.location.hostname || "[::1]" === window.location.hostname || window.location.hostname.match(/^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/));
        window.addEventListener("load", function () {
            "serviceWorker" in navigator && ("https:" === window.location.protocol || o) && navigator.serviceWorker.register("service-worker.js").then(function (o) {
                o.onupdatefound = function () {
                    if (navigator.serviceWorker.controller) {
                        var n = o.installing;
                        n.onstatechange = function () {
                            switch (n.state) {
                                case"installed":
                                    break;
                                case"redundant":
                                    throw new Error("The installing service worker became redundant.")
                            }
                        }
                    }
                }
            }).catch(function (o) {
                console.error("Error during service worker registration:", o)
            })
        })
    }();</script>
<script type=text/javascript src={{asset('/static/js/manifest.2ae2e69a05c33dfc65f8.js')}}></script>
<script type=text/javascript src={{asset('/static/js/vendor.9a19f1bf8e62d6dd7c56.js')}}></script>
<script type=text/javascript src={{asset('/static/js/app.608f5426fbf4587bfa05.js')}}></script>
</body>
</html>
