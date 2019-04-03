<?php 
  session_start();
  include("phpfunction/myfunction.php");
  cart();
 ?>
<?php
  if(isset($_GET['logout']))
  {
  	unset($_SESSION['username']);
  	unset($_SESSION['user_id']);
  	unset($_SESSION['password']);
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Shopping Cart </title>
	<link rel="stylesheet" type="text/css" href="style/style.css"/>

   <script src="jquery-1.11.3.min.js"></script>
  <script>
     $(document).ready(function(){
      var sb_he=$("#side_bar").height();
      var pc_he=$("#product_c").height();
      if(pc_he>sb_he)
       $("#side_bar").height(pc_he);
       });     
    </script>

</head>
<body>
  <div id="main_wrapper">
    
    <div id="header"><h1><?php additem(); ?></h1></div>
    <div id="menu_bar">
    	<center><table>
    	<tr>
    	   <td> <a href="index.php">Home</a></td>
    	   <td><a href="index.php?all_product=4">All Products</a></td>
           <td><a href="account_login.php">My Account</a></td>
           <td>Sign In</td>
           <td><a href="mycart.php">My Cart</a></td>
           <td>Contact Us</td>
           <td><a href="admin_area/admin_login.php">Admin<a></td>
           <td style="text-align:right"><form><input style="height:21px;border-radius:10px" 
               type="text"placeholder="Search product"size="20" name="search_id"/><input type="submit" value="Search"  /></form>
           </td>
    	</tr>
    	</table></center>
    </div>
    <div id="cart_bar">
      <span id="cart_font">
        <span style="color:yellow;margin-left:10px;float:left">  Welcome :<?php 
        if(isset($_SESSION['username']))
        {
        	echo $_SESSION['username'];
        	echo '<a href="index.php?logout=4" style="color:red;text-decoration:none;font-weight:bold;
        	margin-left:70px">LogOut</a>';
        }
        else
        {
        	echo " Guest!";
        }

      ?>
       </span > <b style="color:white;margin-left:50px">
          Item In Cart : <?php updateItems(); ?>  &nbsp&nbsp&nbsp&nbsp&nbsp Total Amount : <?php amount(); ?> </b>&nbsp&nbsp&nbsp&nbsp 
          <a href="mycart.php" style="color:yellow;text-decoration:none;float:right;margin-right:20px;">Checkout</a> 
      </span> 	
      

    </div>
    <div id="main_c">
    	<div id="product_c">
    	    <?php get_product(); ?>
    	</div>
    	 <div id="side_bar">
    		<ul>		
              <li class="li_h">Categories</li>
              <?php get_cat_li(); ?>
              <li class="li_h">Brands</li>
              <?php get_brand_li(); ?>
    		</ul>
    	  </div>
        </div>
    <div id="footer">
    	<p>©2015 www.hamdarditcenter.com </p>
    </div>
  
  </div>
</body>
</html>