
<?php 
 include("include/connect.php"); 
 session_start();  
 //error_reporting(1); 
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style/style.css"/>
  <style type="text/css">
    table
    {
      width: 95%;
      margin: 30px auto; 
    }
    td
    {
      padding: 5px;
      border: 1px solid pink;
      text-align: center;
    }
    tr
    {

    }
    td img
    {
      height: 100px;
      width: 100px;
      float: left;
    }
    #title
    {
      
    }
    #savebtn
    {
      background-color: white;
      border: 1px solid white;
      color: blue;
    }
    #savebtn:hover
    {
      text-decoration: underline;
    }
    #main_con
    {
       min-height:500px;
    }
  </style>
</head>
<body>
<?php   
 function getIp() 
    {
      $ip = $_SERVER['REMOTE_ADDR'];
      if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
       {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
       } 
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
       {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
       }
      return $ip;
     }
  
  $_SESSION['ip_add']=getIp();
 ?>
 <?php
      if(isset($_SESSION['user_id']))
      {
        $user_id=$_SESSION['user_id'];
        $count=mysql_query("select *from cart where userid='$user_id' AND checkout_date=0000-00-00");
        $num=mysql_num_rows($count);
        if($num<1)
         {
           echo "<script type='text/javascript'>alert('your cart is empty');</script>";
           echo "<script type='text/javascript'>window.open('index.php','_self');</script>";
         }
       }
      else
      {
        //$count=mysql_query("select *from cart where userid='guest' AND checkout_date=0000-00-00");
        //$num=mysql_num_rows($count);
        $num=sizeof($_SESSION['cart']);
        if($num<1)
         {
           echo "<script type='text/javascript'>alert('your cart is empty');</script>";
           echo "<script type='text/javascript'>window.open('index.php','_self');</script>";
         }
      }
 ?>

  <?php
  if(isset($_GET['cancel']))
  {
    if(isset($_SESSION['user_id']))
    {
      $user_id=$_SESSION['user_id'];
      mysql_query("delete from cart where userid='$user_id' AND checkout_date=0000-00-00");
      echo "<script type='text/javascript'>window.open('index.php','_self');</script>";
    }
   else
   {
      unset($_SESSION['cart']);
      echo "<script type='text/javascript'>window.open('index.php','_self');</script>";
      /*$user_id='guest';
      mysql_query("delete from cart where userid='$user_id' AND checkout_date=0000-00-00");
      echo "<script type='text/javascript'>window.open('index.php','_self');</script>";*/
   }
  }
?>

 
 

<?php
  
  function totle()
    {
      $ipadd=$_SESSION['ip_add'];
      $totle=0;
      if(isset($_SESSION['user_id']))
      {
        $user_id=$_SESSION['user_id'];
        $cartitem=mysql_query("select *from cart where ip_add='$ipadd' AND userid='$user_id' AND checkout_date='0000-00-00'");
        while($row=mysql_fetch_array($cartitem))
         {       
           $rows=$row['p_id'];
           $cartitemtitle=mysql_query("select *from product where product_id='$rows'");
           $price=mysql_fetch_array($cartitemtitle);
           $myprice=$price['product_price'];
           $totle=$totle+$myprice;
         }
         echo "Rs. ".$totle;
      }
     else
      {
        $user_id='guest';
        $cartitem=mysql_query("select *from cart where ip_add='$ipadd' AND userid='$user_id' AND checkout_date='0000-00-00'");
        while($row=mysql_fetch_array($cartitem))
         {       
           $rows=$row['p_id'];
           $cartitemtitle=mysql_query("select *from product where product_id='$rows'");
           $price=mysql_fetch_array($cartitemtitle);
           $myprice=$price['product_price'];
           $totle=$totle+$myprice;
         }
         echo "Rs. ".$totle;
      }
    }
?>


 <table>
   <tr><th>Ttem</th><th>Qty</th><th>Price</th><th>Delivery Detail </th><th>SUBTOTLE</th></tr>
 
