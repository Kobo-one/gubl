<?php
include_once("lib/classes/Functions.class.php");
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

        <div class="product">
            <a href="product.php?item=brood">
                <div>
                    <p class='product_price'>€ 2,30</p>
                    <img class="product_image" src="images/products/brood.jpg" alt="brood">
                </div>
                <div class="product_details">
                    <p class="product_name">Wit brood</p>
                    <div class="progressbar">
                        <div class="bar" style="width: 30%;"></div>
                        <div class="marker" style="left: 75%;"></div>
                        <div class="marker" style="left: 50%;"></div>
                        <div class="backgr"></div>
                    </div>
                    <div class="product_amount-time">
                        <p>150 van 200</p>
                        <div class="product_time"><img src="images/time.svg" alt="time"><p>1 MAAND</p></div>
                    </div>

                </div>
            </a>

        </div>
        
        <div class="product">
            <a href="product.php?item=brood">
                <div>
                    <p class='product_price'>€ 2,30</p>
                    <img class="product_image" src="images/products/brood.jpg" alt="brood">
                </div>
                <div class="product_details">
                    <p class="product_name">Wit brood</p>
                    <div class="progressbar">
                        <div class="bar" style="width: 30%;"></div>
                        <div class="marker" style="left: 75%;"></div>
                        <div class="marker" style="left: 50%;"></div>
                        <div class="backgr"></div>
                    </div>
                    <div class="product_amount-time">
                        <p>150 van 200</p>
                        <div class="product_time"><img src="images/time.svg" alt="time"><p>1 MAAND</p></div>
                    </div>

                </div>
            </a>

        </div>


    </section>




</body>
</html>