<!--Author:Tandoh Anthony Nwi-Ackah-->
<!--Email:tanamoinc@gmail.com-->
<!--Country:Ghana-->
<!--Date:  Feb 10,2018-->
<!--Company: Tanamo Inc.-->


<?php

require_once '../database/db.php';

class fun
{
    private $db;
    public $conn;

    function __construct()
    {
        $this->db = new db();
        $this->conn = $this->db->connect();
    }

    public function closeDB()
    {
        mysqli_close($this->conn);
    }

######################################################################
//add new videos to database.
    public function newVideo($title, $vurl)
    {
        $title = mysqli_real_escape_string($this->conn, $title);
        $vurl = mysqli_real_escape_string($this->conn, $vurl);


        $result = mysqli_query($this->conn, "INSERT INTO videos(title, vurl) VALUES('$title', '$vurl')");
// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //update  videos in the database
    public function updateVideo($id, $title, $vurl)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $title = mysqli_real_escape_string($this->conn, $title);
        $vurl = mysqli_real_escape_string($this->conn, $vurl);


        if (strlen($vurl) > 2)
            $vurl = ", vurl = '$vurl'";
        else
            $vurl = "";

        $result = mysqli_query($this->conn, "UPDATE videos SET title='$title', " . $vurl . " WHERE id='$id'");

// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //delete  Videos from the database.
    public function delVideo($id)
    {
        $result = mysqli_query($this->conn, "DELETE FROM videos WHERE id='$id'");
// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Return all videos from database
    public function disVideo()
    {
        $result = mysqli_query($this->conn, "SELECT id, title,vurl from videos");
// check for successful store
        if ($result) {
            $records = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $records[] = $row;
            }
            return $records;
        } else {
            return false;
        }
    }


######################################################################
    //add new image to database.

    public function newImage($imageurl, $smallimageurl)
    {
        $imageurl = mysqli_real_escape_string($this->conn, $imageurl);
        $result = mysqli_query($this->conn, "INSERT INTO gallery(imageurl, smallimageurl) VALUES('$imageurl', '$smallimageurl')");
// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //delete  image from the database.
    public function delImage($id)
    {
        $result = mysqli_query($this->conn, "DELETE FROM gallery WHERE id='$id'");
// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function disImag()
    {
        $result = mysqli_query($this->conn, "SELECT id, imageurl, smallimageurl from gallery");
// check for successful store
        if ($result) {
            $records = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $records[] = $row;
            }
            return $records;
        } else {
            return false;
        }
    }

######################################################################
//add new podcast to database

    public function newPod($lyric, $title, $imageurl, $soundurl)
    {
        $lyric = mysqli_real_escape_string($this->conn, $lyric);
        $title = mysqli_real_escape_string($this->conn, $title);
        $imageurl = mysqli_real_escape_string($this->conn, $imageurl);
        $soundurl = mysqli_real_escape_string($this->conn, $soundurl);

        $result = mysqli_query($this->conn, "INSERT INTO podcast(lyric, title, imageurl, soundurl) VALUES('$lyric', '$title', '$imageurl', '$soundurl')");
// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

//update podcast in the database
    public function updatePod($id, $lyric, $title, $imageurl, $soundurl)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $lyric = mysqli_real_escape_string($this->conn, $lyric);
        $title = mysqli_real_escape_string($this->conn, $title);
        $imageurl = mysqli_real_escape_string($this->conn, $imageurl);
        $soundurl = mysqli_real_escape_string($this->conn, $soundurl);

        if (strlen($imageurl) > 2)
            $imageurl = ", imageurl = '$imageurl'";
        else
            $imageurl = "";

        if (strlen($soundurl) > 2)
            $soundurl = ", soundurl = '$soundurl'";
        else
            $soundurl = "";

        $result = mysqli_query($this->conn, "UPDATE podcast SET title='$title', lyric='$lyric' " . $soundurl . $imageurl . " WHERE id='$id'");

// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

//delete  podcast from the database.
    public function delPod($id)
    {
        $result = mysqli_query($this->conn, "DELETE FROM podcast WHERE id='$id'");
// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

//Return all podcast from database
    public function disPod()
    {
        $result = mysqli_query($this->conn, "SELECT id, lyric, title, imageurl, soundurl from podcast");
// check for successful store
        if ($result) {
            $records = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $records[] = $row;
            }
            return $records;
        } else {
            return false;
        }
    }

######################################################################
//add news to database

    public function newNews($title, $news)
    {
        $title = mysqli_real_escape_string($this->conn, $title);
        $news = mysqli_real_escape_string($this->conn, $news);
        $result = mysqli_query($this->conn, "INSERT INTO news(title, news) VALUES('$title', '$news')");
// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateNews($id, $title, $news)
    {
        $id = mysqli_real_escape_string($this->conn, $id);
        $title = mysqli_real_escape_string($this->conn, $title);
        $news = mysqli_real_escape_string($this->conn, $news);
        $result = mysqli_query($this->conn, "UPDATE news SET title='$title', news='$news' WHERE id='$id'");
// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delNews($id)
    {
        $result = mysqli_query($this->conn, "DELETE FROM news WHERE id='$id'");
// check for successful store
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function disNews()
    {
        $result = mysqli_query($this->conn, "SELECT id, title, news from news ORDER BY time");
// check for successful store
        if ($result) {
            $records = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $records[] = $row;
            }
            return $records;
        } else {
            return false;
        }
    }

######################################################################

    public function add_Vid($id, $title, $vurl)
    {
        echo("<div class='main_editor'>" .
            "<div class='editor'>" .
            "<i class='fa fa-close fa-2x closer'></i>" .
            "<form class='edit-form' action='../config/provider.php' method='post'  enctype='multipart/form-data'>
                          <h2>Add Video</h2>
                          <input type='hidden' name='tag' value='add_vid'>
                          <input type='hidden' name='id' class='id' value='" . $id . "'/>
                          <div class='edit-row'>
                              <h3>Title</h3>
                              <p><input type='text' name='title'  value='" . $title . "'/></p>
                          </div>
                         
                          <div class='edit-row'>
                              <h3>Upload Video</h3>
                              <p>Accepted formats: .MP4,.WMV,.AVI Max file size: 10MB.</p>
                              <p><label for='vile'>Filename:</label></p>
                              <p><input type='file' name='vile' id='vile'><br></p>
                           
                          </div>
                          <center><button type='submit' name='Submit'>Save</button></center>
                      </form>" .
            "</div>" .
            "</div>");
    }

    public function add_Image($id)
    {
        echo("<div class = 'main_editor'>" .
            "<div class = 'editor'>" .
            "<i class='fa fa-close fa-2x closer'></i>" .
            "<form class = 'edit-form' action = '../config/provider.php' method ='post' enctype='multipart/form-data'>
            
       <h2>Add Image</h2>
        <input type = 'hidden' name = 'tag' value = 'add-image'/>
        <input type = 'hidden' name = 'id' class = 'id' value = '" . $id . "'/>
        
         <br>
       <div class = 'edit-box'>
        <p>Accepted formats: .gif, .png, .jpeg, .jpg. Max file size: 1MB.</p>
         <p><label for = 'file'>Filename:</label></p>
         <p><input type = 'file' name = 'file' id = 'file'><br></p>
         </div>
         <br>
         <br>
        <center><button type = 'submit' name = 'Submit'>Save</button></center>
        </form>" .
            "</div>" .
            "</div>");
    }

    public function add_Pod($id, $title, $lyric, $imageurl, $soundurl)
    {
        echo("<div class='main_editor'>" .
            "<div class='editor'>" .
            "<i class='fa fa-close fa-2x closer'></i>" .
            "<form class='edit-form' action='../config/provider.php' method='post'  enctype='multipart/form-data'>
                          <h2>Add PodCast</h2>
                          <input type='hidden' name='tag' value='add_pod'>
                          <input type='hidden' name='id' class='id' value='" . $id . "'/>
                          <div class='edit-row'>
                              <h3>Title</h3>
                              <p><input type='text' name='title'  value='" . $title . "'/></p>
                          </div>
                          <div class='edit-row'>
                              <h3>Lyric</h3>
                              <p><textarea type='text' name='lyric'  />" . $lyric . "</textarea></p>
                          </div>
                          <div class='edit-row'>
                              <h3>Upload Podcast Image.</h3>
                              <p>Accepted formats: .gif, .png, .jpeg, .jpg. Max file size: 1MB.</p>
                              <p><label for='file'>Filename:</label></p>
                              <p><input type='file' name='file' id='file'><br></p>
                              <p>Current Image Url: " . $imageurl . "</p>
                          </div>
                          <div class='edit-row'>
                              <h3>Upload Podcast Audio</h3>
                              <p>Accepted formats: .MP3 Max file size: 10MB.</p>
                              <p><label for='soundfile'>Filename:</label></p>
                              <p><input type='file' name='soundfile' id='soundfile'><br></p>
                              <p>Current Sound Url: " . $soundurl . "</p>
                          </div>
                          <center><button type='submit' name='Submit'>Save</button></center>
                      </form>" .
            "</div>" .
            "</div>");
    }

    public function add_News($id, $title, $news)
    {
        echo("<div class='main_editor'>" .
            "<div class='editor'>" .
            "<i class='fa fa-close fa-2x closer'></i>" .
            "<form class='edit-form' action='../config/provider.php' method='post'  enctype='multipart/form-data'>
                          <h2>Add News</h2>
                          <input type='hidden' name='tag' value='add_news'/>
                          <input type='hidden' name='id' class='id' value='" . $id . "'/>
                          <div class='edit-row'>
                              <h3>Title</h3>
                              <p>The title that would be displayed in the list.</p>
                              <p><input type='text' name='title'  value='" . $title . "' /></p>
                          </div>
                          <div class='edit-row'>
                              <h3>News</h3>
                              <p>Enter the News.</p>
                              <p><textarea type='text' name='news'  />" . $news . "</textarea></p>
                          </div>
                          <p><button type='submit' name='Submit'>Save</button></p>
                    </form>" .
            "</div>" .
            "</div>");
    }

    public function dupImage($imageurl)
    {
        $imageurl = basename($imageurl);
        $ext = pathinfo("../public/sto/" . $imageurl, PATHINFO_EXTENSION);
        return (str_replace('.' . $ext, '', "../public/sto/" . $imageurl) . '_small.' . $ext);
    }


######################################################################
}
