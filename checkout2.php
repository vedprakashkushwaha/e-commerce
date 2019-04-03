<html>
<head>
	<title>My Shopping Cart </title>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>
  <script src="jquery-1.11.3.min.js"></script>
  <script>
     $(document).ready(function(){
      var sb_he=$("#cart_item").height();
      var pc_he=$("#detail").height();
      if(pc_he<sb_he)
       $("#main_con").height(sb_he);
       });     
    </script>
	<style type="text/css">
      #main_con
      {
      	min-height: 500px;
        width:100%;
      } 
      td
      {
      	padding: 5px;
        text-align: center;
      }
      #main_con
      {
         width: 100%;
         margin-top: 10px;
      }
      #cart_item
      {
        width:50%; 
        background-color: white;
        border:1px solid pink;
        float: right;
        min-height: 400px;
        margin:10px;
        margin-top: -5px;
      }
     #detail 
      {
        background-color:pink;
        margin: 5px;
        border:1px solid pink;
        min-height: 400px;
        width: 40%;
        text-align: left;
      }
    #detail td
    {
       text-align: left;
     } 
     

	</style>
    
</head>
<body>
  <div id="main_wrapper">
     <div id="header"></div>
      <div id="main_con">
      
      <div id="cart_item">
        <?php include("mycart_item.php"); ?>
      </div>

      <div id="detail">
        <?php
          
        if(isset($_GET['conform']))
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
           
          $query="Insert into customer_detail(first_name,last_name,user_id,password,email_id,country,street1,street2,city,zipcode,phone)
          values('$first_name','$last_name','$user_id','$password','$email_id','$country','$street1','$street2','$city','$zip_code','$phone')"; 
          mysql_query($query) or die(mysql_error());
          echo "<script type='text/javascript'>window.open('final_checkout.php','_self');</script>"; 
        }
        
        if(isset($_GET['reg']))
          {
           echo '<div id="myform">
         <form action="checkout2.php?reg1=5"method="post">
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
          <table><tr><td><div id="btn_div"><input id="btn_reg"value="SUBMIT"type="submit"></div> </td> </tr></table>
          </form> 
         </div>';
          }

        elseif (isset($_GET['guest'])) 
        {
          echo '<div id="myform">
         <form action="checkout2.php?guest1=5"method="post">
          <table style="">
          <tr><th> Customer Detail </th></tr>
          <tr><td>First Name* </td><td> <input type="text" value=""name="first_name" id="first_name"/> </td></tr>
          <tr><td>Last Name</td><td> <input type="text" value="" name="last_name" id="last_name"/> </td></tr>
          <tr><td>Email Id </td><td><input type="text"name="email_id"id="email_id"/></td></tr>
          <tr><td>Country </td><td><input type="text"name="country"id="country"/></td></tr>
          <tr><td>Street Address-1 </td><td><input type="text"name="street1"id="street1"/></td></tr>
          <tr><td>Street Address-2 </td><td><input type="text"name="street2"id="street2"/></td></tr>
          <tr><td>City </td><td><input type="text"name="city"id="city"/></td></tr>
          <tr><td>Zip Postal Code </td><td><input type="text"name="zip_code"id="zip_code"/></td></tr>
          <tr><td>Phone </td><td><input type="text"name="phone"id="phone"/></td></tr>
          </table> 
          <table><tr><td><input id="btn_reg"value="SUBMIT"type="submit"> </td> </tr></table>
          </form> 
         </div>';
        }
       

    else if(isset($_GET['reg1']))
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
               
               <form method="post" action="checkout2.php?conform=2">
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
                 <table><tr><td><input id="btn_reg"value="conform"type="submit"> </td> </tr></table>
                
               </form>'; 
        } 

     else if(isset($_GET['guest1']))
      {
          
          $first_name=$_POST['first_name'];
          $last_name=$_POST['last_name'];
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
               
               <form method="post" action="checkout2.php?conform_guest=2">
                 <input type="hidden" value="'.$first_name.'"name="first_name"/>
                 <input type="hidden" value="'.$last_name.'"name="last_name"/>
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

    ?>
         


      </div>	 
     
     </div>
    <div id="footer">
    	<p> ©2015 www.hamdarditcenter.com </p>
    </div>

  </div>
 </body>
</html>