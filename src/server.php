<?php
include 'connection.php';
if (isset($_POST['checkEmail'])) {
  $checkEmail = $_POST['checkEmail'];
  $checkUsername = $_POST['checkUsername'];
  try {
    $sql = "SELECT *
                 from User where User.email='$checkEmail'
                ";

    $res = $conn->query($sql);
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) > 0) {
      echo ("0");
    } else {
      $sql = "SELECT *
            from User where User.username='$checkUsername'
           ";

      $res = $conn->query($sql);
      $rows = $res->fetchAll(PDO::FETCH_ASSOC);
      if (count($rows) > 0) {
        echo ("1");
      } else {
        echo ("2");
      }
    }
  } catch (PDOException $e) {
  }
}

if (isset($_POST['data'])) {
  parse_str(json_decode($_POST['data']), $arr);
  $fname = $arr['fname'];
  $lname = $arr['lname'];
  $email = $arr['email'];
  $username = $arr['username'];
  $mobile = $arr['mobile'];
  $city = $arr['city'];
  $Country = $arr['Country'];
  $pin = $arr['pin'];
  $password = $arr['password'];
  $img = "https://www.pngfind.com/pngs/m/610-6104451_image-placeholder-png-user-profile-placeholder-image-png.png";
  try {
    $sql = "INSERT INTO `User` ( `fname`, `lname`, `email`, `username`, `mobile`,`city`,`country`,`pin`,`password`,`user_type`,`picture`) VALUES ('$fname', '$lname', '$email', '$username', '$mobile','$city','$Country','$pin','$password','user','$img');";

    $conn->query($sql);
    echo ("Successfully Inserted");
  } catch (PDOException $e) {
  }
}
if (isset($_POST['loginEmail'])) {
  $email = $_POST['loginEmail'];
  $password = $_POST['loginPassword'];
  $remember = $_POST['remember'];
  try {
    $sql = "SELECT *
               from User where User.email='$email'
               AND User.password='$password'";

    $res = $conn->query($sql);
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) > 0) {
      $id = $rows[0]["user_id"];
      $_SESSION['user'] = $rows[0]["fname"] . ' ' . $rows[0]["lname"];
      $_SESSION['username'] = $rows[0]["username"];
      $_SESSION['email'] = $rows[0]["email"];
      if ($rows[0]["user_type"] == 'admin') {
        $_SESSION['admin'] = 1;
      } else
        $_SESSION['admin'] = 0;
      $_SESSION['id'] = $id;
      if ($remember == 1) {
        $cookie_id = $id;
        $cookie_name = $_SESSION['username'];
        $role = $_SESSION['admin'];
        setcookie("id", $cookie_id, time() + (86400 * 30), "/");
        setcookie("name", $cookie_name, time() + (86400 * 30), "/");
        setcookie("role", $role, time() + (86400 * 30), "/");
      }
      try {
        $sql = "SELECT *
                             from request where user_id='$id'
                             ";

        $res = $conn->query($sql);
        $rows = $res->fetchAll(PDO::FETCH_ASSOC);
        if (count($rows) > 0) {
          $_SESSION['request'] = array();
          $_SESSION['request'] = $rows;
        }
      } catch (PDOException $e) {
      }
      echo ("1");
    } else
      echo ("0");
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

