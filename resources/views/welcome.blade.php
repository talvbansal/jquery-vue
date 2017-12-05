<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                font-size: 100px;
                letter-spacing: 1px;
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

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            a {
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

            img{
                max-width: 275px;
            }

            .links {
                padding-top: 20px;
                display: flex;
                justify-content: center;
            }

            .links > * + * {
                margin-left: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <a href="{{ route('jquery.index') }}" alt="jQuery Example">
                        <img src="/img/jquery-logo.gif"/>
                    </a>
                        =>
                    <a href="{{ route('vue.index') }}" alt="Vue Example">
                        <img src="/img/vue-logo.png"/>
                    </a>
                </div>

                <div class="links">
                    <a href="{{ route('emergency.index') }}">Emergency</a>
                </div>
            </div>
        </div>
    </body>
</html>
