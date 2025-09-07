<html>
<head>
<style>

.aa{


/* content: center; */

  /* border:2px solid red;  */
  /* border-collapse:collapse;    */
 margin-left: auto;
 margin-right: auto;
 /* padding:10px;
 color:red;  */
 font-weight:normal;
 text-align: center;
 margin-top :50px;

 width: 500px;
 border: 2px solid blue;
 padding: 50px;


 }

 .all:after {
   content:" *";
   color: red;
}

 </style>

</head>
<body>
<h3 style='text-align:center; color:blue; padding:20px'><u>
LOGIN DETAILS </h3></u></strong>

<form class="aa" action="<?php echo base_url().'/Home/login';?>" method="post">



<label class="all">E-mail:</label>
<input type="text" name="email" placeholder="Email id for login" required /><br><br>

<label class="all">Password:</label>
<input type="password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required /><br><br>

<div>

  <span><input type="text" name="recaptcha" id="recaptcha"></span>
</div>

<button type="submit" name= "login_user" value="log_user_db" style="background-pink: #008CBA;border-radius: 12px; cursor: pointer;">Submit</button>

</form>
<a href = '<?= base_url().'/Home/'?>' ><p style= 'margin-left: 28%;'>*Home</p></a>

</body>
</html>