if (isset($_POST['findFriend'])) {
  $findFriend = $_POST['findFriend'];
  $id = $_SESSION['id'];
  $sql = "SELECT *
  from User where User.email='$findFriend'
  ";
  $res = $conn->query($sql);
  $rows = $res->fetchAll(PDO::FETCH_ASSOC);
  if (count($rows) > 0) {
    $findId = $rows[0]['user_id'];
    $sql = "SELECT friend_id
  from friend where user_id='$id'
  ";

    $res = $conn->query($sql);
    $rowsF = $res->fetchAll(PDO::FETCH_ASSOC);
    if (in_array($findId, $rowsF[0])) {
      $_SESSION['findFriend'] = 0;
    } else {
      if ($findId == $_SESSION['id'])
        $_SESSION['findFriend'] = 0;
      else {
        $_SESSION['findFriend'] = $rows[0]['fname'] . ' ' . $rows[0]['lname'];
        $_SESSION['findusername'] = $rows[0]['username'];
        $_SESSION['findPicture'] = $rows[0]['picture'];
        $_SESSION['findFriendId'] = $rows[0]['user_id'];
      }
    }
  } else {
    $sql = "SELECT *
  from User where User.username='$findFriend'
  ";

    $res = $conn->query($sql);

    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    if (count($rows) > 0) {
      $findId = $rows[0]['user_id'];
      $sql = "SELECT friend_id
      from friend where user_id='$id'
      ";
      $res = $conn->query($sql);
      $rowsF = $res->fetchAll(PDO::FETCH_ASSOC);
      if (in_array($findId, $rowsF[0])) {
        $_SESSION['findFriend'] = 0;
      } else {
        if ($findId == $_SESSION['id'])
          $_SESSION['findFriend'] = 0;
        else {
          $_SESSION['findFriend'] = $rows[0]['fname'] . ' ' . $rows[0]['lname'];
          $_SESSION['findusername'] = $rows[0]['username'];
          $_SESSION['findPicture'] = $rows[0]['picture'];
          $_SESSION['findFriendId'] = $rows[0]['user_id'];
        }
      }
    } else {
      $_SESSION['findFriend'] = 0;
    }
  }
}

if (isset($_POST['showAll'])) {
  unset($_SESSION['findFriend']);
}

if (isset($_POST['addFriendClick'])) {
  $id = $_SESSION['id'];
  $requstId = $_POST['addFriendClick'];
  try {
    $sql = "INSERT INTO `request` ( `user_id`, `request_id`) VALUES ('$requstId', '$id');";

    $conn->query($sql);
    echo ("Successfully Inserted");
  } catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  }
}

if (isset($_POST['acceptRequest'])) {
  $id = $_SESSION['id'];
  $acceptRequest = $_POST['acceptRequest'];
  try {
    $sql = "INSERT INTO `friend` ( `user_id`, `friend_id`,`mute`) VALUES ('$id', '$acceptRequest',0);";
    $conn->query($sql);
    echo ("Successfully Inserted");
    $sql = "INSERT INTO `friend` ( `user_id`, `friend_id`,`mute`) VALUES ('$acceptRequest', '$id',0);";
    $conn->query($sql);
    echo ("Successfully Inserted");
    $sql = "delete from `request` where user_id='$id' AND request_id='$acceptRequest'";
    $conn->query($sql);
    echo ("Deleted");
  } catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  }
}
if (isset($_POST['editLikeID'])) {
  $likeId = $_POST['editLikeID'];
  $id = $_SESSION['id'];
  try {
    $sql = "update `Post` set likes=likes+1 where post_id='$likeId'";
    $conn->query($sql);
    $sql = "INSERT into likes(`user_id`,`post_id`) VALUES ('$id','$likeId') ; ";
    $conn->query($sql);
  } catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  }
  try {
    $id = $_SESSION['id'];
    $sql = "SELECT *
             from Post where user_id IN (SELECT friend_id
    FROM friend where user_id='$id' AND mute=0)";
    $res = $conn->query($sql);

    $rows = $res->fetchAll(PDO::FETCH_ASSOC);
    // echo(count($rows));
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  } ?>
  <?php
  $txt = "";
  foreach ($rows as $key => $val) {
    if ($val['user_id'] != $_SESSION['id']) {
      $txt .= '<div class="post"><div class="post__top"><div class="post__topInfo"> <span class="h3">' . $val['username'] . '</span>
      <p>' . $val['post_date'] . '</p>
    </div>
  </div>

  <div class="post__bottom">
    <p>' . $val['details'] . '</p>
  </div>

  <div class="post__image">
    <img
      src="uploads/' . $val['image'] . '"
      alt=""
    />
  </div>
 ';
      if ($val['image'] != NULL && $val['video'] == 1) {
        $txt .= ' <div class="post__image">
          <video width="100%" height="240" controls>
          <source src="uploads/' . $val['image'] . '" type="video/mp4">
          Your browser does not support the video tag.
        </video> 
           
          </div>';
      }
      $id = $_SESSION['id'];
      try {
        $id = $_SESSION['id'];
        $p_id = $val['post_id'];
        $sql = "SELECT *
                     from likes where user_id='$id' AND post_id='$p_id' ";
        $res = $conn->query($sql);

        $rows = $res->fetchAll(PDO::FETCH_ASSOC);

        if (count($rows) > 0) {
          $txt .= '<div class="post__options">
              <div class="post__option">
                <span class="material-icons text-primary"  id="' . $val['post_id'] . '" > thumb_up </span>
                <p>' . $val['likes'] . '</p>
              </div>';
        } else {
          $txt .= '<div class="post__options">
              <div class="post__option">
                <span class="material-icons like"  id="' . $val['post_id'] . '" > thumb_up </span>
                <p>' . $val['likes'] . '</p>
              </div>';
        }
      } catch (PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
      }
      $txt .= ' <div class="post__option">
      <span class="material-icons comments" id="' . $val['post_id'] . '"> chat_bubble_outline </span>
      <p>' . $val['comments'] . '</p>
    </div>

    <div class="post__option">
      <span class="material-icons share" id="' . $val['post_id'] . '"> near_me </span>
      <p>Share</p>
    </div>
  </div>
</div>';
    }
  }
  echo $txt;
}
if (isset($_POST['detailsProductId'])) {
  $_SESSION['postId'] = $_POST['detailsProductId'];
  showDetails();

  echo 1;
}

