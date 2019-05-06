<?php require "login/loginheader.php"; ?>
<?php

$employee_name = $_POST['employee_name'];
$start_date = $_POST['fromdate'];
$end_date = $_POST['enddate'];
?>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title><?php include 'db.php'; echo $header_title;?></title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-pink.min.css">
    <link rel="stylesheet" href="styles.css">
     </head>
    <body class="mdl-demo mdl-color--grey-100 mdl-color-text--grey-700 mdl-base">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header mdl-layout__header--scroll mdl-color--primary">
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
          <h3><?php include 'db.php'; echo $page_name;?></h3>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect" style="height: 7%;">
          <a href="index.html" class="mdl-layout__tab is-active">Home</a>
          <a href="stock.php" class="mdl-layout__tab">Edit Stock</a>
          <a href="sales.php" class="mdl-layout__tab">View Sales</a>
          <a href="sales_by_person.php" class="mdl-layout__tab">View Sales By User</a>
          <a href="user_profile.php" class="mdl-layout__tab">Profile</a>
          <a href="faq.html" class="mdl-layout__tab">FAQ</a>
          <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add">
            <i class="material-icons" role="presentation">add</i>
            <span class="visuallyhidden">Add</span>
          </button>
        </div>
      </header>
      <main class="mdl-layout__content">
        <div class="mdl-layout__tab-panel is-active" id="overview">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">
              <i class="material-icons" style="font-size: 100px;" >person</i>
            </header>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__supporting-text">
                 <h4>Sales By <?php echo $employee_name;?>:</h4>
                  <h5>Between <?php echo $start_date; echo "-"; echo $end_date; ?></h5>
<?php






                   
                  include 'db.php';
                  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                  $result = mysqli_query($conn,"SELECT
     Sum(ticketlines.price*ticketlines.units) AS ticketlines_PRICE,
     SUM(ticketlines.price) AS subtotal,
     Sum(ticketlines.price*ticketlines.units) AS ticketlines_GTOTAL,
     Sum(ticketlines.price*ticketlines.units*taxes.rate) AS ticketlines_TAX,
     SUM(ticketlines.`units`) AS ticketlines_UNITS_COUNT,
     products.`code` AS products_CODE,
     products.`name` AS products_NAME,
     products.`id` AS products_ID,
     Sum(ticketlines.price*ticketlines.units) AS sellprice,
     Sum(taxes.rate) AS selltax,
     Sum((ticketlines.price*ticketlines.units)-((products.pricesell*ticketlines.units)-(ticketlines.price*ticketlines.units))+((ticketlines.price*taxes.rate)*ticketlines.units)) AS selltotal,
     receipts.`money` AS receipts_MONEY,
     receipts.`datenew` AS receipts_DATENEW,
     people.`name` AS people_NAME,
     tickets.`tickettype` AS tickets_TICKETTYPE,
     closedcash.`money` AS closedcash_MONEY,
     closedcash.`datestart` AS closedcash_DATESTART,
     closedcash.`dateend` AS closedcash_DATEEND,
     ticketlines.`ticket` AS ticketlines_TICKET,
     ticketlines.`line` AS ticketlines_LINE,
     ticketlines.`product` AS ticketlines_PRODUCT,
     categories.`name` AS categories_NAME,
     ticketlines.`units` AS ticketlines_UNITS,
     taxes.`id` AS taxes_ID,
     taxes.`rate` AS taxes_RATE,
     categories.`id` AS categories_ID,
     taxes.`category` AS taxes_CATEGORY
FROM
     `people` people 
     
     LEFT JOIN `tickets` tickets ON people.`id` = tickets.`PERSON`
     LEFT JOIN `receipts` receipts ON tickets.`id` = receipts.`ID`
     LEFT JOIN `ticketlines` ticketlines ON tickets.`id` = ticketlines.`ticket`
     LEFT JOIN `products` products ON ticketlines.`product` = products.`id`
     LEFT JOIN `taxes` taxes ON ticketlines.`taxid` = taxes.`id`
     LEFT JOIN `categories` categories ON products.`category` = categories.`id`
     LEFT JOIN `closedcash` closedcash ON receipts.`money` = closedcash.`money`
     
	 WHERE receipts.datenew BETWEEN '$start_date' AND '$end_date' 
	 
	 GROUP BY categories.id, taxes.id, people.name, categories.name");

echo "<table class='mdl-data-table' border='1'>
<tr>
<th>NAME</th>
<th>CATEGORY</th>
<th>SUBTOTAL</th>
<th>DATE</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['products_NAME'] . "</td>";
echo "<td>" . $row['categories_NAME'] . "</td>";
echo "<td>$currency" . $row['subtotal'] . "</td>";
echo "<td>" . $row['receipts_DATENEW'] . "</td>";

echo "</tr>";
}
echo "</table>";

            

?> 
                <a href="index.php"><button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" id="add">
            <i class="material-icons" role="presentation">arrow_back</i>
            <span class="visuallyhidden">Add</span>
                  </button></a>
 </div>
              
            </div>
            </section>
             <?php include 'footer.php';?>
          </div>
        
      </main>
    </div>
    
  </body>
                  
    
                  
             
</html>
