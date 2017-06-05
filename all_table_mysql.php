<?php

define('START_TIME','2012-01-12 23:02:34');
define('END_TIME','2013-01-12 23:02:34');

$servername = "35.197.12.147";
$username = "root";
$password = "daveroot";
$dbname = "demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

function generate_random_date_between()
{
	// returns timestamp
	// Convert to timetamps
	$min = strtotime(START_TIME);
	$max = strtotime(END_TIME);

	// Generate random number using above bounds
	$val = rand($min, $max);

	// Convert back to desired date format
	// MySQL DATETIME format: date('Y-m-d H:i:s', $val)
  return date('Y-m-d H:i:s', $val);
	// return $val;
}



function insert_website($count)
{
	global $conn;
	$source_list = array("google", "word_of_mouth", "direct_ad", "mail", "email", "facebook", "conference", "other");
	$state_list = array("UT", "MA", "TX", "CA", "NY", "AZ", "WA", "RI", "FL", "GA", "CT", "VA", "DC");
	for($i=0; $i<$count; $i++)
		{
			$ts = generate_random_date_between();
			$live_customers = rand(3500, 10000);
			$logins_per_day = rand(500, 1700);
			$average_time_spent = rand(0, 15);
			$error_rate = rand(0,40);
			$bouce_rate = rand(30, 80);
			$source = $source_list[array_rand($source_list)];
			$state = $state_list[array_rand($state_list)];
			$traffic = rand(100, 150000);

			$sql = "INSERT INTO website  VALUES ( DEFAULT, '$ts', DEFAULT, $live_customers, $logins_per_day, $average_time_spent, $error_rate, $bouce_rate, '$source', '$state', $traffic)";

			if ($conn->query($sql) === FALSE)
			{
				echo "ERROR:  $sql : $conn->error \n";
			}

		}
}

function insert_marketing($count)
{
	global $conn;
	$lead_source_list = array("google", "word_of_mouth", "direct_ad", "mail", "email", "facebook", "conference", "other");

	for($i=0; $i<$count; $i++)
		{
			$ts = generate_random_date_between();
			$inboud_leads = rand(10, 300);
			$conversion_rate = rand(0, 35);
			$customer_acquisition_cost = rand(25, 150)/10;
			$cost_per_lead = rand(3, 100)/10;
			$lead_source = $lead_source_list[array_rand($lead_source_list)];
			$google_roi = rand(20,55);
			$facebook_roi = rand(0, 10);
			$direct_mail_roi = rand(10,25);
			$other_roi = rand(0, 30);

			$sql = "INSERT INTO marketing VALUES ( DEFAULT, '$ts', DEFAULT, $inboud_leads, $conversion_rate, $customer_acquisition_cost, $cost_per_lead, '$lead_source', $google_roi, $facebook_roi, $direct_mail_roi, $other_roi)";

			if ($conn->query($sql) === FALSE)
			{
				echo "ERROR:  $sql : $conn->error \n";
			}

		}
}

function insert_finance($count)
{
	global $conn;

	for($i=0; $i<$count; $i++)
		{
			$ts = generate_random_date_between();
			$cash_flow = rand(100000, 2000000)/100;
			$burn_rate = rand(80000, 1700000)/100;
			$margins = rand(12, 38);
			$customer_lifetime_value = rand(0, 300000)/100;
			$cash_in_bank = rand(1000000, 50000000)/100;
			$revenue_growth_rate = rand(3, 15);
			$income_growth_rate = rand(1, 20);

			$sql = "INSERT INTO finance VALUES ( DEFAULT, '$ts', DEFAULT, $cash_flow, $burn_rate, $margins, $customer_lifetime_value, $cash_in_bank, $revenue_growth_rate, $income_growth_rate)";

			if ($conn->query($sql) === FALSE)
			{
				echo "ERROR:  $sql : $conn->error \n";
			}
		}
}



insert_website(100);
insert_marketing(100);
insert_finance(100);


// close MySQL connection
$conn->close();

?>
