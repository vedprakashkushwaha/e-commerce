<?php
 include("../include/connect.php");
 $product_title=$_POST['product_title'];
 $product_category=$_POST['product_category'];
 $product_brand=$_POST['product_brand'];
 $product_price=$_POST['product_price'];
 $product_description=$_POST['product_description'];
 $product_keywords=$_POST['product_keyword'];
 $product_image_name=$_FILES["product_image"]["name"];
 echo $product_category."<br/>";
  echo $product_brand;
 $ImageSourceLoc= $_FILES["product_image"]["tmp_name"];
 $ImageTargetLoc = "product_image/".$product_image_name;
 move_uploaded_file($ImageSourceLoc, $ImageTargetLoc);
 $query="Insert into product(product_title,product_category,product_Brand,product_price,product_description,product_keyword,product_image) values('$product_title','$product_category','$product_brand','$product_price','$product_description','$product_keywords','$product_image_name')";
 mysql_query($query) or die(mysql_error());
 header("Location:insert_product.php? status=1");
?>