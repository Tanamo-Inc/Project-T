<!--Author:Tandoh Anthony Nwi-Ackah-->
<!--Email:tanamoinc@gmail.com-->
<!--Country:Ghana-->
<!--Date:  Feb 10,2018-->
<!--Company: Tanamo Inc.-->

<!doctype html>s
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/main.css">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/main.css">
    <title>Contact Us</title>
</head>

<body class="push-menu">

<!---------------------------------------------------The Header-------------------------------------------------------->

<div>
    <!--header-->
    <div class="head-section">
        <div class="container">

            <div class="logo">
                <a href="home.php"><img src="../public/sto/main_logo.png" id="logo"></a>
            </div>

            <marquee class="aas">**** Welcome to Project T by Tanamo Inc !!! ****</marquee>

        </div>

    </div>

    <!-- Menu -->
    <div class="navi-bar">

        <nav class="menu-main menu-vert menu-right" id="menu-na">
            <h3>Menu</h3>
            <a href="" class="active"><i class="fa fa-home"></i> Home</a>
            <a href="profile.php"><i class="fa  fa-user"></i>Profile</a>
            <a href="https://github.com/Tanamo-Inc"><i class="fa  fa-github"></i> Projects</a>
            <a href="https://play.google.com/store/search?q=tanamo%20inc"><i class="fa fa-download"></i>Downloads</a>
            <a href="https://www.facebook.com/Tanamo-Inc-204731483344765"><i class="fa fa-info-circle"></i> About Us</a>
            <a href="contacts.php"><i class="fa fa-phone"></i> Contact Us</a>
            <a href="logout.php"><i class="fa  fa-sign-out"></i>Logout </a>
        </nav>

        <button id="push-but"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></button>

    </div>

</div>

<!---------------------------------------------------The Content------------------------------------------------------->
<div class="section">

    <div id="contact">

        <div class="container">

            <h1 class="center">How to find us</h1>
            <div class="section">
                <center>
                    <iframe class="center" style="border: 0"
                            src="https://www.google.com/maps/embed/v1/place?key= AIzaSyDxwdaK00DRnW-oHOZXm1M11AZfTNRj_eY&q=college of engineering,knust ,kumasi"
                            allowfullscreen>

                    </iframe>
                </center>
            </div>

            <div class="clearfix"></div>

            <div class="row">

                <div class="col s12 m8 l8 xl8">

                    <div class="contact-form">
                        <h3 class="center">Contact US</h3>
                        <p class="center">Get in touch with us.</p>

                        <div class="dv-notify-success" style="color: green">Message Sent</div>
                        <div class="dv-notify-failed" style="color: red">Failed to Send Message</div>

                        <form class="dv-add-oneto:mesus:inbox">
                            <div class="input-field">
                                <input type="text" required="" name="name">
                                <label>Name<span class="req">*</span></label>
                            </div>
                            <div class="input-field">
                                <input type="email" required="" name="email">
                                <label>Email<span class="req">*</span></label>
                            </div>
                            <div class="input-field">
                                <input type="text" required="" name="phone">
                                <label>Phone<span class="req">*</span></label>

                            </div>
                            <div>
                                <textarea class="tar" type="text" name="message" required=""
                                          placeholder="Message"></textarea>
                            </div>

                            <div>
                                <center>
                                    <button id="but" class="btn" type="submit">SEND</button>
                                </center>
                            </div>
                            <div class="clearfix"></div>
                        </form>


                    </div>

                </div>


                <div class="col s12 m4 l4 xl4">
                    <br>

                    <h4 class="center">Follow Us On Facebook</h4>

                    <div class="fb-page" data-href="https://www.facebook.com/Tanamoinc/"
                         data-tabs="timeline" data-small-header="false"
                         data-adapt-container-width="true"
                         data-hide-cover="false" data-show-facepile="true">


                        <blockquote cite="https://www.facebook.com/Tanamoinc/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/Tanamoinc/">Tanamo Inc.</a></blockquote>


                    </div>

                </div>


                <div class="clearfix"></div>

            </div>
        </div>

    </div>

</div>

<!---------------------------------------------------The Footer-------------------------------------------------------->

<?php
require_once 'footer.php';
?>

<!---------------------------------------------------The Script-------------------------------------------------------->


<script src="https://tanamoinc.herokuapp.com/js/devless-sdk.js" class="devless-connection"
        devless-con-token="53a7b9f2f11af560dff5a86e65c8024a"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<script>

    new WOW().init();

    <!-- /script-for-menu -->

    (function (window) {

        'use strict';

        function classReg(className) {
            return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
        }

        var hasClass, addClass, removeClass;

        if ('classList' in document.documentElement) {
            hasClass = function (elem, c) {
                return elem.classList.contains(c);
            };
            addClass = function (elem, c) {
                elem.classList.add(c);
            };
            removeClass = function (elem, c) {
                elem.classList.remove(c);
            };
        }
        else {
            hasClass = function (elem, c) {
                return classReg(c).test(elem.className);
            };
            addClass = function (elem, c) {
                if (!hasClass(elem, c)) {
                    elem.className = elem.className + ' ' + c;
                }
            };
            removeClass = function (elem, c) {
                elem.className = elem.className.replace(classReg(c), ' ');
            };
        }

        function toggleClass(elem, c) {
            var fn = hasClass(elem, c) ? removeClass : addClass;
            fn(elem, c);
        }

        window.men = {
            addClass: addClass,
            removeClass: removeClass,
            toggle: toggleClass
        };

    })(window);

    var menus = document.getElementById('menu-na'),
        right_push = document.getElementById('push-but'),
        body = document.body;

    right_push.onclick = function () {
        men.toggle(this, 'active');
        men.toggle(body, 'push-left');
        men.toggle(menus, 'open-menu');
        disableOther('right_push');
    };

    function disableOther(button) {
        if (button !== 'right_push') {
            men.toggle(right_push, 'disabled');
        }
    }

</script>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12&appId=159566620739597&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!------------------------------------------------------The End-------------------------------------------------------->

</body>

</html>