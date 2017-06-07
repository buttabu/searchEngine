<!DOCTYPE html> 
<html> 
	<head> 
		<title>Result page</title> 
		
<style type="text/css">
.results {
	margin-left:12%; 
	margin-right:12%; 
	margin-top:10px;
}
.wrapper {
    text-align: center;
}

.button {
    position: relative;
    top: 50%;
}
</style>
	</head> 
	
	
<body bgcolor="#F5DEB3"> 

	<h1 style="text-align: center;">The Result/s Are/Is </h1>
	
	
<?php 
	mysql_connect("localhost","root","");
	mysql_select_db("search");
	

	//getting the values from the search database
	if(isset($_GET['search'])){
	
	$get_value = $_GET['user_query'];
	
	if($get_value==''){
	
	echo "<center><b>Please go back, and write something in the search box!</b></center>";
	exit();

	}
	//result_query is used to search the sql statement in the mysql
	$result_query = "select * from sites where site_keywords like '%$get_value%'";
	
	// mysql_query() returns TRUE on success or FALSE on error. The returned result resource should be passed to mysql_fetch_array(), and other functions for dealing with result tables, to access the returned data.
	$run_result = mysql_query($result_query);
	
	if(mysql_num_rows($run_result)<1){  // this is true if the number of rows are less than 0
	
	echo "<center><b>Oops! sorry, nothing was found in the database!</b></center>";
	exit();
	
	}
	// putting the corresponding results from the database into an array...
	while($row_result=mysql_fetch_array($run_result)){
		
		$site_title=$row_result['site_title'];
		$site_link=$row_result['site_link'];
		$site_desc=$row_result['site_desc'];
		// $site_image=$row_result['site_image'];
	
	echo "<div class='results'>
		
		<h2>$site_title</h2>
		<a href='$site_link' target='_blank'>$site_link</a>
		<p align='justify'>$site_desc</p> 
		
		</div>";

		}
}


?>


<div class="wrapper">
    <a href="search.html" ><button class="button">Go Back To Search Page</button></a>
</div>
</body> 
</html>