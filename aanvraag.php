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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="lib/js/jquery.scrollify.js"></script>
    <script src="lib/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
</head>


<?php include_once("includes/nav.php");?>

<div class='categories'>
    <div class='button button_back' onclick="history.go(-1);"></div>
    <p class='categorie'>Keuze Cola merk</p>
</div>

<section class="products slider">

    <div class="product">
            <div>
                <p class='product_price'>€ 2,30</p>
                <img class="product_image" src="images/products/brood.jpg" alt="brood">
                
            </div>
            <div class="product_details">
                <p class="product_name">Coca Cola</p>
                
                <div class="product_description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim natus, suscipit sit laudantium praesentium consequuntur consequatur minima libero et, adipisci atque ad ea vero similique reiciendis ut id perspiciatis commodi.
                </div>  

                <p>Stemmen:</p>
                <div class="progressbar opened">
                    <div class="bar" style="width: 20%;">15/75</div>
                    <div class="backgr"></div>
                </div>
                <p>Prijs:</p>
                <p class="product_pricedescription">Vanaf 100aankopen zou de prijs zakken naar €2.00</p>
                
            </div>

            <form method="post">
                <input type="submit" value="VOTE VOOR COCA COLA" name="vote1" class="button button_joinDrop">
            </form>
    </div>
    <div class="product">
            <div>
                <p class='product_price'>€ 2,30</p>
                <img class="product_image" src="images/products/brood.jpg" alt="brood">
                
            </div>
            <div class="product_details">
                <p class="product_name">Coca Cola</p>
                
                <div class="product_description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim natus, suscipit sit laudantium praesentium consequuntur consequatur minima libero et, adipisci atque ad ea vero similique reiciendis ut id perspiciatis commodi.
                </div>  

                <p>Stemmen:</p>
                <div class="progressbar opened">
                    <div class="bar" style="width: 20%;">15/75</div>
                    <div class="backgr"></div>
                </div>
                <p>Prijs:</p>
                <p class="product_pricedescription">Vanaf 100aankopen zou de prijs zakken naar €2.00</p>
                
            </div>

            <form method="post">
                <input type="submit" value="VOTE VOOR COCA COLA" name="vote1" class="button button_joinDrop">
            </form>
    </div>

<script>
    
</script>
</section>
