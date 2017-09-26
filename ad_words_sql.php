<?php

// 2 args 1:start_date 2:end_date 
// yyyy-mm-dd format

if($argc != 3)
{
    echo "Incorrect number of arguments, requires start and end date \n";
    exit(-1); 
}

$start_date = $argv[1]; 
$end_date = $argv[2]; 

date_default_timezone_set('America/Los_Angeles');

$servername = "159.203.248.139";
$username = "remoteroot";
$password = "remoteroot";
$dbname = "demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

function insert_ad_words_demo($start_date, $end_date)
{
    global $conn; 

    $date = $start_date;

    while($date <= $end_date)
    {
        $r = rand(10, 1000); 
        $period = $date;
        $spend = (int) ($r/2); 
        $clicks = (int) ($r*100);  
        $ctr = (int) ($r/100);
        $cpc = (int) ($r/500 + 20);
        $impressions = (int) ($r*1000);
        $conversion_rate = (int) ($r/40);  
        $revenue_per_conversion = (int) ($r/200 + 20); 
        $conversions = (int) ($r*10);
        $unique_customers_added = (int) ($r/50 + 5);  

        $sql = "INSERT INTO ad_words_demo VALUES (DEFAULT, '$period', $spend, $clicks, $ctr, $cpc, $impressions, $conversion_rate, $revenue_per_conversion, $conversions, $unique_customers_added, DEFAULT)";

        if ($conn->query($sql) === FALSE)
		{
			echo "ERROR:  $sql : $conn->error \n";
        }
        
        // echo " period spend clicks ctr cpc impressions conversion_rate revenue_per_conversion conversions unique_customers_added \n";
        // echo " $period $spend $clicks $ctr $cpc $impressions $conversion_rate $revenue_per_conversion $conversions $unique_customers_added \n"; 

        $date = date('Y-m-d', strtotime($date . ' +1 day'));

    }
     
}

insert_ad_words_demo($start_date, $end_date);

// close MySQL connection
$conn->close();

?>
