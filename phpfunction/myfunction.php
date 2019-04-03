<?php 
  include("include/connect.php");
  //session_start();
  error_reporting(1);
 ?>
 <?php
    
function getIp() 
    {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
     return $ip;
    }
 
  $_SESSION['ip_add']=getIp();
 ?>
<?php
function get_product()
{
  if(isset($_GET['brand_id']))
    {
      $brand_id=$_GET['brand_id'];
      $query="Select *from product where product_brand=$brand_id order by RAND() Limit 0,12";
      $result=mysql_query($query);
      while($row=mysql_fetch_array($result))
        {
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_price=$row['product_price'];
          $product_iamge=$row['product_image'];
          $imagepath='admin_area/product_image/'.$product_iamge;
          echo "
           <div class='item'>
              <p>$product_title</p>    
              <img src='$imagepath' width=145 height=140/>
              <p>Rs. $product_price</p>
              <a href='product_detail.php?p_id=$product_id' style='float:left'>Details</a>
              <button style='float:right'>AddToCart</button>
            </div>";
            }
        }

else if(isset($_GET['cat_id']))
  {
     $cat_id=$_GET['cat_id'];
     $query="Select *from product where product_category=$cat_id order by RAND() Limit 0,12";
     $result=mysql_query($query);
     while($row=mysql_fetch_array($result))
       {
         $product_id=$row['product_id'];
         $product_title=$row['product_title'];
         $product_price=$row['product_price'];
         $product_iamge=$row['product_image'];
         $imagepath='admin_area/product_image/'.$product_iamge;
          echo "
                <div class='item'>
                <p>$product_title</p>    
                <img src='$imagepath' width=145 height=140/>
                <p>Rs. $product_price</p>
                <a href='product_detail.php?p_id=$product_id' style='float:left'>Details</a>
                <button style='float:right'>AddToCart</button>
                </div>
                 ";
        }
  }
else if(isset($_GET['search_id']))
  {
    $search_id=$_GET['search_id'];
    $query="Select *from product where product_keyword like '%$search_id%' order by RAND() Limit 0,12";
    $result=mysql_query($query);
    while($row=mysql_fetch_array($result))
      {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_price=$row['product_price'];
        $product_iamge=$row['product_image'];
        $imagepath='admin_area/product_image/'.$product_iamge;
        echo "
        <div class='item'>
        <p>$product_title</p>    
        <img src='$imagepath' width=145 height=140/>
        <p>Rs. $product_price</p>
        <a href='product_detail.php?p_id=$product_id' style='float:left'>Details</a>
        <button style='float:right'>AddToCart</button>
        </div>
        ";
      }
  }
elseif(isset($_GET['all_product']))
{
  $query="Select *from product order by RAND()";
  $result=mysql_query($query);
  while($row=mysql_fetch_array($result))
    {
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_price=$row['product_price'];
      $product_iamge=$row['product_image'];
      $imagepath='admin_area/product_image/'.$product_iamge;
      echo "
        <div class='item'>
        <p>$product_title</p>    
        <img src='$imagepath' width=145 height=140/>
        <p>Rs. $product_price</p>
        <a href='product_detail.php?p_id=$product_id' style='float:left'>Details</a>
        <a href='index.php?add_cart=$product_id'><button style='float:right'>AddToCart</button></a>
        </div>";
    }
  }

else
{
  $query="Select *from product order by RAND() Limit 0,12";
  $result=mysql_query($query);
  while($row=mysql_fetch_array($result))
    {
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_price=$row['product_price'];
      $product_iamge=$row['product_image'];
      $imagepath='admin_area/product_image/'.$product_iamge;
      echo "
        <div class='item'>
        <p>$product_title</p>    
        <img src='$imagepath' width=145 height=140/>
        <p>Rs. $product_price</p>
        <a href='product_detail.php?p_id=$product_id' style='float:left;'>Details</a>
        <a href='index.php?add_cart=$product_id'><button style='float:right;'>AddToCart</button></a>
        </div>";
    }
  }
}

function get_cat_li()
   {
     $result=mysql_query("select * from category");
     while($row=mysql_fetch_array($result))
       {
         $cat_id=$row['cat_id'];
         $path="index.php?cat_id=$cat_id";
         echo'<li><a href='.$path.'>'.$row['cat_title']."</a></li>";
       }
    }

function get_brand_li()
   {
     $result=mysql_query("select * from brand");
     while($row=mysql_fetch_array($result))
       {
         $brand_id=$row['brand_id'];
         $path="index.php?brand_id=$brand_id";
         echo'<li><a href='.$path.'>'.$row['brand_title']."</a></li>";
        }
   }



//unset($_SESSION["cart"]);
function addItem() 
 {
  global $products;
  if(!isset($_SESSION['user_id']))
   {
    if(isset($_GET["add_cart"])) 
     {
      $productId=(int)$_GET["add_cart"];
      if(!isset($_SESSION["cart"][$productId])) 
       {
        $_SESSION["cart"][$productId]=$products[$productId];
       }
     echo sizeof($_SESSION['cart']);
     } 
    elseif(isset($_SESSION['cart']))
      {
       echo sizeof($_SESSION['cart']);
      }    
   } 
  }


  //$_SESSION['cart'][$pro_key]
