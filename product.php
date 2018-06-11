<?php
session_start();
$_SESSION["user"] =1;
include_once("lib/classes/Functions.class.php");
include_once("lib/classes/Product.class.php");
$id = $_GET['item'];

if(isset($id)){
    $product = Product::getProduct($id);
}

if(isset($_POST['joinDrop'])){
    if(Product::newBuy($id)){
        header("Location: items.php"); 
    }
    

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
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script type="text/javascript">
        if (screen.width >= 699) {
        document.location = "dashboard.php";
        }
    </script>
</head>


<?php include_once("includes/nav.php");?>

<div class='categories'>
    <div class='button button_back' onclick="history.go(-1);"></div>
    <p class='categorie'>
        <?php 
            if(!empty($product)){
                echo $product[0]['name'];
            }
            else{
                echo "Ongeldig item";
            }
    ?>
    </p>
</div>

<section class="products">

    <?php foreach($product as $key =>$c): ?>  
        



    <div class="product">
            <div>
                <p class='product_price'><?php echo $c['original_price'] ?></p>
                <img class="product_image" src="<?php echo $c['picture'] ?>" alt="<?php echo $c['name'] ?>">
                <div class="product_amount-time on-photo">
                    <p>150 van <?php echo $c['max_amount'] ?></p>
                    <div class="product_time"><img src="images/time_black.svg" alt="time"><p><?php echo Functions::timeAgo($c['end_date']); ?></p></div>
                </div>
            </div>
            <div class="product_details">
                <p class="product_name"><?php echo $c['name'] ?></p>
                <div class="progressbar opened">
                    <div class="bar" style="width: 30%;"></div>
                    <?php foreach($c['prices'] as $priceId=>$price):?>
                        <div class="marker" style="left: <?php $percent =round( ((intval($price['amount']) / intval($c['original_price']))*100), 0) ;
                         echo  $percent;
                         
                         ?>%;"></div>
                         <div class="marker hiddenmarkers" style="left: <?php echo  $percent;?>%;" data-title="Bij <?php echo  $price['amount']?> aankopen zakt de prijs naar €<?php echo  $price['price'];?>"></div>
                        <?php endforeach; ?>                 
                    <div class="backgr"></div>
                </div>
                <div class="product_description">
                <?php echo $c['description'] ?>
                </div>  
            </div>

            <?php if(Product::checkBuy($c['id'])){
                echo '<form method="post">
                        <input type="submit" value="NEEM DEEL AAN DEZE GROEPSAANKOOP" name="joinDrop" class="button button_joinDrop">
                        </form>';
            }else{
                echo '<form method="">
                        <input type="submit" value="U NEEMT AL DEEL AAN DEZE VERKOOP" class="button button_joinDrop greyed">
                        </form>';
            }
            
            ?>
            <?php endforeach; ?>
    </div>

<script>
    
</script>
</section>
