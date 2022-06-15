<?php
include 'header.php';
if (isset($_SESSION['user']))
  if ($_SESSION['admin'] == 1)
    header('Location: dashboard.php');


?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link href="home.css" rel="stylesheet">

<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  
</style>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="home.php">SocialContract.com</a>


    <div class="navbar-nav">
      <ul class="navbar">
        <?php if (isset($_SESSION['user'])) { ?>

     <a class="nav-link px-3 " href="request.php">
     <span class='bi bi-person-x-fill' style='color:#fff; height:25px'></span>
     <?php if(isset($_SESSION['request'])) { ?>
     <span class="position-absolute  translate-middle badge rounded-pill bg-danger">
     <?php echo(count($_SESSION['request'])); ?>
      </span>
    <?php }
    ?> 
    </a>
          <a class="nav-link px-3 text-info" href="find.php">Search for Friends!</a>

          <a class="nav-link px-3 " href="logout.php">Sign out</a>
          <a href="myOrders.php" style="text-decoration:none"> <?php echo "<span class='text-white mx-2' >" . $_SESSION['user'] . " </span>"; ?></a>


      </ul>

    </div>
  <?php } else { ?>
    <a class="nav-link px-3 btn btn-light text-dark mx-3" href="login.php">Log in</a>


    </ul>

  <?php  } ?>
  </header>


  <br>

  <div id="tabs">
  <ul>
    <li><a href="#tabs-1">Timeline</a></li>
    <li><a href="#tabs-2">My Posts</a></li>
  </ul>
  <div id="tabs-2">

  <main>
    <div class="container ">

      <div class="container marketing">

        <div class="row justify-content-end">
          <?php
          try {
            $id=$_SESSION['id'];

            $sql = "SELECT *
                     from Post where `user_id`='$id' ";
            $res = $conn->query($sql);

            $rows = $res->fetchAll(PDO::FETCH_ASSOC);

            // echo(count($rows));

          } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          } ?>






          <?php foreach ($rows as $key => $val) {     ?>
            <div class="col-lg-8 float-right">
              <a href="#" style="text-decoration: none;">      <h3 class="text-info">@<?php echo ($val['username'])   ?></h3></a>
      

              <span ><img src="<?php echo ($val['image'])   ?>" alt="" width="65%"></span>
              <p><?php echo ($val['details'])   ?></p>
              <div style="width: 25%;" class="row">  <span class="col"><a href="#"><i class="bi bi-hand-thumbs-up"></i><?php echo ($val['likes'])   ?></a></span>
              <span class="col" ><a href="#" class="float-end comment" id='<?php echo ($val['post_id'])   ?>'><i class="bi bi-chat"></i><?php echo ($val['comments'])   ?></a></span></div>
              <br> <p><a class="btn btn-primary" href="#">Share &raquo;</a> </p>
            

            </div>
            <hr><!-- /.col-lg-4 -->
            <!-- /.row -->

          <?php
          }
          ?>

        </div><!-- /.container -->



      </div>


      <br>

  </main>



</div>
  <div id="tabs-1">


  <main>
    <div class="container ">

      <div class="container marketing">

        <div class="row justify-content-end">
          <?php
          try {

            $sql = "SELECT *
                     from Post where user_id IN (SELECT friend_id
            FROM friend where user_id='$id')";
            $res = $conn->query($sql);

            $rows = $res->fetchAll(PDO::FETCH_ASSOC);

            // echo(count($rows));

          } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          } ?>




         <div id="feed">

          <?php foreach ($rows as $key => $val) {  
          if($val['user_id']!=$_SESSION['id']){
            
           
                          
            $txt='<div class="col-lg-8 float-end"><a href="#" style="text-decoration: none;"> 
                 <span class="text-info h4">@'.$val['username'].'</span></a>
              <a href="#" class="text-dark" style="margin-left: 37%;">(Mute)</a>
            <br>
              <span ><img src="'.$val['image'].'" alt="" width="65%"></span>
              <p>'.$val['details'].'</p>
              <div style="width: 25%;" class="row">  <span class="col"><a href="#" class="like" id="'.$val['post_id'].'"><i class="bi bi-hand-thumbs-up"></i>'.$val['likes'].'</a></span>
              <span class="col" ><a href="#" class="float-end comment" id="'.$val['post_id'].'"><i class="bi bi-chat"></i>'.$val['comments'].'</a></span></div>
              <br> <p><a class="btn btn-primary" href="#">Share &raquo;</a> </p>
            

            </div>
            <hr>';
            

          
          }
        }
        echo $txt;
          ?>

        </div>

        </div>

      </div>


      <br>

  </main>














</div>

</div>








  <footer class="text-muted py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
    </div>
  </footer>

</body>

</html>