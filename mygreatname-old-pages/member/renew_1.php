<?php

$username = $_REQUEST["username"];
$email    = $_REQUEST["email"];

	if (!$username) {
		header("Location:index.php");
		exit;
	}
?>

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

$real_name = $_REQUEST["real_name"];

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
			<h1>Service Renewal</h1>

			<form action=\"renew_2.php\" method=\"post\">
				<input type=\"hidden\" name=\"username\" size=\"15\" value=\"$username\">
				<input type =\"hidden\" name=\"real_name\" value=\"$real_name\">
				<input type =\"hidden\" name=\"email\" value=\"$email\">
				<input type =\"hidden\" name=\"reseller\" value=\"$reseller\">
				
				<h3>Select Payment Method:</h3>
				<input type=\"radio\" name=\"payment\" value=\"Credit_Card\" checked> Credit Card / PayPal<br />
				<input type=\"radio\" name=\"payment\" value=\"FPS\"> Faster Payment System (FPS) <br />
				
				<input type=\"submit\" value=\"Press Here to Continue\" />
				<br />

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

			</form>
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

?>	

</body>
</html>
