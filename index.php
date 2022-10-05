<?php  
session_start();
session_destroy();
if(!empty($_SESSION['result']['id'])) {
header('location:profile.php');
}
?>
<style>
   .form{
      width: 280px; 
      margin: auto; 
      padding: 12px; 
      border-left: 2px solid #ccc;
      border-radius: 18px;
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
   p{
      text-align: center;
   }
   button:hover{
      cursor: pointer;
   }
   .red{
      text-align: center; 
      color: red;
   }
</style>

<div class="form" style="">
<div class=""><h3>User Login</h3></div>
<div class="" style="" >
<p class="" id="msg"><?php echo (isset($_SESSION['msg'])) ? $_SESSION['msg'] : ''; ?></p>
 <form class="" role="form" id="loginForm" method="post" action="function.php?type=login">
  <div class="">
    <label class="" for="username">Email Address:</label>
    <div class="">
      <input type="email" class="form-control" name="email" placeholder="Enter Email Address" required="required">
    </div>
  </div>
  <div class="">
    <label class="" for="password">Password:</label>
    <div class="">
      <input type="password" class="form-control" name="password" placeholder="Enter Password" required="required">
    </div>
  </div>
 
  <div class="form-group">
 
      <button  id="send" class="" type="submit">
         <span class="" ></span> Login
      </button>
   
      <P>Don't Have Registered ? <a href="register.php">Register</a></P>
 
  </div>
</form>
</div>
</div>
</body>
</html>
