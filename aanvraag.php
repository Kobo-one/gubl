<?php
include_once("lib/classes/Functions.class.php");
include_once("lib/classes/Request.class.php");
$id = $_GET['id'];

if(isset($id)){
    $request = Request::getRequest($id);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
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
    <p class='categorie'><?php 
            if(!empty($request)){
                echo "Stemmen: ".$request[0]['title'];
            }
            else{
                echo "Ongeldig item";
            }
    ?></p>
</div>
<?php foreach($request as $key =>$r): ?>  
<section class="products slider">
    <?php foreach($r['artikels'] as $artikel => $a): ?>  
        <div class="product">
                <div>
                    <p class='product_price'><?php echo $a['price']?></p>
                    <div class="product_image" ><img src="<?php echo $a['picture']?>" alt="<?php echo $a['name']?>"></div>
                    
                </div>
                <div class="product_details">
                    <p class="product_name"><?php echo $a['name']?></p>
                    
                    <div class="product_description">
                    <?php echo $a['description']?>
                    </div>  

                    <p>Stemmen:</p>
                    <div class="progressbar opened">
                        <div class="bar" style="width: 20%;">15/75</div>
                        <div class="backgr"></div>
                    </div>
                                        
                </div>

                <form method="post">
                    <input type="submit" value="VOTE VOOR <?php echo $a['name']?>" name="vote<?php echo $a['id']?>" class="button button_joinDrop">
                </form>
        </div>
    <?php endforeach?>  
    

</section>
<?php endforeach; ?>