<?php  
session_start();
session_destroy();
?>
<style>
   .form{
      width: 330px; 
      margin: auto; 
      padding: 12px; 
      border-left: 2px solid #ccc;
      border-radius: 18px;
      margin-top:2%;
   }
   h3{
      color: purple; 
      text-align: center;
   }
   input{
      padding: 12px; 
      width: 100%; 
      margin-bottom: 12px; 
      border: 0px;
      border-radius: 6px;
      background-color: #ccc;
   }
   button{
      margin: 14px 0px;
       width: 100%;
       background-color: #008080;
       color: white;
       padding: 12px;
       font-size: 1rem;
       border-radius: 6px;
   }
   a,p{
      text-align: center;
      width:90%;
      margin-top:5px;
   }
   button:hover{
      cursor: pointer;
   }
   .red{
      text-align: center; 
      color: red;
   }
</style>
<div class="form">
<div class=""><h3>User Registration</h3></div>
<div class="" style="" >
<p class="" id="msg"></p>
 <form class="" role="form" id="signupForm" method="post" action="function.php?type=signup">
 <div class="">
    <label class="" for="name">Full Name:</label>
    <div class="">
      <input type="text" class="form-control" name="name" placeholder="Enter your First Name." required="required">
    </div>
  </div>
  <div class="">
    <label class="" for="name">User Name:</label>
    <div class="">
      <input type="text" class="form-control" name="username" placeholder="Enter your  User Name." required="required">
    </div>
  </div>
  <div class="">
    <label class="" for="username">Email Address:</label>
    <div class="">
      <input type="email" class="form-control" name="email" placeholder="Enter your Email Address." required="required">
    </div>
  </div>
  <div class="">
    <label class="" for="name">Phone Number:</label>
    <div class="">
      <input type="text" class="form-control" name="phonenumber" placeholder="Enter your Phone Number." required="required">
    </div>
  </div>
  <div class="">
    <label class="" for="password">Password:</label>
    <div class="">
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password." required="required">
    </div>
  </div>
  <div class="">
    <label class="" for="password">Confirm Password:</label>
    <div class="">
      <input type="password" class="form-control" name="confirmspassword" id="confirm_password" placeholder="Enter your password Repeat." required="required">
    </div>
  </div>
 
  <div class="">
 
      <button id="send" class="" type="submit">
         <span class="" ></span> Register
      </button>
	<?php echo (isset($_SESSION['msg'])) ? $_SESSION['msg'] : ''; ?>
      <P>Already Registered ? <a href="index.php">Login</a></P>
    
  </div>
</form>
</div>
</div>
<script>
  var password = document.getElementById("password");
  confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
   if(password.value != confirm_password.value) {
     confirm_password.setCustomValidity("Passwords Don't Match");
   } else {
     confirm_password.setCustomValidity('');
   }
  }
  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>
