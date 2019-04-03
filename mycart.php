
<?php 
 include("include/connect.php"); 
 session_start();   
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Shopping Cart </title>
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
  <div id="main_wrapper">
    
    <div id="header"></div>
    <div id="main_con">


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
   if(isset($_GET['del_id']))
   {
    if(isset($_SESSION['user_id']))
    {
      $user_id=$_SESSION['user_id'];
      $pro_id=$_GET['del_id'];
      mysql_query("delete from cart where p_id='$pro_id' AND userid='$user_id' AND checkout_date=0000-00-00");
      echo "<script type='text/javascript'>window.open('mycart.php','_self');</script>";
    }
    else
    {
      $pro_id=$_GET['del_id'];
      //mysql_query("delete from cart where p_id='$pro_id' AND userid='guest' AND checkout_date='0000-00-00' ");
      $del_key=$_GET['del_id'];
      unset($_SESSION['cart'][$del_key]);
      echo "<script type='text/javascript'>window.open('mycart.php','_self');</script>";
    }
   }


if(isset($_POST['num']))
   {
    $ipadd=$_SESSION['ip_add'];
    if(isset($_SESSION['user_id']))
    {
      $user_id=$_SESSION['user_id'];
      $user_id=$_SESSION['user_id'];
      $pro_id=$_GET['save'];
      mysql_query("delete from cart where p_id='$pro_id' AND userid='$user_id' AND checkout_date=0000-00-00");
      for($num=$_POST['num'];$num>=1;$num--)
      mysql_query("Insert into cart(p_id,ip_add,userid) values('$pro_id','$ipadd','$user_id')"); 
      echo "<script type='text/javascript'>window.open('mycart.php','_self');</script>";
    }
    else
    {
      $pro_id=$_GET['save'];
      /*$user_id='guest';
      mysql_query("delete from cart where p_id='$pro_id' AND userid='$user_id' AND checkout_date=0000-00-00");
      for($num=$_POST['num'];$num>=1;$num--)
      mysql_query("Insert into cart(p_id,ip_add,userid) values('$pro_id','$ipadd','$user_id')"); */
      $pro_qty=$_POST['num'];
      $_SESSION['cart'][$pro_id]=$pro_qty;
      echo "<script type='text/javascript'>window.open('mycart.php','_self');</script>";
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
              <tr><td><span id="title"><?php echo $pro_title; ?></span><img src="<?php echo $imagepath; ?>"/>
              <span><a href='mycart.php?del_id=<?php echo $pro_id;?>'><button id='savebtn'
              style='float:right;font-size:10px;margin-top:80px;margin-right:10px;'>DELETE</button></a>
               </span>
              </td>

              <td>
              <form action='mycart.php?save=<?php echo $pro_id;?>' method="post">
                 <input type="text" size="1"value="<?php echo $item_num ; ?>" name="num"/><br/>
                 <input type="submit" value="save" id="savebtn"/> 
              </form>
              </td>
              <td><?php echo "Rs. "."$pro_price";?></td><td>Free <br/>Product will deliverd at least in 7days </td>
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
              <span><a href='mycart.php?del_id=<?php echo $pro_id;?>'><button id='savebtn'style='
               float:right;font-size:10px;margin-top:80px;margin-right:10px;'>DELETE</button></a>
               </span>
              </td>
              <td>
              <form action='mycart.php?save=<?php echo $pro_id;?>' method="post">
                 <input type="text" size="1"value="<?php echo $_SESSION['cart'][$pro_key] ; ?>" name="num"/><br/>
                 <input type="submit" value="save" id="savebtn"/> 
              </form>
              </td><td><?php echo "Rs. ".$pro_price;?></td><td>Free <br/>Product will deliverd at least in 7days </td>
              <td><?php echo "Rs. ".$myprice*$_SESSION['cart'][$pro_key] ?></td></tr>
            <?php  
            
          } 
        }
      }
//$_SESSION['cart'][$pro_id]=$pro_qty;

 





first(); 
?>
<tr> <td style="border:1px solid white"></td><td style="border:1px solid white"></td><td style="border:1px solid white"></td><td style="font:25px bolder tahoma;color:green;opacity:0.6">Amount Payable: </td>  <td style="font:25px bolder tahoma;color:green"> <?php if(isset($_SESSION['user_id']))totle(); else echo "Rs. ".$_SESSION['payable_price'];?></td></tr>
</table>
<table><tr><td><a href="index.php"><button>CONTINUE SHOPPING </button></a></td>  
<td> <a href="checkout.php"><button>CHECKOUT</button></a></td></tr></table>
    
    
  
</div>
    <div id="footer">
      <p>©2015 www.hamdarditcenter.com </p>
    </div>
  
  </div>
</body>
</html>