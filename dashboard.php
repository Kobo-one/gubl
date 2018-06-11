<?php
include_once("lib/classes/Functions.class.php");
include_once("lib/classes/Product.class.php");
include_once("lib/classes/Request.class.php");

$requests = Request::getAllRequests();
$products = Product::getAllProducts();


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GUBL - Dashboard</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto:300" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="lib/js/script2.js"></script>
    <script type="text/javascript">
        if (screen.width <= 699) {
        document.location = "home.php";
        }
    </script>
</head>
<body>

    <?php include_once("includes/nav_dashboard.php")?>
    <div class="board">
        <div class="top_page"><img class="home" src="images/home.svg" alt="Home"><h1 class="title">DASHBOARD</h1></div>
        
        <div class="dashboard">
        <h1>Welkom Kobe Christiaensen</h1>

        <div class="boards groepsaankopen">
            <h2>Jouw groepsaankopen</h2>
            <div class="products">
           
            <?php foreach($products as $key =>$c): ?>  
                <div class="product">
                    <a href="#">
                        <div class="price_image">
                            <p class='product_price'>€<?php echo $c['original_price'] ?></p>
                            <div class="product_image" ><img src="<?php echo $c['picture'] ?>" alt="<?php echo $c['name'] ?>"></div>
                        </div>
                        <div class="product_details">
                            <p class="product_name"><?php echo $c['name'] ?></p>
                            <div class="progressbar">
                                <div class="bar" style="width: 30%;"></div>
                                <?php foreach($c['prices'] as $priceId=>$price):?>
                                <div class="marker" style="left: <?php $percent = (intval($price['amount']) / intval($c['original_price']))*100;
                                echo  $percent;
                                
                                ?>%;"></div>
                                <?php endforeach; ?>
                                <div class="backgr"></div>
                            </div>
                            <div class="product_amount-time">
                                <p>150 van 200</p>
                                <div class="product_time"><img src="images/time.svg" alt="time"><p><?php echo Functions::timeAgo($c['end_date']); ?></p></div>
                            </div>

                        </div>
                    </a>

                </div>
            
            <?php endforeach; ?>
            
            </div>
        </div>
        <div class="boards groepsaankopen">
            <h2>Jouw requests</h2>
            <div class="products"><?php foreach($requests as $key =>$r): ?>  
        <div class="product">
            <a href="#">
                <div class="slider">
                        <div class="product_image"><img  src="<?php echo $r['artikels'][0]['picture'] ?>" alt="<?php echo $r['artikels'][0]['name'] ?>"></div>
                    
                </div>
                <div class="product_details">
                    <p class="product_name">Keuze <?php echo $r['title'] ?></p>
                    

                </div>
            </a>

        </div>

    <?php endforeach; ?>
    </div>
        </div>
        

        </div>

    </div>




</body>
</html>