if (isset($_POST['deleteFriend'])) {
  $deleteFriend = $_POST['deleteFriend'];
  $id = $_SESSION['id'];
  try {
    $sql = "delete from `friend` where user_id='$id' AND friend_id='$deleteFriend'";

    $result = $conn->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    echo ("Successfully Inserted");
  } catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  }
}
if (isset($_POST['muteFriend'])) {
  $muteFriend = $_POST['muteFriend'];
  $id = $_SESSION['id'];
  try {
    $sql = "update `friend` set mute=1 where user_id='$id' AND friend_id='$muteFriend'";

    $result = $conn->query($sql);
    echo friends();
  } catch (PDOException $e) {
    echo "Connectioon failed: " . $e->getMessage();
  }
}
if (isset($_POST['unMuteFriend'])) {
  $unMuteFriend = $_POST['unMuteFriend'];
  $id = $_SESSION['id'];


  try {
    $sql = "update `friend` set mute=0 where user_id='$id' AND friend_id='$unMuteFriend'";

    $result = $conn->query($sql);
    echo friends();
  } catch (PDOException $e) {
    echo "Connectioon failed: " . $e->getMessage();
  }
}

function friends()
{ ?>
  <div class="container marketing " style="width: 50%;">
    <hr>
    <hr>
    <div class="row">
      <?php
      try {
        $id = $_SESSION['id'];
        global $conn;
        $sql = "SELECT * FROM User where user_id  IN 
            (SELECT friend_id
            FROM friend where user_id='$id' and mute=0)";
        $res = $conn->query($sql);

        $rows = $res->fetchAll(PDO::FETCH_ASSOC);

        // echo(count($rows));

      } catch (PDOException $e) {
      } ?>
      <?php
      $id = $_SESSION['id'];
      foreach ($rows as $key => $val) {  ?>
        <div class="col-lg-12 row" id="searchFriends">
          <div class="col">
            <img src="<?php echo ($val['picture'])   ?>" class="border" style="border-radius: 25px;" alt="" width="50%">
            <br><br>
          </div>
          <div class="col">
            <span class="h5"><?php echo ($val['fname'] . ' ' . $val['lname']);   ?></span>
            <br><span class="h6">(<?php echo ($val['username']);   ?>)</span>
          </div>
          <div class="col">
            <span><a class="btn btn-danger  deleteFriend" href="#" id="<?php echo ($val['user_id'])   ?>"><i class="bi bi-trash"></i></a></span>
            <span><a class="btn btn-info  muteFriend" href="#" id="<?php echo ($val['user_id'])   ?>"><i class="bi bi-volume-mute"></i></a></span>
          </div>
        </div>
        <br>
        <hr><!-- /.col-lg-4 -->
      <?php
      }
      try {
        $id = $_SESSION['id'];
        global $conn;
        $sql = "SELECT * FROM User where user_id  IN 
            (SELECT friend_id
            FROM friend where user_id='$id' and mute=1)";
        $res = $conn->query($sql);
        $rows = $res->fetchAll(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
      } ?>
      <?php
      $id = $_SESSION['id'];
      foreach ($rows as $key => $val) {  ?>
        <div class="col-lg-12 row" id="searchFriends">
          <div class="col">
            <img src="<?php echo ($val['picture'])   ?>" class="border" style="border-radius: 25px;" alt="" width="50%">
            <br><br>
          </div>
          <div class="col">
            <span class="h5"><?php echo ($val['fname'] . ' ' . $val['lname']);   ?></span>
            <br><span class="h6">(<?php echo ($val['username']);   ?>)</span>
          </div>
          <div class="col">
            <span><a class="btn btn-danger  deleteFriend" href="#" id="<?php echo ($val['user_id'])   ?>"><i class="bi bi-trash"></i></a></span>
            <span><a class="btn btn-warning unMuteFriend" href="#" id="<?php echo ($val['user_id'])   ?>"><i class="bi bi-bell"></i></a></span>

          </div>
        </div>
        <br>
        <hr>
      <?php
      }
      ?>
    </div>
  </div>
<?php
}
if (isset($_POST['postContent'])) {
  $txt = $_POST['postContent'];
  $id = $_SESSION['id'];
  $user = $_SESSION['user'];
  $sql = "INSERT INTO Post (`user_id`, `image`, `details`, `post_date`, `likes`, `comments`, `username`,`video`) VALUES('$id',NULL,'$txt',now(),0,0,'$user',0)";
  $conn->query($sql);
}
if (isset($_POST['comment'])) {
  $comment = $_POST['comment'];
  $user = $_SESSION['username'];
  $post_id = $_SESSION['postId'];
  try {
    $comment = $conn->quote($comment);
    $sql = "INSERT INTO `comments` ( `post_id`, `user_name`, `comment`, `replies`) VALUES ('$post_id', '$user', $comment, 0);";
    $result = $conn->query($sql);
    $sql = "update `Post` set comments=comments+1 where post_id='$post_id'";
    $result = $conn->query($sql);
  } catch (PDOException $e) {
    echo "Connectioon failed: " . $e->getMessage();
  }
  showDetails();
  echo $_SESSION['detailsId'];
}

function showDetails()
{
  global $conn;
  $detailsId = $_SESSION['postId'];
  try {
    $sql = "select * from Post where post_id='$detailsId'";
    $result = $conn->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    // echo("Successfully Inserted");
  } catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  }
  $txt = '';
  foreach ($rows as $key => $val) {
    $txt .= '<div class="post mx-auto" ><div class="post__top "><div class="post__topInfo"> <span class="h3">' . $val['username'] . '</span>
          <p>' . $val['post_date'] . '</p>
        </div>
      </div>

      <div class="post__bottom">
        <p>' . $val['details'] . '</p>
      </div>

      <div class="post__image">
        <img
          src="uploads/' . $val['image'] . '"
          alt="" 
        />
      </div>
      ';
    if ($val['image'] != NULL && $val['video'] == 1) {
      $txt .= ' <div class="post__image">
          <video width="100%" height="240" controls>
          <source src="uploads/' . $val['image'] . '" type="video/mp4">
          Your browser does not support the video tag.
        </video> 
           
          </div>';
    }
    $id = $_SESSION['id'];
    try {
      $id = $_SESSION['id'];
      $p_id = $val['post_id'];
      $sql = "SELECT *
                     from likes where user_id='$id' AND post_id='$p_id' ";
      $res = $conn->query($sql);

      $rows = $res->fetchAll(PDO::FETCH_ASSOC);

      if (count($rows) > 0) {
        $txt .= '<div class="post__options">
              <div class="post__option">
                <span class="material-icons text-primary"  id="' . $val['post_id'] . '" > thumb_up </span>
                <p>' . $val['likes'] . '</p>
              </div>';
      } else {
        $txt .= '<div class="post__options">
              <div class="post__option">
                <span class="material-icons like"  id="' . $val['post_id'] . '" > thumb_up </span>
                <p>' . $val['likes'] . '</p>
              </div>';
      }
    } catch (PDOException $e) {
      // echo "Connection failed: " . $e->getMessage();
    }

    $txt .= ' <div class="post__option">
          <span class="material-icons comments"  id="' . $val['post_id'] . '"> chat_bubble_outline </span>
          <p>' . $val['comments'] . '</p>
        </div>

        <div class="post__option">
          <span class="material-icons share" id="' . $val['post_id'] . '"> near_me </span>
          <p>Share</p>
        </div>
      </div>
   
    <div class="post__option float-start border" style="border-radius:25px">
    <input type="text" placeholder="Add a new Comment!" style="border-width:0px;
    border:none;
    outline:none;" id="comment">
    <br>
  </div>
  <button class="btn btn-primary" id="commentBtn">Comment</button>
<br><br><div class="float-start">';
  }
  try {
    $sql = "select * from comments where post_id='$detailsId'";

    $result = $conn->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    // echo("Successfully Inserted");
    if (count($rows) > 0) {
      foreach ($rows as $key => $val) {
        $txt .= '<div class="commentText float-start" style="border-radius:25px;">
    
             <hr><span class="text-white rounded-pill bg-dark h5 px-2">' . $val['user_name'] . '</span><br><br>
    <textarea  style="border-width:0px; margin-left:10%;
    border:none;
    outline:none;" value="' . $val['comment'] . '" readonly id="' . $val['comment_id'] . '"  name="commentText" rows="3" cols="40" class"textarea">' . $val['comment'] . '</textarea>';
        if ($val['user_name'] == $_SESSION['username']) {
          $txt .= '<button class=" text-primary editComment" id="' . $val['comment_id'] . '" style="margin-left:10%; border:none" ><i class="bi bi-pen"></i></button>
       <button class=" text-danger deleteComment" id="' . $val['comment_id'] . '" style="margin-left:1%; border:none"><i class="bi bi-trash"></i></button>
       ';
        }
        $txt .= '<br>
   
  </div><br>';
      }
      $txt .= '
          </div></div>';
    }
  } catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  }
  $_SESSION['detailsId'] = $txt;
}

