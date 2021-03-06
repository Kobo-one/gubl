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
    <title>GUBL - Mijn requests</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto:300" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        if (screen.width <= 699) {
        document.location = "home.php";
        }
    </script>
</head>
<body>

    <?php include_once("includes/nav_dashboard.php")?>
    <div class="board">
        <div class="top_page"><img class="home" src="images/home.svg" alt="Home"><h1 class="title">MIJN REQUESTS</h1></div>
        
        <div class="dashboard">
        

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




</body>
</html>