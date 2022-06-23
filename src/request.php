<?php
include 'header.php';
if (isset($_SESSION['user']))
  if ($_SESSION['admin'] == 1)
    header('Location: dashboard.php');


?>

<link rel="stylesheet" href="style.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
  $(function() {
    $("#tabs").tabs();
  });
</script>
</head>

<body>
  <!-- header starts -->
  <div class="header">
    <div class="header__left">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="home.php">SocialContract.com</a>

      <!-- <div class="header__input">
          <span class="material-icons"> search </span>
          <input type="text" placeholder="Search Facebook" />
        </div> -->
    </div>



    <div class="header__right">
      <div class="header__info">

        <?php if (isset($_SESSION['user'])) { ?>

          <a class="nav-link px-3 " href="request.php">
            <span class='bi bi-person-x-fill' style='color:#000; height:25px'></span>
            <?php if (isset($_SESSION['request'])) { ?>
              <span class="position-absolute  translate-middle badge rounded-pill bg-danger">
                <?php echo (count($_SESSION['request'])); ?>
              </span>
          <?php }
          }
          ?>
          </a>
          <a class="nav-link px-3 text-info" href="find.php">Search for Friends!</a>

          <img class="user__avatar" src="data:image/png;base64" alt="" />
          <a href="friends.php" style="text-decoration:none" class="text-muted"> <?php echo "<span class='mx-2' >" . $_SESSION['user'] . " </span>"; ?></a>

      </div>

      <a href="logout.php"> <span class="material-icons"> logout </span></a>





    </div>
  </div>

  <br>
  <main>



    <br>



    <div class="container marketing " style="width: 60%;">
      <hr>
      <hr>
      <div class="row">

        <?php
        $id = $_SESSION['id'];
        try {
          $sql = "select * from User inner join request on User.user_id=request.request_id  where request.user_id='$id' ";

          $result = $conn->query($sql);
          $rows = $result->fetchAll(PDO::FETCH_ASSOC);
          $_SESSION['request'] = $rows;
        } catch (PDOException $e) {
          //echo "Connection failed: " . $e->getMessage();
        }







        if (count($rows) > 0) {
          foreach ($rows as $key => $val) {     ?>
            <div class="col-lg-12 row req" id="searchFriends">

              <div class="col">
                <img src="<?php echo ($val['picture'])   ?>" class="border" style="border-radius: 25px;" alt="" width="50%">
                <br><br>
              </div>
              <div class="col">
                <span class="h3"><?php echo ($val['fname'] . ' ' . $val['lname']);   ?></span>
                <span class="h5">(<?php echo ($val['username']);   ?>)</span>
              </div>
              <div class="col">
                <p><a class="btn btn-primary float-end acceptFriend" href="#" id="<?php echo ($val['request_id'])   ?>">Accept</a>
                  <a class="btn btn-danger float-end deleteFriendRequest" href="#" id="<?php echo ($val['request_id'])   ?>">Delete</a>
                </p>

                </p>

              </div>
            </div>
            <br>
            <hr>

        <?php
          }
        } else {
          echo ("No new requests!");
        }
        ?>

      </div><!-- /.row -->


    </div><!-- /.container -->



  </main>







  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>

</body>

</html>