<?php
function first()   
  {
    $ipadd=$_SESSION['ip_add'];
    $br=0;
    if(isset($_SESSION['user_id']))
    {
      $user_id=$_SESSION['user_id'];
      $cartitem=mysql_query("select *from cart where ip_add='$ipadd' AND userid='$user_id' AND checkout_date='0000-00-00'");
      while($row=mysql_fetch_array($cartitem))
      {       
        $rows=$row['p_id'];
        $cartitemtitle=mysql_query("select *from product where product_id='$rows'");
        $title=mysql_fetch_array($cartitemtitle);
        $itemqty=mysql_query("select *from cart where p_id='$rows' AND userid='$user_id' AND checkout_date='0000-00-00'");
        $count=mysql_num_rows($itemqty);
        $pro_id=$title['product_id'];
        $pro_price=$title['product_price'];
        $pro_title=$title['product_title'];
        $break=mysql_query("select *from cart where p_id='$rows' AND userid='$user_id' AND checkout_date='0000-00-00'");
        $item_num=mysql_num_rows($break);
        $myprice=$pro_price*$item_num;
        $product_image=$title['product_image'];
        $imagepath='admin_area/product_image/'.$product_image;
        if($item_num>0)
         {
           if($br>1)
             {
                $br--;
                continue;
             }
            ?>    
              <tr><td><span id="title"><?php echo $pro_title; ?></span><img src="<?php echo $imagepath; ?>"/></td>
              <td><?php echo $item_num ; ?></td>
              <td><?php echo "Rs. "."$pro_price";?></td>
              <td>Free <br/>Product will deliverd at least in 7days </td>
              <td><?php echo "Rs. "."$myprice";?></td></tr>
            
            <?php
             $br=$item_num;   
          } 
        }
      }
    else
    {
      $payable_price=0;
      while (list ($key, $val) = each ($_SESSION['cart'])) 
      { 
        $pro_key="$key";
        $cartitemtitle=mysql_query("select *from product where product_id='$pro_key'");
        $title=mysql_fetch_array($cartitemtitle);
        $pro_id=$title['product_id'];
        $pro_price=$title['product_price'];
        $pro_title=$title['product_title'];
        $item_num=1;
        //$item_num=sizeof($_SESSION['cart']);
        $myprice=$pro_price*$item_num;
        $product_image=$title['product_image'];
        $imagepath='admin_area/product_image/'.$product_image;
        if ($_SESSION['cart'][$pro_key]<1) 
        {
          $_SESSION['cart'][$pro_key]=1;
        }
            
       $payable_price=$payable_price+$myprice*$_SESSION['cart'][$pro_key];
       $_SESSION['payable_price']=$payable_price;
            ?>    
              <tr><td><span id="title"><?php echo $pro_title; ?></span><img src="<?php echo $imagepath; ?>"/>
             
              </td>
              <td>
              <?php echo $_SESSION['cart'][$pro_key] ; ?>
              
              </td><td><?php echo "Rs. ".$pro_price;?></td><td>Free <br/>Product will deliverd at least in 7days </td>
              <td><?php echo "Rs. ".$myprice*$_SESSION['cart'][$pro_key] ?></td></tr>
            <?php  
            
          } 
        }
      }
 
 
first(); 
?>
<tr> <td style="border:1px solid white;"></td><td style="border:1px solid white;"></td><td style="border:1px solid white;"></td><td style="font:25px bolder tahoma;color:green;opacity:0.6">Amount Payable: </td>  <td style="font:25px bolder tahoma;color:green;"> <?php if(isset($_SESSION['user_id']))totle(); else echo $_SESSION['payable_price']; ?></td></tr>
</table>
<table><tr><td><a href="index.php"><button>CONTINUE SHOPPING </button></a></td>
<td><a href="mycart_item.php?cancel=1"><button> CANCEL </button></a></td> </tr></table>
    
    
  

</body>
</html>