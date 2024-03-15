<style>
  body {
      font: 18px/25px "Times New roman", Tahoma, Verdana, sans-serif;
      color: white;
      background-image: url('/recordmanagement/main/img/pgmo1.jpg'); /* Adjusted path */
      background-size: cover; /* Adjusted property */
      background-position: center; /* Adjusted property */
      background-repeat: no-repeat; /* Prevent background image from repeating */
    
}
table { border-collapse: separate; background-color: #FFFFFF; border-spacing: 0; width: 80%; color: #666666; text-shadow: 0 1px 0 #FFFFFF; border: 1px solid #CCCCCC; box-shadow: 0; margin: 0 auto;font-family: arial; }
table thead tr th { background: none repeat scroll 0 0 #EEEEEE; color: #222222; padding: 10px 14px; text-align: left; border-top: 0 none; font-size: 12px; }
table tbody tr td{
    background-color: #FFFFFF;
	font-size: 12px;
    text-align: left;
	padding: 10px 14px;
	border-top: 1px solid #DDDDDD;
}
        #sidebar {
            background-color: #3b5998;
            color: #fff;
            width: 200px;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            padding-top: 20px;
        }
        #sidebar a {
            display: block;
            padding: 10px 20px;
            color: WHITE;
            text-decoration: none;
        }
        #sidebar a:hover {
            background-color: BLUE;
        }
        .dashboard {
            margin-left: 220px; /* Adjusted for sidebar width */
            padding: 20px;
        }
        h2 {
            margin-top: 0;
        }
        .link {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="index.php">Transaction</a>
        <a href="doctype.php">Document Type</a>
        <a href="offices.php">Offices</a>
        <a href="../index.php">Logout</a>
    </div>
    <div class="dashboard">
   
<?php
// Include the connect.php file
include('connect.php');

// Function to execute SQL queries and fetch data
function fetchData($db, $query) {
    $result = $db->query($query);
    return $result ? $result->fetchColumn() : 0;
}

// Fetch data for each section
$totalTransactions = fetchData($db, "SELECT COUNT(*) FROM `transaction`");
$totalOffices = fetchData($db, "SELECT COUNT(*) FROM `offices`");
$totalDocumentTypes = fetchData($db, "SELECT COUNT(*) FROM `doc_type`");

?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<title>Infographic Chart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.css">
    <style>
        .chart-container {
            display: flex;
            justify-content: space-around;
        }
        .chart {
            position: relative;
            display: inline-block;
            width: 200px;
            height: 200px;
            text-align: center;
        }
        .percent {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            font-weight: bold;
        }
        .title {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="section" id="infographicChart">
    <h2>Data Overview</h2>
    <div class="chart-container">
        <div class="chart" data-percent="<?php echo $totalOffices; ?>">
            <div class="title">Total Offices</div>
            <span class="percent"><?php echo $totalOffices; ?></span>
        </div>
        <div class="chart" data-percent="<?php echo $totalTransactions; ?>">
            <div class="title">Total Transactions</div>
            <span class="percent"><?php echo $totalTransactions; ?></span>
        </div>
        <div class="chart" data-percent="<?php echo $totalDocumentTypes; ?>">
            <div class="title">Total Document Types</div>
            <span class="percent"><?php echo $totalDocumentTypes; ?></span>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>
<script>
$(function() {
    $('.chart').each(function() {
        var percent = $(this).data('percent');
        $(this).easyPieChart({
            size: 200,
            barColor: '#4CAF50', // Change color as needed
            trackColor: '#f2f2f2',
            scaleColor: false,
            lineWidth: 10,
            lineCap: 'round',
            animate: 2000,
            onStart: $.noop,
            onStop: $.noop,
            easing: 'easeOutBounce'
        });
    });
});

</script>
