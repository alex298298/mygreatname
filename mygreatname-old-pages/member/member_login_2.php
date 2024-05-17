<!DOCTYPE html>
<html lang="zh-Hant">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Affordable web hosting and Cheap web hosting</title>
  <Meta name="keywords" content="affordable web hosting, cheap web hosting, cheap domain name registration, web host" />
  <meta name="description" content="Affordable web hosting and cheap web host. Reliable cPanel linux web hosting plans you can afford. Reseller web hosting and cheap domain name registration. " />
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!-- <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css"> -->

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css-skeleton/normalize.css">
  <link rel="stylesheet" href="css-skeleton/skeleton.css">
  <link rel="stylesheet" href="css-skeleton/style.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">
	
  
</head>

<body>

<?php
$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

if ((!$username) || (!$password)) {
	$login_error = "wrong_login_info";
	include("index.php");
	exit;
	}	

include_once "member_config.php";


// formulate the query
$sql = "SELECT username, real_name, password, email, reseller from member where username='$username' and password='$password'";

// execute the query and put results in $result
$result = mysqli_query($connection, $sql) or die ("Couldn't execute query.");


while ($row = mysqli_fetch_array($result)) {
		$username   = $row["username"];
		$real_name  = $row["real_name"];
		$password   = $row["password"];
		$email 		= $row["email"];
		$reseller 	= $row["reseller"];
	}

// get number of rows in $result.
$num = mysqli_num_rows($result);

if ($num > 0) {

echo "

<!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class=\"container\">
	<!-- Header Banner -->
	<div class=\"row headerImage\">
		<h2 style=\"padding: 15px 0px 0px 15px;\">MyGreatName</h2>
		<p class=\"headerDescription\">Reliable hosting and domain service since 2000</p>
		<!-- <p style=\"padding: 0px 0px 0px 15px; font-size:1.2em;\">Nothing to say</p> -->
	</div>
	
	<!-- Header Menu -->
	<div class=\"row\">
		<div class=\"twelve columns\">
        		<nav>
		          <ul>
				<li>
				<form action=\"http://www.mygreatname.com\" method=\"post\">
					<input type=\"submit\" value=\"Home\" >
				</form>
				</li>
				<li>
				<form action=\"update_member_info_1.php\" method=\"post\">
					<input type =\"hidden\" name=\"username\" value=\"$username\">
					<input type =\"hidden\" name=\"real_name\" value=\"$real_name\">
					<input type =\"hidden\" name=\"email\" value=\"$email\">
					<input type =\"hidden\" name=\"reseller\" value=\"$reseller\">
					<input type=\"submit\" value=\"Profile\" >
				</form>
				</li>
				
				<li>
				<form action=\"renew_1.php\" method=\"post\">
					<input type =\"hidden\" name=\"username\" value=\"$username\">
					<input type =\"hidden\" name=\"real_name\" value=\"$real_name\">
					<input type =\"hidden\" name=\"email\" value=\"$email\">
					<input type =\"hidden\" name=\"reseller\" value=\"$reseller\">
					<input type=\"submit\" value=\"Renew\" >
				</form>
				</li>
		          </ul>
		        </nav>  
  
      		</div> 
	</div>
	
	
	<article style=\"padding-top:10px;\">
        	<!-- Spacing -->
    	</article>
	
	 
	 <!-- Main Content -->
	 <div class=\"row\">
		<div class=\"twelve columns\">
			<h2>Member Area</h2>
			<p>The member area allows you to manage your personal contact and signed up services.</p>
			<h3>Member Information</h3>
			<p>Please keep your email address updated, otherwise you cannot receive our notice and news.</p>
			<h3>Service Renewal</h3>
			<p>Renewal notifications will be sent to your member email address before expiry date. Please renew your service earlier to avoid suspension of service.</p>

			<div style=\"color: red;\">

				<p style=\"font-size: 1.8em; font-weight: bold;\" >Notice - March 8, 2024</p>

				<p style=\"font-size: 1.3em; font-weight: bold;\">IMPORTANT: MyGreaName.com Cease to Provide Domain Registration Service. DO NOT renew domains here!!!</p>

				<p>Dear Customers,</p>

				<p>It is with regret to inform you that MyGreatName.com will no longer provide domain registration from March 20, 2024. This decision has been taken predominantly due to the changing business environment. </p>

				<p>We will work hard to maintain your domains registered through MyGreatName.com working normally. </p>

				<p>Emails have been sent to all domain customers. Please check your emails for details.</p>



				<p style=\"font-size: 1.8em; font-weight: bold;\" >Notice - March 20, 2024</p>

				<p style=\"font-size: 1.3em; font-weight: bold;\">IMPORTANT:MyGreaName.com Cease to Provide Web Hosting Service. DO NOT renew hosting!!!</p>

				<p>It is with regret to inform you that MyGreatName.com will no longer provide web hosting service from May 15, 2024. This decision has been taken predominantly due to the changing business environment.</p>

				<p>Emails have been sent to all hosting customers. Please check your emails for details.</p>

				
			</div>

		</div>

	

	 </div>

	 <article style=\"padding-top:10px;\">
        	<!-- Spacing -->
    	</article>
	
	
	
	<div class=\"u-cf\"></div>
	
  </div><!-- End container -->
  
   <div class=\"footerContent\"> <!-- don't know why still inside container -->
	<p>&copy; MyGreatName.com All Rights Reserved.</p>
   </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

";


} else if ($num == 0) {
	$login_error = "wrong_login_info";		
	include("index.php");
			
	}

// free resources and close connection
mysqli_free_result($result);
mysqli_close($connection);	

?>

</body>
</html>
