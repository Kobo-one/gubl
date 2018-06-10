<?php
include_once("lib/classes/Functions.class.php");
include_once("lib/classes/Product.class.php");
$products = Product::getAllProducts();

if(isset($_GET["type"])){
    $products = Product::getFilteredProducts($_GET["type"]);
};

if(isset($_GET["sort"])){

}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gubl</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="lib/js/jquery.scrollify.js"></script>
    <script src="lib/js/script.js"></script>
</head>
<?php include_once("includes/settings.php");?>
<?php include_once("includes/nav.php");?>
    <div class='categories'>
        <div class='button button_back' onclick="history.go(-1);"></div>
        <p class='categorie'>ITEMS</p>
        <div class='button button_settings'></div>
    </div>
    
    <section class="products">
        <?php foreach($products as $key =>$c): ?>  
        <div class="product">
            <a href="product.php?item=<?php echo $c['id'] ?>">
                <div>
                    <p class='product_price'>€<?php echo $c['original_price'] ?></p>
                    <img class="product_image" src="<?php echo $c['picture'] ?>" alt="<?php echo $c['name'] ?>">
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
                        <p>150 van <?php echo $c['max_amount'] ?></p>
                        <div class="product_time"><img src="images/time.svg" alt="time"><p><?php echo Functions::timeAgo($c['end_date']); ?></p></div>
                    </div>

                </div>
            </a>

        </div>

        <?php endforeach; ?>

    </section>




</body>
</html>