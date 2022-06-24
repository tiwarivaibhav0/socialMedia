<?php
include 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $txt = $_POST['videoText'];

    if (isset($_FILES["anyfile2"]) && $_FILES["anyfile2"]["error"] == 0) {
        $allowed = array("mp4" => "video/mp4");
        $filename = $_FILES["anyfile2"]["name"];
        $filetype = $_FILES["anyfile2"]["type"];
        $filesize = $_FILES["anyfile2"]["size"];

        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format. GO to<a href='home.php'>Home</a>");

        // Validate file size - 10MB maximum
        $maxsize = 50 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.  GO to<a href='home.php'>Home</a>");

        // Validate type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $filename)) {
                echo $filename . " already exists.  GO to<a href='home.php'>Home</a>";
            } else {
                if (move_uploaded_file($_FILES["anyfile2"]["tmp_name"], "uploads/" . $filename)) {
                    $sql = "INSERT INTO images(file,type,size) VALUES('$filename','$filetype','$filesize')";
                    $conn->query($sql);
                    $lastId = $conn->lastInsertId();
                    $sql = "select * from images where img_id='$lastId'";
                    $result = $conn->query($sql);
                    $row = $result->fetchAll(PDO::FETCH_ASSOC);
                    $img = $row[0]['file'];
                    $id = $_SESSION['id'];
                    $user = $_SESSION['user'];
                    $sql = "INSERT INTO Post (`user_id`, `image`, `details`, `post_date`, `likes`, `comments`, `username`,`video`) VALUES('$id','$img','$txt',now(),0,0,'$user',1)";

                    $conn->query($sql);
                    header("Location: home.php");
                } else {
                    echo "File is not uploaded  GO to<a href='home.php'>Home</a>";
                }
            }
        } else {
            echo "Error: There was a problem uploading your file. Please try again.  GO to<a href='home.php'>Home</a>";
        }
    } else {
        echo "Error:  GO to<a href='home.php'>Home</a> " . $_FILES["anyfile"]["error"];
    }
}
