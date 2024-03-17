$("document").ready(function(e){
    $("#loginForm").submit(function(e){
      e.preventDefault();
      let username = $("#user").val();
      let password = $("#pass").val();

      $.ajax({
        type: "POST",
        url: "./PHP/login.php",
        data: {username: username, password: password},
        beforeSend: function(){
          // $(".loading").text("Loading...");
        },
        success: function(response){
          // alert(response);
          $("#message").html(response).css({
            "color":"green",
            "textAlign":"center",
            "letter-spacing":"5px",
            "word-spacing":"3px"
          });
          if(response.includes("Login was Successful")){
            // change text and add opacity
            $("#submitBtn").text("Redirecting...").css("opacity", 0.5)
            // Redirect to dashboard.php after a short delay (e.g., 2 seconds)
            setTimeout(function(){
              window.location.href = "./dashboard.php";
            }, 5000)
          }
        },
        error: function(err){
          $("#message").text(err);
        }
      })
    })
  })