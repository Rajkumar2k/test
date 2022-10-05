<?php 

session_start();


 ?>
<!DOCTYPE html>

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
   button{
      margin: 14px 0px;
       width: 60%;
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

<?php 
require_once('userClass.php');
$userObj = new USER();
$userInfo = $userObj->getUserById($_SESSION['result']['id']);
//echo ""; print_r($userInfo); exit;
 ?>

<div class="form">
<div class=""><h3>User Profile</h3></div>
<div class="" style="height:40%; text-align:center;" >
<p class="" id="msg"></p>
 <form class="" role="form" id="signupForm" method="post" action="function.php?formType=signup">
 <div class="">
    <label class="" for="name">Full Name:</label>
    <div class="label">
     <?php echo $userInfo['result']['name']; ?>
    </div>
  </div>
  <div class="label">
    <label class="" for="username">Username:</label>
    <div class="">
      <?php echo $userInfo['result']['username']; ?>
    </div>
  </div>
  <div class="label">
    <label class="" for="name">Email  :</label>
    <div class="">
     <?php echo $userInfo['result']['email']; ?>
    </div>
  </div>
  <div class="label">
    <label class="" for="name">Phone Number:</label>
    <div class="">
     <?php echo $userInfo['result']['phonenumber']; ?>
    </div>
  </div>
 <div class="label">
    <label class="" for="password">Password:</label> 
    <div class="">
      <?php echo '***************' ?> &nbsp;<a href="#">show</a>
    </div>
  </div>
  <div class="label">
    <button>
      <a href="function.php?type=logout" class="" style="">
         <span class="" ></span> Logout
      </a></button>
  </div>
</form>
</div>
</div>
</body>
</html>
