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


<?php include_once("includes/nav.php");?>

<div class='categories'>
    <div class='button button_back' onclick="history.go(-1);"></div>
    <p class='categorie'>Wit brood</p>
</div>

<section class="products">

    <div class="product">
            <div>
                <p class='product_price'>€ 2,30</p>
                <img class="product_image" src="images/products/brood.jpg" alt="brood">
                <div class="product_amount-time on-photo">
                    <p>150 van 200</p>
                    <div class="product_time"><img src="images/time_black.svg" alt="time"><p>1 MAAND</p></div>
                </div>
            </div>
            <div class="product_details">
                <p class="product_name">Wit brood</p>
                <div class="progressbar opened">
                    <div class="bar" style="width: 30%;"></div>
                    <div class="marker" style="left: 75%;"></div>
                    <div class="marker hiddenmarkers" style="left: 75%;" data-title="At 70% the price would drop to €1.90"></div>
                    <div class="marker" style="left: 50%;"></div>
                    <div class="marker hiddenmarkers" style="left: 50%;" data-title="At 50% the price would drop to €2"></div>                    
                    <div class="backgr"></div>
                </div>
                <div class="product_description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim natus, suscipit sit laudantium praesentium consequuntur consequatur minima libero et, adipisci atque ad ea vero similique reiciendis ut id perspiciatis commodi.
                </div>  
            </div>

            <form method="post">
                <input type="submit" value="NEEM DEEL AAN DEZE GROEPSAANKOOP" name="joinDrop" class="button button_joinDrop">
            </form>
    </div>

<script>
    
</script>
</section>