if (isset($_POST['shareId'])) {
  $shareId = $_POST['shareId'];
  $id = $_SESSION['id'];
  try {
    $sql = "select * from Post where post_id='$shareId'";

    $result = $conn->query($sql);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    $img = $rows[0]['image'];
    $details = $rows[0]['details'];
    $video = $rows[0]['video'];
    $user = $_SESSION['username'];
    $sql = "INSERT INTO Post (`user_id`, `image`, `details`, `post_date`, `likes`, `comments`, `username`,`video`) VALUES('$id','$img','$details',now(),0,0,'$user',$video)";
    $conn->query($sql);
    echo ("1");
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
}

if (isset($_POST['commentText'])) {
  $commentText = $_POST['commentText'];
  $id = $_POST['commentId'];
  $commentText = $conn->quote($commentText);
  try {
    $sql = "update comments set comment=$commentText where comment_id='$id'";

    $result = $conn->query($sql);
    $conn->query($sql);
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  showDetails();
  echo $_SESSION['detailsId'];
}

if (isset($_POST['deleteCommentId'])) {
  $deleteCommentId = $_POST['deleteCommentId'];
  try {
    $sql = "delete from comments where comment_id='$deleteCommentId'";

    $result = $conn->query($sql);
    $conn->query($sql);
  } catch (PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  }
  showDetails();
  echo $_SESSION['detailsId'];
}

if (isset($_POST['deleteFriend'])) {
  $deleteFriend = $_POST['deleteFriend'];
  $id = $_SESSION['id'];
  try {
    $sql = "delete from friend where user_id='$id' And friend_id='$deleteFriend'";

    $conn->query($sql);
  } catch (PDOException $e) {
  }

  try {
    $sql = "delete from friend where user_id='$deleteFriend' And friend_id='$id'";

    $conn->query($sql);
  } catch (PDOException $e) {
  }
  echo friends();
}

if (isset($_POST['deleteFriendRequest'])) {
  $deleteFriendRequest = $_POST['deleteFriendRequest'];
  $id = $_SESSION['id'];
  $sql = "delete from `request` where user_id='$id' AND request_id='$deleteFriendRequest'";
  $conn->query($sql);
}
?>