<!--Author:Tandoh Anthony Nwi-Ackah-->
<!--Email:tanamoinc@gmail.com-->
<!--Country:Ghana-->
<!--Date:  Feb 10,2018-->
<!--Company: Tanamo Inc.-->


<?php
require_once '../class/fun.php';
$fxn = new fun();
session_start();
?>

<!Doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' type='text/css' href='../public/css/main.css'/>
    <title>Home</title>
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

<div class="container">

    <!--Gallery Section-->
    <div class="sectio">

        <div class="cc">
            <i class="fa fa-2x fa-plus adder"></i>
            <?php
            $fxn->add_Image("id");
            ?>
        </div>

        <h2>Gallery</h2>

        <!--show all -->
        <?php
        $images = $fxn->disImag();
        if ($images == null) {
            echo("<h3 class='center'>No Images yet</h3>");
        } else {
            foreach ($images as $image) {
                echo("<div class='box'>" .
                    "<input type='hidden' name='id' class='id' value='" . $image["id"] . "'/>" .
                    "<img class='box_gal'src='" . "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . "/" . ($fxn->dupImage($image['imageurl'])) . "' alt='image'>" .
                    "<div class='iconbar'>" .
                    "<i class='fa fa-trash-o del_img'></i> " .
                    "</div>" .
                    "</div>");
            }
        }
        ?>
    </div>

    <!--Videos Section-->
    <div class="sectio">

        <div class="cc">
            <i class="fa fa-2x fa-plus adder"></i>
            <?php
            $fxn->add_Vid(0, "", "");
            ?>
        </div>

        <h2>Videos</h2>

        <!--show all -->
        <?php
        $vid = $fxn->disVideo();
        if ($vid == null) {
            echo("<h3 class='center'>No Videos yet</h3>");
        } else {
            foreach ($vid as $vids) {
                echo("<div class='box'>" .
                    "<img class='box_vid' src='" . $vids['vurl'] . "' alt='videos'>" .
                    "<div class='box_vid_info'>" .
                    "<p>" . htmlspecialchars($vids["title"]) . "</p>" .
                    "<p>" . htmlspecialchars(substr($vids["title"], 0, 40)) . "..." . "</p>" .
                    "<div class='iconbar'>" .
                    "<i class='fa fa-edit add_vid'></i>" .
                    "<i class='fa fa-trash-o del_vid'></i>" .
                    "</div>" .
                    "</div>");
                $fxn->add_Vid($vids["id"], htmlspecialchars($vids["title"]), $vids["vurl"]);
                echo("</div>");
            }
        }
        ?>
    </div>

    <!--Pod cast Section-->
    <div class="sectio">

        <div class='cc'>
            <i class="fa fa-2x fa-plus adder"></i>
            <?php
            $fxn->add_Pod(0, "", "", "", "");
            ?>
        </div>

        <h2>PodCast</h2>


        <!--show all-->
        <?php
        $pods = $fxn->disPod();
        if ($pods == null) {
            echo("<h3 class='center'>Empty PodCast</h3>");
        } else {
            foreach ($pods as $pod) {
                echo("<div class='box'>" .
                    "<img class='box_img_sng' src='" . $pod['imageurl'] . "' alt='podcast'>" .
                    "<div class='box_info_sng'>" .
                    "<p>" . htmlspecialchars($pod["title"]) . "</p>" .
                    "<p>" . htmlspecialchars(substr($pod["lyric"], 0, 40)) . "..." . "</p>" .
                    "<div class='iconbar'>" .
                    "<i class='fa fa-edit add_pod'></i>" .
                    "<i class='fa fa-trash-o del_pod'></i>" .
                    "</div>" .
                    "</div>");
                $fxn->add_Pod($pod["id"], htmlspecialchars($pod["title"]), htmlspecialchars($pod["lyric"]), $pod["imageurl"], $pod["soundurl"]);
                echo("</div>");
            }
        }
        ?>
    </div>

    <!--News    Section-->
    <div class="sectio">

        <div class='cc'>
            <i class="fa fa-2x fa-plus adder"></i>
            <?php
            $fxn->add_News(0, "", "");
            ?>
        </div>

        <h2>News</h2>

        <!--Show all-->
        <?php
        $news = $fxn->disNews();
        if ($news == null) {
            echo("<h3 class='center'>No News yet</h3>");
        } else {
            foreach ($news as $new) {
                echo("<div class='box'>" .
                    "<p>" . htmlspecialchars($new["title"]) . "</p>" .
                    "<p>" . htmlspecialchars(substr($new["news"], 0, 40)) . "..." . "</p>" .
                    "<div class='iconbar'>" .
                    "<i class='fa fa-edit add_news'></i>" .
                    "<i class='fa fa-trash-o del_news'></i>" .
                    "</div>");
                $fxn->add_News($new["id"], htmlspecialchars($new["title"]), htmlspecialchars($new["news"]));
                echo("</div>");
            }
        }
        $fxn->closeDB();
        ?>
    </div>

</div>

<!---------------------------------------------------The Footer-------------------------------------------------------->

<div style="clear: both;"></div>


<?php
require_once 'footer.php';
?>


<!---------------------------------------------------The Script-------------------------------------------------------->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script type="text/javascript" src="../public/js/index.js"></script>

<script type="text/javascript">

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
        } else {
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

<!------------------------------------------------------The End-------------------------------------------------------->

</body>

</html>
