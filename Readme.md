paymentspring/example-php
===========================

See a running version of this app at: http://ps-example-php.herokuapp.com/

This app shows you how easy it is to start charging credit cards while greatly reducing your pci compliance requirements.  This application demonstrates how you can accept card numbers on your website but not actually have the card number flow through your servers.

To have the transactions show up in your PaymentSpring dashboard, replace the public/private keys with your own.

For complete documentation, checkout: [https://www.paymentspring.com/docs/api/rest](https://www.paymentspring.com/docs/api/rest)

Checkout the code:

```Shell
$ git clone git://github.com/paymentspring/example-php.git
$ cd example-php
```

Run it:

If you are using PHP 5.4 you can run this example application using the built-in webserver as follows:
```Shell
$ git clone git://github.com/paymentspring/example-php.git
$ cd example-php
$ php -S localhost:8080
```
If you are using an older version of PHP you'll need a web server with PHP installed.

-------------------
Go to [https://www.paymentspring.com](https://www.paymentspring.com), create an account, and open up your dashboard. Save your API keys from the Account menu somewhere safe.

Step 1: Generating a Token
---------------------------
The easiest way to generate a token is to create a form with the input fields for cardholder name, credit card number, csc, expiration month, and expiration year. Make sure these input fields don't have "name" attributes so the card number and other sensitive data isn't posted to your server. Doing so greatly reduces your PCI requirements. When the form is submitted, use Javascript to pass in the card information to the [paymentspring.js](https://www.paymentspring.com/js/paymentspring.js) library by calling:

```Javascript
paymentspring.generateToken(public_key, card_number, csc, card_holder, exp_month, exp_year, callback);
```

The data passed to the callback will contain a JSON formatted response from the PaymentSpring token API. A lot of information is being passed back, but the only thing we need to start charging cards is the "id" field of the JSON. This is the token you will use to charge the credit card. For now, load up the token into a hidden field and submit the form.

For example, see: https://github.com/paymentspring/example-php/blob/master/js/main.js

Step 2: Charging the Card with the Token
----------------------------------------
The token you generated from step 1 is your PCI-safe way of handling credit card data. If someone malicious were to get ahold of this token, they would also need your private key to do anything with it and even then they would only be able to charge money from the card into your account. Pretty neat, huh? Using your favorite way of consuming a RESTful web service (this example uses curl to keep things simple), POST to the Charge API of PaymentSpring with your private key, token, and amount you want to charge to charge the credit card. Remember, we are using PHP for this example, but you can do this with ANY language you want. Just make sure that you are keeping your private key private, so don't bundle it with an Android or iOS app for example.


For example see: https://github.com/paymentspring/example-php/blob/master/index.php

And that's it! You can verify the charge went through by checking out your PaymentSpring account dashboard.
