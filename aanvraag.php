<?php
session_start();
$_SESSION["user"] =1;
include_once("lib/classes/Functions.class.php");
include_once("lib/classes/Request.class.php");
$id = $_GET['id'];

if(isset($id)){
    $request = Request::getRequest($id);
}

if(!empty($_POST)){
    if(Request::newVote(key($_POST))){
        header("Location: aanvragen.php"); 
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
                    <p class='product_price'>€ <?php echo $a['price']?></p>
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
                <?php 
                if(Request::checkVoted($a['id'],$r['id'])){
                    if(Request::checkVote($a['id'])){
                        echo '<form method="post">
                                <input type="submit" value="VERANDER UW VOTE NAAR '.$a['name'].'" name="'.$a['id'].'" class="button button_joinDrop">
                                </form>';
                        }else{
                            echo '<form method="post">
                                <input type="submit" value="VOTE VOOR '.$a['name'].' VERWIJDEREN?" name="removeVote" class="button button_joinDrop">
                                </form>';
                        }
                }
                else{
                    echo '<form method="post">
                                <input type="submit" value="VOTE VOOR '.$a['name'].' " name="'.$a['id'].'" class="button button_joinDrop">
                                </form>';
                }
                
                ?>
        </div>
    <?php endforeach?>  
    

</section>
<?php endforeach; ?>