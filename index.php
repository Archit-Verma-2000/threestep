<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Centered Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    body {
      display: flex;
      flex-direction:column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-color: #f8f9fa; /* Light background color */
    }

    .form-container {
      width: 50%; /* Half of the width */
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
   
    #errInputName,#errInputEmail{
        color:red;
    }
    .is-invalid{
        display:none;
    }
    .bi-dot{
      font-size:3rem;
    }
    .form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #fff;
    outline: 0;
    box-shadow:0;
  }
  .dnone{
    display:none;
  }
  #errRepeatPassword,#errPassword{
    color:red;
  }
  </style>
 
  
  
</head>
<body>
    
  <?php
    if(isset($_GET["page"]))
    {
      if($_GET["page"]=="second")
      {
        require "second-form.php";
      }
      else if($_GET["page"]=="third")
      {
        require "third-form.php";
      }
    }
    else
    {
      require "first-form.php";
    }
  ?>
  <div style="display:block" class="dots">
      <i class="bi bi-dot"></i>
      <i class="bi bi-dot"></i>
      <i class="bi bi-dot"></i>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
          let nameError=true;
          let emailError = true;
          let emailNotValid=false;
          let nameNotValid=false
          $("#resform1").addClass("dnone");
          $("#resform2").addClass("dnone");
          $("#InputName").on("keyup",function(){
                
                let name=$("#InputName").val();
                console.log(name);
                $("#InputName").css({"border":"3px solid red"});
                if(name.length=="")
                {
                  
                  $("#errInputName").html("*Name field is required");
                }
                else if(name.length<3 )
                {   
                    $("#errInputName").html("Name must have minimum of 3 characters");
                    nameNotValid=true
                }
                else if(name.length>10)
                {  
                    $("#errInputName").html("Name must have maximum of 10 characters");
                    nameNotValid=true
                }
                else
                {   
                  $("#InputName").css({"border":"3px solid green"});
                  nameError=false;
                  nameNotValid=false
                  $("#errInputName").html(" "); 
                }
               
            });
            $("#InputEmail").on("keyup",function(){
              
              $("#InputEmail").css({"border":"3px solid red"});
                regex=/^[a-zA-z'-\s]+$/;
                let email=$("#InputEmail").val();
                let c=email.slice(-1);
                console.log(c);
              
                regex=/^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/; 

                if (regex.test(email)) {
                    $("#errInputEmail").html(" ");
                    $("#InputEmail").css({"border":"3px solid green"});
                    emailError = false;
                    emailNotValid=false;
                    
                }
                else if(email=="")
                {
                  $("#errInputEmail").html("Email field is required");
                  $("#InputEmail").css({"border":"3px solid red"});  
                 
                } 
                else {
                    $("#errInputEmail").html("Email not valid");
                    $("#InputEmail").css({"border":"3px solid red"});
                    emailNotValid=true;
                }
                
            })
            $("#btnstep2").on("click",function(e){
              
              e.preventDefault();
              console.log("inside btnstep2");
              console.log("nameNotValid="+nameNotValid)
              console.log("emailNotValid="+emailNotValid)
              if((nameError==true||emailError==true)||(nameError==true && emailError==true))
              {
                  $("#resform1").removeClass("dnone");
                  $("#msgform1").html("fields cant be empty");
                  $("#cancelform1").on("click",function(){
                    $(this).parent().parent().addClass("dnone");
                  })
              }
              else if((nameNotValid==true||emailNotValid==true))
              {
                  $("#resform1").removeClass("dnone");
                  $("#msgform1").html("Either name or email not valid");
              }
              else if((nameNotValid==true && emailNotValid==true))
              {
                $("#resform1").removeClass("dnone");
                $("#msgform1").html("name and email not valid");
              }
              else
              {
                  $.ajax({
                      url:"action.php",
                      method:"post",
                      data:$("#form1").serialize()+"&action=register",
                      dataType:"json",
                      success:function(response){
                        if(response.status=="success")
                        {
                          console.log("entered success");
                          window.location.href="index.php?page=second";
                        }
                        else if(response.status=="failed")
                        {
                          $("#resform1").removeClass("dnone");
                          $("#msgform1").html(response.msg);
                          $("#cancelform1").on("click",function(){
                            $(this).parent().parent().addClass("dnone");
                          })
                          console.log("entered failed");
                        }
                      }
                  });
              }
            });
            $("#btnstep3").on("click",function(e){

            e.preventDefault();
            var date=$("#date").val().split("-");
            if($.isEmptyObject($("#date").val()))
            {
                console.log("date field empty");
                $("#resform2").removeClass("dnone");
                $("#msgform2").html("date field cant be empty");
                $("#cancelform2").on("click",function(){
                    $(this).parent().parent().addClass("dnone");
                })
            }
            else
            {
              window.location.href="index.php?page=third";   
            }
          });

          /*Third form validation*/
            $("#InputPassword").on("keyup",function(){
                regex=/^(?=.*[A-Za-z])(?=.*[0-9])(?=.*[@$!%#*?&])$/
            })
          /*Third form validation end*/
        });
    </script>
</html>

