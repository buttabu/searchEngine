<!DOCTYPE html> 
<html> 
	<head>
		<title>Search Engine in PHP by Abu Butt</title> 
		<style type="text/css">
			td, input{
				text-align: center;
			}
			
		</style>
	</head>
	
<body bgcolor="lightgray">
<!-- 
The enctype attribute specifies how the form-data should be encoded when submitting it to the server.

Note: The enctype attribute can be used only if method="post".


application/x-www-form-urlencoded		Default. All characters are encoded before sent (spaces are converted to "+" symbols, and special characters are converted to ASCII HEX values)
multipart/form-data			No characters are encoded. This value is required when you are using forms that have a file upload control
text/plain			Spaces are converted to "+" symbols, but no special characters are encoded -->


	<form action="insert_site.php" method="post" enctype="multipart/form-data"> 
		
		<table bgcolor="orange" width="500" border="2" cellspacing="2" align="center">
			
			<tr>
				<td colspan="5" align="center"><h2>Inserting New Website Into the Database:</h2></td>
			</tr>
			<tr>
				<td ><b>Site Title:</b></td>
				<td><input type="text" name="site_title" /></td>
			</tr>
			
			<tr>
				<td ><b>Site Link:</b></td>
				<td><input type="text" name="site_link" /></td>
			</tr>
			
			<tr>
				<td ><b>Site Keywords:</b></td>
				<td><input type="text" name="site_keywords" /></td>
			</tr>
			
			<tr>
				<td ><b>Site Description:</b></td>
				<td><textarea cols="18" rows="8" name="site_desc"></textarea></td>
			</tr>
			
			<tr>
				<td align="center" colspan="5"><input type="submit" name="submit" value="Add Site Now"/></td>
			</tr>

		</table>
		
	</form>

</body>
</html>
<?php 

	//to connect with mysql, need mysql_connect and mysql_select_db statements...
	mysql_connect("localhost","root","");
	mysql_select_db("search");
	
	// The isset () function is used to check whether a variable is set or not,,,,, means if the user has press the submit button...

	if(isset($_POST['submit'])){
	
		 $site_title = $_POST['site_title'];
		 $site_link = $_POST['site_link'];
		 $site_keywords = $_POST['site_keywords'];
		 $site_desc = $_POST['site_desc'];
		
	
		
		if($site_title=='' OR $site_link=='' OR $site_keywords=='' OR $site_desc==''){
		
		echo "<script>alert('please fill all the fields!')</script>";
		
		exit();
		}
		else {

		//insert_query=> built in mysql query which insert data into the table..needs to be in the quotations

		$insert_query = "insert into sites (site_title,site_link,site_keywords,site_desc) values ('$site_title','$site_link','$site_keywords','$site_desc')";
		

		//mysql_query is used if the data has been inserted into the tables or not
		if(mysql_query($insert_query)){
		
		echo "<script>alert('Data inserted into table')</script>";
		
		}
		
		}
	
	}


?>




