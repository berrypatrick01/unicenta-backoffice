<?php require "login/loginheader.php"; ?>
<?php
include 'db.php';
$end_date = date('Y-m-d 23:59:59');
$start_date = date('Y-m-d 00:00:00');
$todays_date = date('Y-m-d 00:00:00');
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$res = mysqli_query($conn,"SELECT Sum((ticketlines.price*ticketlines.units)-((products.pricesell*ticketlines.units)-(ticketlines.price*ticketlines.units))+((ticketlines.price*taxes.rate)*ticketlines.units)) AS ticketlines_GTOTAL, receipts.`datenew` AS receipts_DATENEW, people.`name` AS people_NAME FROM `people` people LEFT JOIN `tickets` tickets ON people.`id` = tickets.`person` LEFT JOIN `receipts` receipts ON tickets.`id` = receipts.`id` LEFT JOIN `ticketlines` ticketlines ON tickets.`id` = ticketlines.`ticket` LEFT JOIN `products` products ON ticketlines.`product` = products.`id` LEFT JOIN `taxes` taxes ON ticketlines.`taxid` = taxes.`id` LEFT JOIN `categories` categories ON products.`category` = categories.`id` LEFT JOIN `closedcash` closedcash ON receipts.`money` = closedcash.`money` WHERE receipts.datenew BETWEEN '$start_date' AND '$end_date'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($res);
    $today_sales = $row[0];

$res2 = mysqli_query($conn,"SELECT Sum((ticketlines.price*ticketlines.units)-((products.pricesell*ticketlines.units)-(ticketlines.price*ticketlines.units))+((ticketlines.price*taxes.rate)*ticketlines.units)) AS ticketlines_GTOTAL, receipts.`datenew` AS receipts_DATENEW, people.`name` AS people_NAME FROM `people` people LEFT JOIN `tickets` tickets ON people.`id` = tickets.`person` LEFT JOIN `receipts` receipts ON tickets.`id` = receipts.`id` LEFT JOIN `ticketlines` ticketlines ON tickets.`id` = ticketlines.`ticket` LEFT JOIN `products` products ON ticketlines.`product` = products.`id` LEFT JOIN `taxes` taxes ON ticketlines.`taxid` = taxes.`id` LEFT JOIN `categories` categories ON products.`category` = categories.`id` LEFT JOIN `closedcash` closedcash ON receipts.`money` = closedcash.`money`") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($res2);
    $alltime_sales = $row[0];

$res3 = mysqli_query($conn,"SELECT Sum((ticketlines.price*ticketlines.units)-((products.pricesell*ticketlines.units)-(ticketlines.price*ticketlines.units))+((ticketlines.price*taxes.rate)*ticketlines.units)) AS ticketlines_GTOTAL, receipts.`datenew` AS receipts_DATENEW, people.`name` AS people_NAME, SUM(ticketlines.`units`) AS ticketlines_UNITS_COUNT FROM `people` people LEFT JOIN `tickets` tickets ON people.`id` = tickets.`person` LEFT JOIN `receipts` receipts ON tickets.`id` = receipts.`id` LEFT JOIN `ticketlines` ticketlines ON tickets.`id` = ticketlines.`ticket` LEFT JOIN `products` products ON ticketlines.`product` = products.`id` LEFT JOIN `taxes` taxes ON ticketlines.`taxid` = taxes.`id` LEFT JOIN `categories` categories ON products.`category` = categories.`id` LEFT JOIN `closedcash` closedcash ON receipts.`money` = closedcash.`money` WHERE receipts.datenew BETWEEN '$start_date' AND '$end_date'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($res3);
    $units_sold = $row['ticketlines_UNITS_COUNT'];
    


?>
<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en">
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
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-pink.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    <link rel="stylesheet" href="styles.css">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
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
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
          <a href="index.html" class="mdl-layout__tab is-active">Home</a>
          <a href="stock.php" class="mdl-layout__tab">Edit Stock</a>
          <a href="sales.php" class="mdl-layout__tab">View Sales</a>
          <a href="sales_by_person.php" class="mdl-layout__tab">View Sales By User</a>
          <a href="user_profile.php" class="mdl-layout__tab">Profile</a>
          <a href="faq.html" class="mdl-layout__tab">FAQ</a>
          <a href="login/logout.php" class="mdl-layout__tab">Logout</a>
          
                
           
          
        </div>
          <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent swapDash" data-toggle="collapse" data-target="#collapseExample" id="add">
            <i id="icon-dash" class="glyphicon glyphicon-plus"></i> Dashboard
          </button>
      </header>
      <main class="mdl-layout__content">
          <div class="collapse" id="collapseExample">
          <div class="card card-body">
     <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">monetization_on</i>
                  </div>
                  <p class="card-category">Todays Income</p>
                   <h3 class="card-title"><?php echo $currency;echo $today_sales;?></h3>
                    
                    
                  
                </div>
                <div class="card-footer">
                  <div class="stats">
                     <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Total Alltime Revenue</p>
                  <h3 class="card-title"><?php echo $currency;echo $alltime_sales;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">date_range</i>
                  </div>
                  <p class="card-category">Today's Date</p>
                  <h3 class="card-title"><?php echo date("d/m/Y");?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                   
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">equalizer</i>
                  </div>
                  <p class="card-category">Today's Unit's Sold</p>
                  <h3 class="card-title"><?php echo $units_sold;?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> Last 24 Hours
                  </div>
                </div>
              </div>
            </div>
          </div>
  </div>
              </div>
              </div>
              
          </div>
        <div class="mdl-layout__tab-panel is-active" id="overview">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">
              <i class="material-icons" style="font-size: 100px;">monetization_on</i>
            </header>
            
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
                
                 <div class="mdl-card__supporting-text">
                <h4>Sales</h4>
                Explore through your businesses sales.
              </div>
              <div class="mdl-card__actions">
                <a href="sales.php" class="mdl-button">GO</a>
              </div>
            </div>
              
            </section>
            <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">
              <i class="material-icons" style="font-size: 100px;">person</i>
            </header>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__supporting-text">
                <h4>Sales By User
                  </h4>
                Explore through your businesses sales based on an employee.
              </div>
              <div class="mdl-card__actions">
                <a href="sales_by_person.php" class="mdl-button">GO</a>
              </div>
            </div>
              
            </section>
            <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white">
              <i class="material-icons"style="font-size: 100px;">compare_arrows</i>
            </header>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__supporting-text">
                <h4>Edit Stock</h4>
                Edit your product's stock, through an easy and intuitive web interface!.
              </div>
              <div class="mdl-card__actions">
                <a href="stock.php" class="mdl-button">GO</a>
              </div>
                
            </div>
              
            </section>
        <?php include 'footer.php';?>
          </div>
      </main>
    </div>
    
      <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
   <script>
    $(document).ready(function() {
      $('#add').click(function() {
        console.log($('#icon-dash').hasClass('glyphicon glyphicon-plus'));
        if ($('#icon-dash').hasClass('glyphicon glyphicon-plus')) {
          $('#icon-dash').removeClass('glyphicon glyphicon-plus');
          $('#icon-dash').addClass('glyphicon glyphicon-minus');
        } else if ($('#icon-dash').hasClass('glyphicon glyphicon-minus')) {
          $('#icon-dash').removeClass('glyphicon glyphicon-minus');
          $('#icon-dash').addClass('glyphicon glyphicon-plus');
          

          
        }
      });
    });
  </script>
     
  </body>
    
</html>
