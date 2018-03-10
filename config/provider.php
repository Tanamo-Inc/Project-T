<?php
require_once '../class/fun.php';
$fxn = new fun();
session_start();


function img_box($file, $dest, $i_width = 170, $i_height = 170)
{
    $image_source = getimagesize($file);
    $source_mime = $image_source['mime'];
    $source_x = $image_source[0];
    $source_y = $image_source[1];

    if ($source_mime == "image/png") {
        $image = imagecreatefrompng($file);
    } else if ($source_mime == "image/jpeg") {
        $image = imagecreatefromjpeg($file);
    } else if ($source_mime == "image/gif") {
        $image = imagecreatefromgif($file);
    }


    $ratio = $i_width / $source_x;
    $i_height = $source_y * $ratio;
    $export_image = imagecreatetruecolor($i_width, $i_height);

    imagecopyresized($export_image, $image, 0, 0, 0, 0, $i_width, $i_height, $source_x, $source_y);

    switch ($source_mime) {
        case "image/jpg":
        case "image/jpeg":
            if (imagetypes() & IMG_JPG) {
                clearstatcache();
                imagejpeg($export_image, $dest, 100);
            }
            break;

        case "image/gif":
            if (imagetypes() & IMG_GIF) {
                clearstatcache();
                imagegif($export_image, $dest);
            }
            break;

        case "image/png":

            if (imagetypes() & IMG_PNG) {
                clearstatcache();
                imagepng($export_image, $dest, 0);
            }
            break;

        default:
            // *** No extension - No save.  
            break;
    }

    return $dest;
}

function img_up($fil, $create_small)
{
    $imageurl = "";
    if (!empty($_FILES['file']['name'])) {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $extension = end(explode(".", $_FILES["file"]["name"]));
        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < 1060000) && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Error: " . $_FILES["file"]["error"];
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], "../public/sto/" . $_FILES["file"]["name"])) {
                    $imageurl = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER['REQUEST_URI']) . "/../public/sto/" . $_FILES["file"]["name"];
                    if ($create_small) {
                        //create small image file
                        $fxn = new fun();
                        $smallimageurl = $fxn->dupImage($_FILES["file"]["name"]);
                        img_box($imageurl, $smallimageurl, 170, 170);
                    }
                } else
                    echo "Directory not found";
            }
        } else {
            echo "Image file larger than 1MB or not a supported format. Please try again.";
        }
    }

    return $imageurl;
}

function sound_up($ff)
{
    $soundurl = "";
    $fileSize = $_FILES['soundfile']['size'];
    $fileType = $_FILES['soundfile']['type'];

    if ($fileType != 'audio/mpeg' && $fileType != 'audio/mpeg3' && $fileType != 'audio/mp3' && $fileType != 'audio/x-mpeg' && $fileType != 'audio/x-mp3' && $fileType != 'audio/x-mpeg3' && $fileType != 'audio/x-mpg' && $fileType != 'audio/x-mpegaudio' && $fileType != 'audio/x-mpeg-3') {
        echo('Only mp3 files allowed.');
    } else if ($fileSize > 10485760) {
        echo('File should not be more than 10mb');
    } else {
        if ($_FILES["soundfile"]["error"] > 0) {
            echo "Error: " . $_FILES["soundfile"]["error"];
        } else {
            if (move_uploaded_file($_FILES["soundfile"]["tmp_name"], "../public/sto/" . $_FILES["soundfile"]["name"])) {
                $soundurl = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER['REQUEST_URI']) . "/../public/sto/" . $_FILES["soundfile"]["name"];
            } else
                echo "Directory not found";
        }
    }

    return $soundurl;
}

function video_up($vids)
{
    $vurl = "";
    $fileSize = $_FILES['vile']['size'];
    $fileType = $_FILES['vile']['type'];

    if ($fileType != 'mp4' && $fileType != 'wmv' && $fileType != 'avi') {
        echo('Only mp4,wmv and avi allowed');
    } else if ($fileSize > 10485760) {
        echo('File should not be more than 10mb');
    } else {
        if ($_FILES["vile"]["error"] > 0) {
            echo "Error: " . $_FILES["vile"]["error"];
        } else {
            if (move_uploaded_file($_FILES["vile"]["tmp_name"], "../public/sto/" . $_FILES["vile"]["name"])) {
                $vurl = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER['REQUEST_URI']) . "/../public/sto/" . $_FILES["vile"]["name"];
            } else
                echo "Directory not found";
        }
    }

    return $vurl;
}

//Listener methods
if (!empty($_POST['tag'])) {

    if ($_POST['tag'] == "add-image") {

        $imageurl = img_up($fil, true);

        $fxn->newImage($imageurl, "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . "/" . ($fxn->dupImage($imageurl)));
    }

    if ($_POST['tag'] == "del_img") {
        $images = $fxn->disImag();

        foreach ($images as $key => $image) {
            if ($image['id'] == $_POST['id']) {
                unlink("../public/sto/" . basename($image["imageurl"]));
                unlink($fxn->dupImage($image["imageurl"]));
            }
        }
        $fxn->delImage($_POST['id']);
    }

    if ($_POST['tag'] == "add_vid") {
        $vimg = img_up($fil, false);

        $vurl = video_up($vids);

        if ($_POST['id'] == 0)
            $fxn->newVideo($_POST['title'], $vimg, $vurl);
        else
            $fxn->updateVideo($_POST['id'], $_POST['title'], $vimg, $vurl);
    }

    if ($_POST['tag'] == "del_vid") {
        $vvid = $fxn->disVideo();

        foreach ($vvid as $key => $vvi) {
            if ($vvi['id'] == $_POST['id']) {
                unlink("../public/sto/" . basename($vvi["vurl"]));
            }
        }

        $fxn->delVideo($_POST['id']);
    }

    if ($_POST['tag'] == "add_pod") {

        $imageurl = img_up($fil, false);
        $soundurl = sound_up($ff);

        if ($_POST['id'] == 0)
            $fxn->newPod($_POST['lyric'], $_POST['title'], $imageurl, $soundurl);
        else
            $fxn->updatePod($_POST['id'], $_POST['lyric'], $_POST['title'], $imageurl, $soundurl);
    }

    if ($_POST['tag'] == "del_pod") {
        $songs = $fxn->disPod();

        foreach ($songs as $key => $song) {
            if ($song['id'] == $_POST['id']) {
                unlink("../public/sto/" . basename($song["imageurl"]));
            }
        }

        $fxn->delPod($_POST['id']);
    }

    if ($_POST['tag'] == "add_news") {
        if ($_POST['id'] == 0)
            $fxn->newNews($_POST['title'], $_POST['news']);
        else
            $fxn->updateNews($_POST['id'], $_POST['title'], $_POST['news']);
    }

    if ($_POST['tag'] == "del_news") {
        $fxn->delNews($_POST['id']);
    }

    header('Location: home.php');
}
