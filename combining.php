<?php

define('START_TIME','2012-01-12 23:02:34');
define('END_TIME','2013-01-12 23:02:34');

$servername = "54.203.4.4";
$username = "remoteroot";
$password = "remoteroot";
$dbname = "combined";

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

function insert_facebook($count)
{
    global $conn;
    $state_list = array("UT", "MA", "TX", "CA", "NY", "AZ", "WA", "RI", "FL", "GA", "CT", "VA", "DC");
    $cost_list = array(2, 4, 8);
    $gender_list = array("M", "F");
    $clicked_list = array(0, 1);
    $converted_list = array(0, 1);

    
    for($i=0; $i<$count; $i++)
    {
        $clicked = $clicked_list[array_rand($clicked_list)];
        $converted = $converted_list[array_rand($converted_list)];
        $cost = $cost_list[array_rand($cost_list)];
        $age = rand(18, 55);
        $gender = $gender_list[array_rand($gender_list)];
        $state = $state_list[array_rand($state_list)];

        // $ip = "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);

        $sql = "INSERT INTO facebook VALUES (DEFAULT, $clicked, $converted, $cost, $age, '$gender', '$state')";

        if ($conn->query($sql) === FALSE)
		{
			echo "ERROR:  $sql : $conn->error \n";
		}
    }
}


function insert_website($count)
{
    global $conn;
    $product_list = array("Bat", "Ball", "Helmet", "Mitt");
    $revenue_list = array(20, 25, 45, 100, 175, 75);
    
    for($i=0; $i<$count; $i++)
    {   
        $ip = "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);
        $time_spent = rand(1, 360);
        $product = $product_list[array_rand($product_list)];
        $revenue = $revenue_list[array_rand($revenue_list)];

        $sql = "INSERT INTO website VALUES (DEFAULT, '$ip', $time_spent, '$product', $revenue)";

        if ($conn->query($sql) === FALSE)
		{
			echo "ERROR:  $sql : $conn->error \n";
		}
    }
}

function insert_retail($count)
{
    global $conn;
    $product_list = array("Bat", "Ball", "Helmet", "Mitt");
    $revenue_list = array(45, 100, 75, 200);
    
    for($i=0; $i<$count; $i++)
    {   
        $product = $product_list[array_rand($product_list)];
        $revenue = $revenue_list[array_rand($revenue_list)];

        $sql = "INSERT INTO retail VALUES (DEFAULT, '$product', $revenue)";

        if ($conn->query($sql) === FALSE)
		{
			echo "ERROR:  $sql : $conn->error \n";
		}
    }
}

function insert_plena($count)
{
    global $conn;
    $state_list = array("UT", "MA", "TX", "CA", "NY", "AZ", "WA", "RI", "FL", "GA", "CT", "VA", "DC");
    $cost_list = array(2, 4, 8, 18, 12, 35);
    $gender_list = array("M", "F");
    $clicked_list = array(0, 1);
    $converted_list = array(0, 1);
    $product_list = array("Bat", "Ball", "Helmet", "Mitt");
    $revenue_list = array(45, 100, 75, 200);
    $source_list = array("retail", "website");
    $referred_list = array("facebook", "google_ads", "trade_show", "direct_mail");
    
    for($i=0; $i<$count; $i++)
    {
        $age = rand(18, 55);
        $gender = $gender_list[array_rand($gender_list)];
        $state = $state_list[array_rand($state_list)];
        $ip = "".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255).".".mt_rand(0,255);
        $product = $product_list[array_rand($product_list)];
        $revenue = $revenue_list[array_rand($revenue_list)];
        $source = $source_list[array_rand($source_list)];
        $referred = $referred_list[array_rand($referred_list)];
        $cost = $cost_list[array_rand($cost_list)];
        $visit_time = rand(0, 1000);

        $sql = "INSERT INTO plena VALUES (DEFAULT, $age, '$gender', '$state', '$ip', '$product', $revenue, '$source', '$referred', $cost, $visit_time)";

        if ($conn->query($sql) === FALSE)
		{
			echo "ERROR:  $sql : $conn->error \n";
		}
    }
}

// insert_facebook(100);
// insert_website(100);
// insert_retail(200);
insert_plena(200);

// close MySQL connection
$conn->close();

?>
