<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
   <link rel="stylesheet" type="text/css" href="style/admin_login.css">
   
</head>
<body>
  <div id="main_div">
  	<div id="head_div">
  		<h1>Hamdard Admin</h1>
  		<p>makes it easy for you</p>
  	</div>
  	<div id="form_div">
  		<center>
  		<form action="admin_login_menu.php" method="post">
  			<table>
  				<tr id="ftr">
  					<td>LOGIN</td><td></td>
  				</tr>
  				<tr>
  					<td>User Id</td><td><input type="text" name="userid" id="userid"></td>
  				</tr>
  				<tr>
  					<td>Password</td><td><input type="password" name="password" id="password"></td>
  				</tr>
  				<tr>
  					<td></td><td><input id="sub"type="submit"value="LOGIN"></td>
  				</tr>
  			</table>
  		</form>
  		</center>
  	</div>
  	<div id="footer">copyright&copy; all right reseved</div>

  </div>
</body>
</html>