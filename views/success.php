<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PaymentSpring Demo site</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

                <header>
                        <img src="img/logo-header.png" alt="PaymentSpring">
                </header>

                <section role="main" class="center">
                <h1>Payment successful!</h1>
                <p>Confirmation number: <?=$response->id?></p>
                </section>

                <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
                <script src="https://www.paymentspring.com/js/paymentspring.js"></script>
                <script src="/js/main.js"></script>
    </body>
</html>
