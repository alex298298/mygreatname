
<?

$expire_date_from  = $_POST["expire_date_from"];
$expire_date_to    = $_POST["expire_date_to"];
$email_type        = $_POST["email_type"];

if ((!$expire_date_from) || (!$expire_date_to)) {
	//header("Location:http://mygreatname.com/error/error.html");
	echo "Please fill in all the fields";
	exit;
} else {
	include ("../contact_email_address.inc");
}

// create connection
$connection = mysql_connect("localhost", "mygreatn_admin", "3388mcbody") or die ("Couldn't connect to the server.");

// select database
$db = mysql_select_db("mygreatn_domainmember", $connection) or die ("Couldn't select database.");


// create SQL

if ($email_type == "renew_domain") {
	$sql = "SELECT username, domain_name, domain_price, expire_date FROM domain  where expire_date is not null and expire_date >= '$expire_date_from' and expire_date <= '$expire_date_to'";
}
else if ($email_type == "renew_hosting") {
	$sql = "SELECT username, domain_name, hosting, hosting_price, hosting_renewal_cycle, hosting_expire_date FROM domain  where hosting is not null and hosting_expire_date >= '$expire_date_from' and hosting_expire_date <= '$expire_date_to'";
}


// execute SQL query and get result
$result = mysql_query($sql, $connection) or die ("Couldn't execute query.");



if ($email_type == "renew_domain") {

$msg1  = "To ensure that you do not lose your domain, we encourage you to\n"; 
$msg1 .= "renew your domain at our website at your earliest convenience.\n\n";


$msg4  = "NOTE\n";
$msg4 .= "If you fail to renew your domains on time, they will be cancelled.\n";
$msg4 .= "MyGreatName.com has no liability whatsoever with respect to any\n";
$msg4 .= "such cancellation.\n\n";


}

else if ($email_type == "renew_hosting") {

$msg7  = "To ensure that you can continue to use our hosting service, we\n"; 
$msg7 .= "encourage you to renew your hosting service at our website at\n";
$msg7 .= "your earliest convenience.\n\n";

}


// Common Message

$msg2  = "CHINESE NEW YEAR HOLIDAY\n\n";
$msg2 .= "Please be informed that our 2009 Chinese New Year Holiday will be\n";
$msg2 .= "from January 16, 2009 to January 30, 2008.  Therefore we highly suggest\n";
$msg2 .= "you renew your service earlier if your domain or hosting expires in\n";
$msg2 .= "our holiday period.\n\n";

$msg2  = "RENEW INSTRUCTION\n\n";
$msg2 .= "1. Please log in with your Username and Password at our Member Area.\n";
$msg2 .= "2. Click the 'Renew Domain' button.\n";
$msg2 .= "3. Follow the steps.\n";
$msg2 .= "4. Done!\n\n";


$msg5  = "Should you have any questions about the renewal process, please\n"; 
$msg5 .= "contact us by replying to this email.\n\n";
$msg5 .= "Sincerely,\n\n";
$msg5 .= "MyGreatName.com Customer Care\n";
$msg5 .= "MyGreatName.com\n";



While ($row = mysql_fetch_array($result)) {

	$username              = $row['username'];
	$domain_name           = $row['domain_name'];
	$domain_price          = $row['domain_price'];
	$expire_date           = $row['expire_date'];
	$hosting_price         = $row['hosting_price'];
	$hosting_renewal_cycle = $row['hosting_renewal_cycle'];
	$hosting_expire_date   = $row['hosting_expire_date'];
	
	echo "$username $expire_date<br>";


	// create SQL_2 from member table
	$sql_2 = "SELECT username, real_name, password, email FROM member where username = '$username'";
	
	// execute SQL query and get result
	$result_2 = mysql_query($sql_2, $connection) or die ("Couldn't execute query.");


	//Send message loop
	While ($row_2 = mysql_fetch_array($result_2)) {
		$email = $row_2['email'];
		$real_name = $row_2['real_name'];
		$password = $row_2['password'];

		echo "$email<p>";


			$msg3  = "MEMBER AREA\n\n";
			$msg3 .= "Here's your username and password to login your member account again\n\n";
			$msg3 .= "-------------------------------------------------\n";
			$msg3 .= "Username: $username\n";
			$msg3 .= "Password: $password\n";
			$msg3 .= "Member Area: http://MyGreatname.com/member/index.php\n";
			$msg3 .= "--------------------------------------------------\n\n";

		if ($email_type == "renew_domain") {
			$subject = "$domain_name Renewal Notice";

			$msg0  = "Please be kindly informed that your domain ($domain_name) will\n";
			$msg0 .= "be expired on $expire_date (Year-Month-Day).\n\n";
			$msg0 .= "$domain_name DOMAIN RENEWAL FEE:\n";
			$msg0 .= "USD$domain_price per year\n\n";
			
		}

		else if ($email_type == "renew_hosting") {
			$subject = "Hosting ($domain_name) Renewal Notice";

			$msg6  = "Please be kindly informed that your hosting account for the\n"; 
			$msg6 .= "domain ($domain_name) will be expired on\n";
			$msg6 .= "$hosting_expire_date (Year-Month-Day).\n\n";
			$msg6 .= "$domain_name HOSTING RENEWAL FEE:\n";
			$msg6 .= "USD$hosting_price per $hosting_renewal_cycle\n\n";

		}

		
		//Take notice that we've included $subject and $message below
		if ($email_type == "renew_domain") {
			mail("$email","$subject","Dear $real_name\n\n$msg0$msg1$msg2$msg3$msg4$msg5","From: $my_email_address");
		}
		else if ($email_type == "renew_hosting") {
			mail("$email","$subject","Dear $real_name\n\n$msg6$msg7$msg2$msg3$msg5","From: $my_email_address");
		}

	}
	
}


//Close the database connection
mysql_close();

?>
