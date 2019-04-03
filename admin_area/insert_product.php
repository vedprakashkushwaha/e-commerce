<?php
  include("include/connect.php");
?>
<html>
  <head>
    <title>
     Admin panel
	</title>
	<script src="jquery-1.11.3.min.js"></script>
    <link href="style.css"rel="stylesheet"type="text/css"/>
    <link rel="stylesheet" type="text/css" href="style/admin_login.css">
	<script>
     $(document).ready(function(){
    	$(":submit").click(function(){
    	if($('#pro_title').val()=="")
    	 {
    	 	alert("please enter product title");
    	 	$('#pro_title').focus();
    	 	return false;
    	 }
    	if($('#pro_category').val()=="")
    	 {
    	 	alert("please enter product Category");
    	 	$('#pro_category').focus();
    	 	return false;
    	 }	
    	if($('#pro_brand').val()=="")
    	 {
    	 	alert("please enter product Brand");
    	 	$('#pro_brand').focus();
    	 	return false;
    	 }	
    	if($('#pro_price').val()=="")
    	 {
    	 	alert("please enter product Price");
    	 	$('#pro_price').focus();
    	 	return false;
    	 }	
    	if($('#pro_description').val()=="")
    	 {
    	 	alert("please enter product Description");
    	 	$('#pro_description').focus();
    	 	return false;
    	 }	
    	if($('#pro_keyword').val()=="")
    	 {
    	 	alert("please enter product Keyword");
    	 	$('#pro_keyword').focus();
    	 	return false;
    	 }	
    	if($('#product_image').val()=="")
    	 {
    	 	alert("please upload product Image");
    	 	$('#product_image').focus();
    	 	return false;
    	 }		
        else
        {
        	alert("now form will submit");
        }
    	});
    });

   
	</script>
  </head>
  <body>
    <div id="head_div">
        <h1>Hamdard Admin</h1>
        <p>makes it easy for you</p>
    </div>
    <div id="form_div">
    <form action="process_insert_product.php" method="post" enctype="multipart/form-data">
      <center><table>
        <tr bgcolor="gray">
		  <td>
		  <h2>Insert Products</h2>
		  </td>
		 </tr>
		 <tr>
		  <td>
		    <span>Product Title</span> <input type="text"name="product_title"id="pro_title"autofocus/>
		  </td>
        </tr>
		<tr>
		  <td>
		    <span>Product Category</span>
          <select id="pro_category"name="product_category">
          <option></option>
          <?php
            $result=mysql_query("select * from category");
            while($row=mysql_fetch_array($result))
            {
               $category=$row["cat_id"];
               echo'<option value='.$category.'>'.$row['cat_title'].'</option>';
            }
           
            ?>
            </select>
		  </td>
        </tr>
		<tr>
		  <td>
		    <span>product Brand</span> 
             <select id="pro_brand"name="product_brand">
            <option></option>
             <?php
            $result=mysql_query("select * from brand");
            
            while($row=mysql_fetch_array($result))
            {
               $brand_id=$row["brand_id"];
               echo'<option value='.$brand_id.'>'.$row['brand_title'].'</option>';
            }
            ?>
            </select>
		  </td>
        </tr>
		<tr>
		  <td>
		    <span>Product Price</span> <input type="text"name="product_price"id="pro_price"/>
		  </td>
        </tr>
		<tr>
		  <td>
		    <span>Product Description</span> <input type="text"name="product_description"id="pro_description"/>
		  </td>
        </tr>
		<tr>
		  <td>
		    <span>Product Keyword</span> <input type="text"name="product_keyword"id="pro_keyword"/>
		  </td>
        </tr><tr>
		  <td>
		    <span>Product Image</span> <input type="file" name="product_image"id="product_image"/>
		  </td>
        </tr>
        <tr>	 
        <td></td>
        </tr>
        <tr>
        <td></td>	 
        </tr>
        <tr>
		  <td>
		     <input type="submit"id="btn" value="Submit"/>
		  </td>
        </tr>
        <tr>	 
        <td></td>
        </tr>
        
	  </table>
	  </center>
	</form>
    </div>
    
 <div id="footer3">copyright&copy; all right reseved</div>
  </body>
  
</html>