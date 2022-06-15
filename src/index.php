<?php
include 'header.php';

if(isset($_SESSION['user']))
 header('location:home.php');

?>

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

    
    <!-- Custom styles for this template -->
    <link href="register.css" rel="stylesheet">
  </head>

  <body>
  <title>SocialContract.com</title>

<!-- <div class=" modal-sheet position-static d-block  py-5" tabindex="-1" role="dialog" id="modalSheet"> -->
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-6 shadow pt-2">

<div class="modal-body p-4 pt-2  ">
         <form class="needs-validation" novalidate action="#" id="Register"> 
       
    <div class="form-floating mb-3" id="Warning">
            
          </div><div class="form-floating mb-3">
            <input type="text" name="fname" class="form-control rounded-4" id="floatingfname" placeholder="First Name" required>
            <label for="floatingfname">First Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="lname" class="form-control rounded-4" id="floatinglname" placeholder="Last Name" required>
            <label for="floatinglname">Last Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control rounded-4" id="floatingemail" placeholder="name@example.com" required>
            <label for="floatingemail">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control rounded-4" id="floatingusername" placeholder="username" required>
            <label for="floatingemail">Username </label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  name="mobile" class="form-control rounded-4" id="floatingmobile" placeholder="Mobile No." maxlength="10" required>
            <label for="floatingemail">Mobile No. </label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="city" class="form-control rounded-4" id="floatingusercity" placeholder="City" required>
            <label for="floatingemail">City </label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" name="Country" class="form-control rounded-4" id="floatingcountry" placeholder="Country" required>
            <label for="floatingemail">Country </label>
          </div>

          <div class="form-floating mb-3">
            <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="pin" class="form-control rounded-4" id="floatingpin" placeholder="Pin Code" maxlength="6" required>
            <label for="floatingemail">Pin Code </label>
          </div>

          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4" id="floatingPassword2" placeholder="Password" required>
            <label for="floatingPassword">Enter same Password as above</label>
          </div>
          <div class="form-floating mb-3" id="reg">
            
          </div>
          <!-- <div class="form-floating mb-3"> -->
           <!-- <select name="User_type" id="User_type" class="form-control rounded-4" required>
             <option value="admin">Admin</option>
             <option value="user">User</option>

             <option value="customer">Customer</option>

             <option value="manager">Manager</option>

           </select>

          <label for="floatingPassword">Select User Type</label>
          </div> -->
          
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit">Sign up</button>
          <small class="text-muted">By clicking Sign up, you agree to the terms of use.</small>
          <p>Have an account? <a href="login.php">Login</a></p>
         
        </form>
      </div>
    </div>
  </div>
</div>

<div class="b-example-divider"></div>


    <script src="/js/bootstrap.bundle.min.js"></script>  

  </body>

