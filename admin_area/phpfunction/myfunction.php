<?php 
  include("include/connect.php");
 ?>
<?php
function get_product()
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
        <img src='$imagepath' width=200 height=200/>
        <p>Rs. $product_price</p>
        <a href='product_detail.php?p_id=$product_id' style='float:left'>Details</a>
        <a href='index.php?add_cart=$product_id'><button style='float:right'>AddToCart</button></a>
        </div>";
    }
}