<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Welcome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap" rel="stylesheet">
    <style>

        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }

        @font-face {
            font-family: "Racing Sans";
            src: url('https://fonts.googleapis.com/css2?family=Racing+Sans+One&display=swap');
        }

        .racing-green {
            font-family: "Racing Sans One", cursive;
        }

        .color-green {
            color: #004225;
        }

        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }

        .flex-center{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }

        .text-center{
            text-align:center;
        }

        .text-muted{
            color:lightgray;
        }

        .text-light{
            font-weight:lighter;
        }

        .hr{
            border-top: 1px solid #eeeeee;
        }

        .grey-out{
            background: #eeeeee;
            padding:10px;
        }

        .icon-margin{
            margin:10px;
        }

        a{
            text-decoration:none;
        }

    </style>
</head>
<body>
    <div>
        <div class="flex-center">
            <img src='https://i.postimg.cc/90tPN5kv/rgm-copy.png' height='100' width='100' alt='RGM'>
            <div>
                <h2 class="racing-green color-green">RacingGreenMagazine</h2>
            </div>
        </div>
        <h4 class="text-light">
            Welcome {{$name}}.<br>Thank you for registering with {{$appSetting->website_name ?? "Racing Green"}}.
        </h4>
        <h4 class="text-light">
            This email is just to confirm your registration.
        </h4>
        <h4 class="text-light">
            If you didn't register with this email address, simply click the link to reply to this email and provide further details.
        </h4>
        <div>
            <a href="https://www.racinggreenmagazine.com">
                <div>I didn't register</div>
            </a>
        </div>
    </div>
    </br>
    <hr class="hr">
    <div>
        <div class="flex-center">
            <div>
                <h5 class="text-center text-light">
                    Follow us
                </h5>
                <a href="{{$appSetting->facebook}}" target="_blank" class="icon-margin">
                    <img src='https://i.postimg.cc/h4ytT3hj/facebook-brands.png' height='25' alt='Facebook'>
                </a>
                <a href="{{$appSetting->twitter}}" target="_blank" class="icon-margin">
                    <img src='https://i.postimg.cc/x1h21Wxr/twitter-brands.png' height='25' alt='Twitter'>
                </a>
                <a href="{{$appSetting->instagram}}" target="_blank" class="icon-margin">
                    <img src='https://i.postimg.cc/NMQPsDcq/instagram-brands.png' height='25' alt='Instagram'>
                </a>
            </div>
        </div>
        <br>
        <br>
        <div class="flex-center grey-out">
            <h5 class="text-center">
                <strong class="racing-green">RacingGreenMagazine</strong>
                <br>
                <br>
                <a href="mailto:racinggreenmagazine@gmail.com"> Home </a>
                <a href="https://www.racinggreenmagazine.com/privacy-policy"> Privacy </a>
                <a href="https://www.racinggreenmagazine.com/cookie-policy"> Cookies </a>
            </h5>
        </div>
    </div>
</body>
</html>
