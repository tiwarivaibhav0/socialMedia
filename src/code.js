$(document).ready(function () {
  (function () {
    "use strict";

    var forms = document.querySelectorAll(".needs-validation");

    Array.prototype.slice.call(forms).forEach(function (form) {
      form.addEventListener(
        "submit",
        function (event) {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }

          form.classList.add("was-validated");
        },
        false
      );
    });
  })();

  $("#Register").on("submit", function (e) {
    e.preventDefault();

    var email = $("#floatingemail").val();
    var fname = $("#floatingfname").val();
    var lname = $("#floatinglname").val();

    var checkUsername = $("#floatingusername").val();
    var password = $("#floatingPassword").val();
    var password2 = $("#floatingPassword2").val();
    var User_type = "user";
    var city = $("#floatingcity").val();
    var country = $("#floatingcountry").val();
    var pin = $("#floatingpin").val();
    var data = JSON.stringify($(this).serialize());

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { checkEmail: email, checkUsername: checkUsername },
      dataType: "text",
      success: function (result) {
        if (result == 0) {
          $("#reg").html("<strong>Email already in use</strong>");
        } else if (result == 1) {
          $("#reg").html("<strong>Username is already taken</strong>");
        } else {
          if (password == password2) {
            if (
              fname != "" &&
              lname != "" &&
              email != "" &&
              password != "" &&
              User_type != "" &&
              city != "" &&
              country != "" &&
              pin != ""
            ) {
              alert("Successfully Registerd!");
              $.ajax({
                url: "server.php",
                type: "POST",
                data: { data: data, User_type: User_type },
                dataType: "text",
                success: function (result) {
                  console.log(result);
                  // $("#result").html(result);
                  // alert("Successfully Registered");
                  window.location = "login.php";
                  // location.reload();
                },
                error: function () {},
              });
            } else {
              $("#Warning").html("<strong>All Fields are mandatory *</strong>");
            }
          } else {
            $("#reg").html("<strong>Passwords didn't match</strong>");
          }
        }
      },
      error: function () {},
    });
  });
  $("#Signin").on("submit", function () {
    //  e.preventDefault();
    var email = $("#loginEmail").val();
    var password = $("#loginPassword").val();
    var remember = document.getElementById("remember");
    if (remember.checked) {
      remember = 1;
    } else remember = 0;
    //  console.log(fname,lname,email,password,User_type);
    if (email != "" && password != "")
      $.ajax({
        url: "server.php",
        type: "POST",
        data: {
          loginEmail: email,
          loginPassword: password,
          remember: remember,
        },
        dataType: "text",
        success: function (result) {
          console.log(result);
          if (result != 0) window.location = "home.php";
          else {
            $("#reg").html("Invalid username or password</strong>");
          }
        },
        error: function () {},
      });
  });
  $(document).on("click", "#find", function () {
    //alert('Clicked');
    var findVal = $("#findVal").val();

    if (findVal != "")
      $.ajax({
        url: "server.php",
        type: "POST",
        data: { findFriend: findVal },
        dataType: "text",
        success: function (result) {
          console.log(result);
          location.reload();
        },
        error: function () {},
      });
  });

  $(document).on("keyup", "#loginEmail", function () {
    $("#reg").html("");
  });

  $(document).on("keyup", "#loginPassword", function () {
    $("#reg").html("");
  });

  $(document).on("click", "#showAll", function () {
    $.ajax({
      url: "server.php",
      type: "POST",
      data: { showAll: "showAll" },
      dataType: "text",
      success: function (result) {
        console.log(result);
        location.reload();
      },
      error: function () {},
    });
  });

  $(document).on("click", ".addFriend", function (e) {
    e.preventDefault();

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { addFriendClick: $(this).attr("id") },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        //location.reload();
      },
      error: function () {},
    });
  });

  $(document).on("click", ".acceptFriend", function (e) {
    e.preventDefault();
    //    alert($(this).attr("id"));
    $(this).closest(".req").remove();

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { acceptRequest: $(this).attr("id") },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        // location.reload();
      },
      error: function () {},
    });
  });

  $(document).on("click", ".like", function (e) {
    e.preventDefault();
    //alert($(this).attr("id"));
    $(this).css("color", "blue");
    $.ajax({
      url: "server.php",
      type: "POST",
      data: { editLikeID: $(this).attr("id") },
      dataType: "text",
      success: function (result) {
        console.log(result);
        $("#feed").html(result);
        // location.reload();
      },
      error: function () {},
    });
  });

  $(document).on("click", ".comments", function () {
    $.ajax({
      url: "server.php",
      type: "POST",
      data: { detailsProductId: $(this).attr("id") },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        window.location = "postDetails.php";
      },
      error: function () {},
    });
  });
  $(document).on("click", ".muteFriend", function () {
    // alert('muted');

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { muteFriend: $(this).attr("id") },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        $("#main").html(result);
      },
      error: function () {},
    });
  });

  $(document).on("click", ".unMuteFriend", function () {
    // alert('muted');

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { unMuteFriend: $(this).attr("id") },
      dataType: "text",
      success: function (result) {
        console.log(result);
        // // if(result!=0)
        $("#main").html(result);
      },
      error: function () {},
    });
  });

  $(document).on("click", "#postContent", function () {
    if ($("#postText").val() != "")
      $.ajax({
        url: "server.php",
        type: "POST",
        data: { postContent: $("#postText").val() },
        dataType: "text",
        success: function (result) {
          console.log(result);
          // // if(result!=0)
          location.reload();
        },
        error: function () {},
      });
  });

  $(document).on("click", "#commentBtn", function () {
    var comment = $("#comment").val();

    if (comment != "")
      $.ajax({
        url: "server.php",
        type: "POST",
        data: { comment: comment },
        dataType: "text",
        success: function (result) {
          console.log(result);
          $("#detailsProduct").html(result);
        },
        error: function () {},
      });
  });

  $(document).on("click", ".share", function (e) {
    e.preventDefault();
    if (window.confirm("Do you really want to share this Post?")) {
      $.ajax({
        url: "server.php",
        type: "POST",
        data: { shareId: $(this).attr("id") },
        dataType: "text",
        success: function (result) {
          console.log(result);
          // // if(result!=0)
          // window.location='Home.php';
          location.reload();
        },
        error: function () {},
      });
    }
    //alert($(this).attr("id"));
  });

  $(document).on("click", ".editComment", function (e) {
    e.preventDefault();

    if ($(this).text() == "Save") {
      var commentText = $(this)
        .closest("div.commentText")
        .find("textarea[name=commentText]")
        .val();
      if (commentText != "")
        $.ajax({
          url: "server.php",
          type: "POST",
          data: { commentText: commentText, commentId: $(this).attr("id") },
          dataType: "text",
          success: function (result) {
            console.log(result);

            $("#detailsProduct").html(result);
          },
          error: function () {},
        });
    } else {
      var editComment = $(this).attr("id");

      $("#" + editComment).attr("readonly", false);
      $(this).text("Save");
    }
  });

  $(document).on("click", ".deleteComment", function (e) {
    e.preventDefault();

    if (window.confirm("Do you really want to Delete your Comment?")) {
      $.ajax({
        url: "server.php",
        type: "POST",
        data: { deleteCommentId: $(this).attr("id") },
        dataType: "text",
        success: function (result) {
          console.log(result);
          $("#detailsProduct").html(result);
        },
        error: function () {},
      });
    }
  });

  $(document).on("click", ".deleteFriend", function (e) {
    e.preventDefault();
    //alert($(this).attr("id"));

    if (window.confirm("Do you really want to unfriend this Person?")) {
      $.ajax({
        url: "server.php",
        type: "POST",
        data: { deleteFriend: $(this).attr("id") },
        dataType: "text",
        success: function (result) {
          console.log(result);
          // // if(result!=0)
          $("#main").html(result);
        },
        error: function () {},
      });
    }
  });
  $(document).on("click", ".deleteFriendRequest", function (e) {
    $(this).closest(".req").remove();

    $.ajax({
      url: "server.php",
      type: "POST",
      data: { deleteFriendRequest: $(this).attr("id") },
      dataType: "text",
      success: function (result) {
        console.log(result);
      },
      error: function () {},
    });
  });
});
