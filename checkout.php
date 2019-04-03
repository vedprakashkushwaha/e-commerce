<?php
session_start();
include("include/connect.php");
error_reporting(0);
?>
<html>
<head>
	<title>My Shopping Cart </title>
  <script src="jquery-1.11.3.min.js"></script>
  <script>
     $(document).ready(function(){
      var sb_he=$("#cart_item").height();
      var pc_he=$("#detail").height();
      if(pc_he<sb_he)
       $("#main_con").height(sb_he);
       });     
    </script>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
	<style type="text/css">
      #main_con
      {
      	min-height: 500px;
      } 
      center
      {
      	padding-top: 100px;
      }
      td
      {
      	padding: 5px;
      }
      #main_con
      {
      	width: 100%;
      	height: auto;
      }
      #cart_item
      {
      	width: 55%;
      	float: right;
      	margin-top: -40px;

      }
      #detail
      {
      	width:40%;
      	float: ;
      }
	</style>
</head>
<body>
  <div id="main_wrapper">
     <div id="header"></div>
      <div id="main_con">
    <?php
      if(isset($_POST['userid'])&&isset($_POST['password']))
        {
         $fuser_id=$_POST['userid'];
         $fpassword=$_POST['password'];
         $myquery=mysql_query("select *from customer_detail where user_id='$fuser_id'&& password='$fpassword'");
         $row=mysql_fetch_array($myquery);
         $dbuser_id=$row['user_id'];
         $dbpassword=$row['password'];
         $first_name=$row['first_name'];
         $last_name=$row['last_name'];
         $email_id=$row['email_id'];
         $country=$row['country'];
         $street=$row['street1'];
         $streets=$row['street2'];
         $city=$row['city'];
         $zipcode=$row['zipcode'];
         $phone=$row['phone'];
         $count=mysql_num_rows($myquery);
         if($count<1)
          {
            echo "<script type='text/javascript'>alert('Wrong credencial');</script>";
            echo "<script type='text/javascript'>window.open('checkout.php','_self');</script>";
           }
         else
          {
             
             echo "<div id='cart_item'>";
              include('mycart_item.php'); 
             echo "</div>";
             echo'<div id="detail"><table>
             <tr><th> Customer Detail </th></tr>
             <tr><td>First Name </td><td>'.$first_name.'</td></tr>
             <tr><td>Last Name</td><td>'.$last_name.'</td></tr>
             <tr><td>Email Id </td><td>'.$email_id.'</td></tr>
             <tr><td>Country </td><td>'.$country.'</td></tr>
             <tr><td>Street Address-1 </td><td><br/>'.$street.'<br/>'.$streets.'</td></tr>          
             <tr><td>City </td><td>'.$city.'</td></tr>
             <tr><td>Zip Postal Code </td><td>'.$zipcode.'</td></tr>
             <tr><td>Phone </td><td>'.$phone.'</td></tr>
            </table></div>';  
          }

      }

      else if(isset($_SESSION['user_id']))
        {
          $fuser_id=$_SESSION['user_id'];
          $fpassword=$_SESSION['password'];
          $myquery=mysql_query("select *from customer_detail where user_id='$fuser_id'&& password='$fpassword'") or die(mysql_error());
          $row=mysql_fetch_array($myquery);
          $dbuser_id=$row['user_id'];
          $dbpassword=$row['password'];
          $first_name=$row['first_name'];
          $last_name=$row['last_name'];
          $email_id=$row['email_id'];
          $country=$row['country'];
          $street=$row['street1'];
          $streets=$row['street2'];
          $city=$row['city'];
          $zipcode=$row['zipcode'];
          $phone=$row['phone'];
          
          echo "<div id='cart_item'>";
         include('mycart_item.php'); 
         echo "</div>";

          echo '<div id="detail"><table style="">
          <tr><th> Customer Detail </th></tr>
          <tr><td>First Name </td><td>'.$first_name.'</td></tr>
          <tr><td>Last Name</td><td>'.$last_name.'</td></tr>
          <tr><td>Email Id </td><td>'.$email_id.'</td></tr>
          <tr><td>Country </td><td>'.$country.'</td></tr>
          <tr><td>Street Address-1 </td><td><br/>'.$street.'<br/>'.$streets.'</td></tr>
          <tr><td>City </td><td>'.$city.'</td></tr>
          <tr><td>Zip Postal Code </td><td>'.$zipcode.'</td></tr>
          <tr><td>Phone </td><td>'.$phone.'</td></tr>
          </table> </div>';
        
        }
     
      else
      {
    ?>      	 

      	 <center>
      <form action="checkout.php" method="post">
        
        <table>
          <tr>
          <th>Registerd User</th><th></th>
          </tr>
          <tr>
            <td>User Id</td><td><input type="text" name="userid" id="userid"></td>
          </tr>
          <tr>
            <td>Password</td><td><input type="password" name="password" id="password"></td>
          </tr>
          <tr>
           <th></th> <th id="sub1"><input id="sub"type="submit"value="LOGIN"></th>
          </tr>
          <tr>
           <th id="a"> <a href="checkout2.php?guest=5"> Check As A Guest</a></th> <th id="a" style="float:right"> <a href="checkout2.php?reg=5">
           Register</a></th>
          </tr>
        </table>
      </form>
      </center>
      <?php } ?>
      </div>
   </div>
    <div id="footer">
    	<p>©2015 www.hamdarditcenter.com </p>
    </div>
  
  </div>
</body>
</html>