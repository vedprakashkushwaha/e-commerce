<?php
include("include/connect.php")
?>

<form action="insert_customer_info.php"method="post">
          <table style="">
          <tr><th> Customer Detail </th></tr>
          <tr><td>First Name* </td><td> <input type="text" value=""name="first_name" id="first_name"/> </td></tr>
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
 	echo "<script type='text/javascript'>window.open('account_login.php','_self');</script>";

 }
 else
 {
   $query="Insert into customer_detail(first_name,last_name,user_id,password,email_id,country,street1,street2,city,zipcode,phone)
   values('$first_name','$last_name','$user_id','$password','$email_id','$country','$street1','$street2','$city','$zip_code','$phone')"; 
   mysql_query($query) or die(mysql_error());
   //echo "<script type='text/javascript'>window.open('out_of_project.php','_self');</script>";



   echo '<div class="main_container">';
       second();
       echo '<div id="myform">  
          <table style="">
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
          
          <div <a href=""><button id="btn"> continue </button> </a></div> 
          
          
       </div> 
    </div>';

   
 }
?>