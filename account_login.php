<?php include("include/connect.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>My Shopping Cart </title>
  <link rel="stylesheet" type="text/css" href="style/style.css"/>
</head>
<body style="background-color:white">
  <div id="main_wrapper"> 
    <div id="header"></div>
    <div id="main_c" style="height:500px;">
    <center>

     <?php
  if(isset($_GET['reg']))
  {
    ?>
    <form action="account_login.php"method="post" id="myform">
          <table style="">
          <tr><th> Customer Detail </th></tr>
          <tr><td>First Name* </td><td> <input type="text" value=""name="First_name" id="First_name"/> </td></tr>
          <tr><td>Last Name</td><td> <input type="text" value="" name="last_name" id="last_name"/> </td></tr>
          <tr><td>User Id*</td><td> <input type="text" value=""name="user_id" id="user_id"/> </td></tr>
          <tr><td>Password* </td><td> <input type="text" value=""name="password"id="password"/> </td></tr>
          <tr><td>Re-Password </td><td> <input type="text" value=""name="re_password"id="re_password"/> </td></tr>
          <tr><td>Email Id </td><td><input type="text"name="email_id"id="email_id"/></td></tr>
          <tr><td>Country </td><td><input type="text"name="country"id="country"/></td></tr>
          <tr><td>Street Address-1 </td><td><input type="text"name="street1"id="street1"/></td></tr>
          <tr><td>Street Address-2 </td><td><input type="text"name="street2"id="street2"/></td></tr>
          <tr><td>City </td><td><input type="text"name="city"id="city"/></td></tr>
          <tr><td>Zip Postal Code </td><td><input type="text"name="zip_code"id="zip_code"/></td></tr>
          <tr><td>Phone </td><td><input type="text"name="phone"id="phone"/></td></tr>
          </table> 
          <div id="btn_div"><input id="btn_reg"value="SUBMIT"type="submit"></div> 
          </form> 
        <?php
    }

    else if(isset($_POST['First_name']))
      {
          
          $first_name=$_POST['First_name'];
          $last_name=$_POST['last_name'];
          $user_id=$_POST['user_id'];
          $password=$_POST['password'];
          $email_id=$_POST['email_id'];
          $country=$_POST['country'];
          $street1=$_POST['street1'];
          $street2=$_POST['street2'];
          $city=$_POST['city'];
          $zip_code=$_POST['zip_code'];
          $phone=$_POST['phone'];   

              echo ' 
              
              <table id="myform" style="">
              <tr><th> Customer Detail </th></tr>
              <tr><td>First Name </td><td>'.$first_name.'</td></tr>
              <tr><td>Last Name</td><td>'.$last_name.'</td></tr>
              <tr><td>Email Id </td><td>'.$email_id.'</td></tr>
              <tr><td>Country </td><td>'.$country.'</td></tr>
              <tr><td>Street Address-1 </td><td><br/>'.$street1.'<br/>'.$street2.'</td></tr>
              <tr><td>City </td><td>'.$city.'</td></tr>
              <tr><td>Zip Postal Code </td><td>'.$zip_code.'</td></tr>
              <tr><td>Phone </td><td>'.$phone.'</td></tr>
              </table> 
               
               <form method="post" action="account_login.php?conform=2">
                 <input type="hidden" value="'.$first_name.'"name="first_name"/>
                 <input type="hidden" value="'.$last_name.'"name="last_name"/>
                 <input type="hidden" value="'.$user_id.'"name="user_id"/>
                 <input type="hidden" value="'.$password.'"name="password"/>
                 <input type="hidden" value="'.$email_id.'"name="email_id"/>
                 <input type="hidden" value="'.$country.'"name="country"/>
                 <input type="hidden" value="'.$street1.'"name="street1"/>
                 <input type="hidden" value="'.$street2.'"name="street2"/>
                 <input type="hidden" value="'.$city.'"name="city"/>
                 <input type="hidden" value="'.$zip_code.'"name="zip_code"/>
                 <input type="hidden" value="'.$phone.'"name="phone"/>
                 <input type="submit" value="conform"/>
               </form>';  
             }
           
        else if (isset($_GET['conform'])) 
        {
          $first_name=$_POST['first_name'];
          $last_name=$_POST['last_name'];
          $user_id=$_POST['user_id'];
          $password=$_POST['password'];
          $email_id=$_POST['email_id'];
          $country=$_POST['country'];
          $street1=$_POST['street1'];
          $street2=$_POST['street2'];
          $city=$_POST['city'];
          $zip_code=$_POST['zip_code'];
          $phone=$_POST['phone'];
          $count=mysql_query("select *from customer_detail where user_id='$user_id'");
          $count1=mysql_num_rows($count);
           if ($count1>0) 
             {
               echo "<script type='text/javascript'>alert('this user id is already exist');</script>";
               echo "<script type='text/javascript'>window.open('account_login.php?reg=5','_self');</script>";
             }
           else
            {
              $query="Insert into customer_detail(first_name,last_name,user_id,password,email_id,country,street1,street2,city,zipcode,phone)
              values('$first_name','$last_name','$user_id','$password','$email_id','$country','$street1','$street2','$city','$zip_code','$phone')"; 
              mysql_query($query) or die(mysql_error());
              echo "<script type='text/javascript'>alert(' Now you are register! ');</script>";
              echo "<script type='text/javascript'>window.open('index.php','_self');</script>";
           }
      }
    else if(isset($_POST['User_id']))
      {
          $User_id=$_POST['User_id'];
          $Password=$_POST['Password'];
          $count=mysql_query("select *from customer_detail where user_id='$User_id' and password='$Password'");
          $count1=mysql_num_rows($count);
          if ($count1<1) 
             {
               echo "<script type='text/javascript'>alert('Wrong cradencial!');</script>";
               echo "<script type='text/javascript'>window.open('account_login.php','_self');</script>";
             }
           else
            {
               $row=mysql_fetch_array($count);
               $user_id=$row['user_id'];
               $password=$row['password'];
               $username=$row['first_name'];
               session_start();
               $_SESSION['user_id']=$user_id;
               $_SESSION['password']=$password;
               $_SESSION['username']=$username;

               echo "<script type='text/javascript'>window.open('index.php','_self');</script>";
            }
        }
 else
 {
?>
  	
  		
  		<form action="account_login.php" method="post" id="myform">
  			<table>
  				<tr >
  					<td>LOGIN</td><td></td>
  				</tr>
  				<tr>
  					<td>User Id</td><td><input type="text" name="User_id" id="userid"></td>
  				</tr>
  				<tr>
  					<td>Password</td><td><input type="password" name="Password" id="password"></td>
  				</tr>
  				<tr>
  					<td></td><td><input id="sub"type="submit"value="LOGIN"></td>
  				</tr>
          <tr><td></td><td><a href="account_login.php?reg=5">Register</a></td></tr>
  			</table>
  		</form>
  		
  
    <?php
  }
  ?>
    </center>
    </div>
    <div id="footer">copyright&copy; all right reseved</div>

  </div>
</body>
</html>