function guestamount()
 {
  $totle=0;
  global $products;
  if(!isset($_SESSION['user_id']))
   {
    if(isset($_GET["add_cart"])) 
     {
      $productId=(int)$_GET["add_cart"];
      if(!isset($_SESSION["cart"][$productId])) 
       {
        $_SESSION["cart"][$productId]=$products[$productId];
       }
      while (list ($key, $val) = each ($_SESSION['cart'])) 
      { 
       $key="$key";
       $price=mysql_query("select *from product where product_id='$key'");
       $pricerow=mysql_fetch_array($price);
       $price=$pricerow['product_price'];
       $totle=$totle+$price;
     } 
    }
    elseif(isset($totle))
    {
      while (list ($key, $val) = each ($_SESSION['cart'])) 
      { 
       $key="$key";
       $price=mysql_query("select *from product where product_id='$key'");
       $pricerow=mysql_fetch_array($price);
       $price=$pricerow['product_price'];
       $totle=$totle+$price;
     } 
    }
   }
   echo "Rs. ".$totle;  
  }
 







function cart()
   {
     if(isset($_GET['add_cart']))
      {
        if(isset($_SESSION['user_id']))
        {
          $ip=$_SESSION['ip_add'];
          $user_id=$_SESSION['user_id'];
          $add_cart=$_GET['add_cart'];
          $pro_check="Select *from cart where ip_add='$ip' AND p_id='$add_cart' AND userid='$user_id' ";
          $result_pro_check=mysql_query($pro_check);
          $pro_check_count=mysql_num_rows($result_pro_check);
          if($pro_check_count>0)
           {
            echo "";
           }
          else
          {
            $insert_cart_pro="Insert into cart(ip_add,p_id,userid) values ('$ip','$add_cart','$user_id')";
            mysql_query($insert_cart_pro) or die(mysql_error());
          }
        }
       else
        {
          $ip=$_SESSION['ip_add'];
          $add_cart=$_GET['add_cart'];
          $user_id='guest';
          $pro_check="Select *from cart where ip_add='$ip' AND p_id='$add_cart' AND userid='$user_id' ";
          $result_pro_check=mysql_query($pro_check);
          $pro_check_count=mysql_num_rows($result_pro_check);
          if($pro_check_count>0)
           {
            echo "";
           } 
          else
           {
              $insert_cart_pro="Insert into cart(ip_add,p_id,userid) values ('$ip','$add_cart','guest')";
              mysql_query($insert_cart_pro) or die(mysql_error());
           }
        }
      }
    }

 function updateItems()
   {
    if(isset($_GET['add_cart']))
     {
       if(isset($_SESSION['user_id']))
        {
          $ip=$_SESSION['ip_add'];
          $user_id=$_SESSION['user_id'];
          $upadte_item_query="Select *from cart where ip_add='$ip' AND userid='$user_id'";
          $result_item_query=mysql_query($upadte_item_query);
          $count_item=mysql_num_rows($result_item_query);
        }
     }
    else
     {
      if(isset($_SESSION['user_id']))
        {
          $ip=$_SESSION['ip_add'];
          $user_id=$_SESSION['user_id'];
          $upadte_item_query="Select *from cart where ip_add='$ip' AND userid='$user_id'";
          $result_item_query=mysql_query($upadte_item_query);
          $count_item=mysql_num_rows($result_item_query);
        }       
      }   
    echo $count_item;
  }

function amount()
   {
      $totle=0;
      $ip=$_SESSION['ip_add'];
      if(isset($_GET['add_cart']))
        {
          if(isset($_SESSION['user_id']))
           {
             $user_id=$_SESSION['user_id'];
             $get_pro_id="Select *from cart where ip_add='$ip' AND userid='$user_id'";
             $result_pro_id=mysql_query($get_pro_id);
             while($rows=mysql_fetch_array($result_pro_id))
              {
                $proId=$rows['p_id'];
                $price=mysql_query("select *from product where product_id='$proId'");
                $pricerow=mysql_fetch_array($price);
                $price=$pricerow['product_price'];
                $totle=$totle+$price;
              }

             }

            else
             {
               $user_id='guest';
               $get_pro_id="Select *from cart where ip_add='$ip' AND userid='$user_id'";
               $result_pro_id=mysql_query($get_pro_id);
               while($rows=mysql_fetch_array($result_pro_id))
                {
                  $proId=$rows['p_id'];
                  $price=mysql_query("select *from product where product_id='$proId'");
                  $pricerow=mysql_fetch_array($price);
                  $price=$pricerow['product_price'];
                  $totle=$totle+$price;
                 }
              }
          }
      else
       {
         if(isset($_SESSION['user_id']))
           {
             $user_id=$_SESSION['user_id'];
             $get_pro_id="Select *from cart where ip_add='$ip' AND userid='$user_id'";
             $result_pro_id=mysql_query($get_pro_id);
             while($rows=mysql_fetch_array($result_pro_id))
              {
                $proId=$rows['p_id'];
                $price=mysql_query("select *from product where product_id='$proId'");
                $pricerow=mysql_fetch_array($price);
                $price=$pricerow['product_price'];
                $totle=$totle+$price;
              }

             }
            else
             {
               $user_id='guest';
               $get_pro_id="Select *from cart where ip_add='$ip' AND userid='$user_id'";
               $result_pro_id=mysql_query($get_pro_id);
               while($rows=mysql_fetch_array($result_pro_id))
                {
                  $proId=$rows['p_id'];
                  $price=mysql_query("select *from product where product_id='$proId'");
                  $pricerow=mysql_fetch_array($price);
                  $price=$pricerow['product_price'];
                  $totle=$totle+$price;
                 }
              }
        
        }
         echo "Rs. ".$totle;
      }
            



            