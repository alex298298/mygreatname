<?php

$username = $_REQUEST["username"];
$payment  = $_REQUEST["payment"];
$email	  = $_REQUEST["email"];

	if (!$username) {
		header("Location:index.php");
		exit;
	}

	if ($payment == "Credit_Card") {
		$payment_method = "Credit Card or PayPal";
	} elseif ($payment == "FPS") {
		$payment_method = "Faster Payment System (FPS)";
	} elseif ($payment == "Bank_Transfer") {
		$payment_method = "Bank Transfer";
	} elseif ($payment == "Bank_Cheque") {
		$payment_method = "Bank Cheque";
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

include_once "member_config.php";

// formulate the query
$sql = "SELECT domain_name, domain_price, expire_date, hosting, hosting_renewal_cycle, hosting_price, hosting_expire_date from domain where username ='$username'";

// execute the query and put results in $result
$result = mysqli_query($connection, $sql) or die ("Couldn't execute query.");

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

			<form action=\"renew_3.php\" method=\"post\">
				<input type=\"hidden\" name=\"username\" size=\"15\" value=\"$username\">
				<input type =\"hidden\" name=\"real_name\" value=\"$real_name\">
				<input type =\"hidden\" name=\"email\" value=\"$email\">
				<input type=\"hidden\" name=\"payment\" size=\"15\" value=\"$payment\">
				
				<input type=\"hidden\" name=\"payment_method\" size=\"15\" value=\"$payment_method\">
	
				<input type=\"hidden\" name=\"reseller\" value=\"$reseller\">

				<table id=\"customers\">
					<tr><th>Domain</th><th>Service</th> <th>Renewal<br>Cycle</th> <th>Expire Date<br />(YY-MM-DD)</th> <th>Price</th> <th>Renew</th></tr>
		
";

					while ($row = mysqli_fetch_array($result)) {
			
						$domain = $row["domain_name"];
						$domain_price = $row["domain_price"];
						$expire_date = $row["expire_date"];
						$hosting = $row["hosting"];
						$hosting_renewal_cycle = $row["hosting_renewal_cycle"];
						$hosting_price = $row["hosting_price"];
						$hosting_expire_date = $row["hosting_expire_date"];
					
						## sign up Domain Only
						if (($expire_date != "") && ($hosting == "")) {	
							echo "<tr> <td>$domain</td> <input type=hidden name=domain[] value=$domain> <td>Domain</td> <td>Annual</td> <td>$expire_date</td> <td>$domain_price</td> <input type=hidden name=price[] value=$domain_price> <td><input type=\"checkbox\" name= renewal[] value=$domain^$domain_price></td></tr>";
							}
						## sign up Domain and Hosting
						else if (($expire_date != "") && ($hosting != "")) {
							echo "<tr><td>$domain</td><input type=hidden name=domain[] value=$domain><td>Domain</td> <td>Annual</td> <td>$expire_date</td> <td>$domain_price</td> <input type=hidden name=price[] value=$domain_price> <td><input type=\"checkbox\" name= renewal[] value=$domain^$domain_price></td></tr>";
		
							echo "<tr><td>$domain $hosting</td><input type=hidden name=domain[] value=$domain><td>Hosting</td> <td>$hosting_renewal_cycle</td> <td>$hosting_expire_date</td> <td>$hosting_price</td> <input type=hidden name=price[] value=$hosting_price> <td><input type=\"checkbox\" name= renewal[] value= \"$domain $hosting $hosting_renewal_cycle^$hosting_price\"></td></tr>";
						
							}
						## sign up Hosting Only
						if (($expire_date == "") && ($hosting != "")) {	
							echo "<tr><td>$domain $hosting</td><input type=hidden name=domain[] value=$domain><td>Hosting</td> <td>$hosting_renewal_cycle</td> <td>$hosting_expire_date</td> <td>$hosting_price</td> <input type=hidden name=price[] value=$hosting_price> <td><input type=\"checkbox\" name= renewal[] value=\"$domain $hosting $hosting_renewal_cycle^$hosting_price\"></td></tr>";
							}
					}

echo "
				</table>
					
					<input type=\"submit\" value=\"Press Here to Continue\">
				

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


// free resources and close connection
mysqli_free_result($result);
mysqli_close($connection);	

?>	

</body>
</html>