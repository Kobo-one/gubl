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
        <p class='categorie'>AANVRAGEN</p>
        <a class="button button_add" href="vraag.php"></a>
    </div>
    
    <section class="products">
        
        <div class="product">
            <a href="aanvraag.php?id=1">
                <div class="slider">
                    <img class="product_image" src="https://www.biertaxi-oss.nl/wp-content/uploads/2017/02/ahi_434d50323135303337_1_lowres_jpg.jpg" alt="brood">
                
                    <img class="product_image" src="https://www.biertaxi-oss.nl/wp-content/uploads/2017/02/ahi_434d50323135303337_1_lowres_jpg.jpg" alt="brood">
                
                    <img class="product_image" src="https://www.biertaxi-oss.nl/wp-content/uploads/2017/02/ahi_434d50323135303337_1_lowres_jpg.jpg" alt="brood">
                </div>
                <div class="product_details">
                    <p class="product_name">Keuze cola merk</p>
                    

                </div>
            </a>

        </div>


    </section>



</body>
</html>