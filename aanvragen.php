<?php
session_start();
$_SESSION["user"] =1;
include_once("lib/classes/Functions.class.php");
include_once("lib/classes/Request.class.php");

$requests = Request::getAllRequests();



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
    <?php foreach($requests as $key =>$r): ?>  
        <div class="product">
            <a href="aanvraag.php?id=<?php echo $r['id'] ?>">
                <div class="slider">
                    <?php foreach($r['artikels'] as $artikel=>$a):?>
                        <div class="product_image"><img  src="<?php echo $a['picture'] ?>" alt="<?php echo $a['name'] ?>"></div>
                    <?php endforeach; ?>
                </div>
                <div class="product_details">
                    <p class="product_name">Keuze <?php echo $r['title'] ?></p>
                    

                </div>
            </a>

        </div>

    <?php endforeach; ?>

    </section>



</body>
</html>