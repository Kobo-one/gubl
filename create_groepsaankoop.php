<?php
session_start();
$_SESSION["user"] =1;
include_once("lib/classes/Product.class.php");
include_once("lib/classes/Functions.class.php");
include_once("lib/classes/Image.class.php");

if( !empty($_POST) ){
    if(isset($_POST['submit'])){
    //if image is chosen
        try{
        if(isset($_FILES['image'])){
        
        //make new image & set variables
        $image = new Image();
        $image->setFileName($_FILES['image']['name']);
        $image->setFileSize($_FILES['image']['size']);
        $image->setFileTmp($_FILES['image']['tmp_name']);
        $image->setFileType($_FILES['image']['type']);
        $image->setFileDir("images/products/".$_FILES['image']['name']);
        $image->setFileExt(strtolower((explode('.',$_FILES['image']['name']))[count(explode('.',$_FILES['image']['name']))-1]));

        //get variables to upload and save image on database
        $fileTmp = $image->getFileTmp();
        $fileDir = $image->getFileDir();
        $fileName = $image->getFileName(); 
        $fileSize = $image->getFileSize();
        
        //upload image & save on database
        if( move_uploaded_file($fileTmp, $fileDir) ){
            
           
            

            $product = new Product();
            $product->setImage( $fileDir );
            $product->setName($_POST['name']);
            $product->setOriginalPrice($_POST['price-original']);
            $product->setDescription($_POST['description']);
            $product->setCategory($_POST['category']);
            $product->setPickupDate($_POST['pickup_date']);
            $product->setEndDate($_POST['date']);
            $product->setMaxAantal($_POST['aantal-max']);
            $product->setTussenAantallen($_POST['aantal']);
            $product->setTussenPrijzen($_POST['price']);

            if($product->createProduct()){
                header("Location: dashboard.php"); 
            }
        }
        
    }
    }
    catch(Exception $e){
        $error= $e->getMessage();
    }
        
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GUBL - Nieuwe groepsaankoop</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto:300" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="lib/js/script2.js"></script>
    <script type="text/javascript">
        if (screen.width <= 699) {
        document.location = "home.php";
        }
    </script>
</head>
<body>

    <?php include_once("includes/nav_dashboard.php")?>
    <div class="board">
        <div class="top_page"><img class="home" src="images/home.svg" alt="Home"><h1 class="title">NIEUWE GROEPSAANKOOP</h1></div>
        
        <div class="dashboard">
        <form action="" method="post" enctype="multipart/form-data" id="uploadForm">
            <section class="artikel artikel_details">
                <h1>Artikel</h1>    
                <p>Informatie over het artikel dat u wilt verkopen.</p>
                <div class="field">
                    <div class="input_label">
                        <label for="name">Artikel naam</label>
                        <input type="text" class="name" id="name" name="name">
                    </div>
                    <div class="input_label">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="category">
                            <option value="1">Eten en drinken</option>
                            <option value="2">Hobby</option>
                            <option value="3">Huis en tuin</option>
                            <option value="4">Amusement</option>
                            <option value="4">Kleding</option>
                            <option value="4">Technologie</option>
                        </select>
                    </div>
                </div>
                <div class="image_description">
                    <div class="image">
                        
                        <label for="image_upload"  class="image_upload" >Kies een foto om toe te voegen</label>
                    </div>
                        <input type="file" name="image" id="image_upload" accept=".jpg, .jpeg, .png" onchange="filePreview(this);">
                    <textarea name="description" id="description" class="description"  rows="4" placeholder="Geef hier de omschrijving van het artikel"></textarea>
                </div>
            </section>

            <section class="artikel artikel_prijs">
                <h1>Prijs</h1>
                <p>Wat is de standaard prijs voor dit artikel?</p>
                <div class="field">
                    <div class="input_label">
                        <label for="price-original">Prijs</label>
                        <input id="price-original" name="price-original" type="number" min="0.01" step="0.01" />
                    </div>
                </div>

               
                    <p>Voeg het minimum aantal dat u wilt verkopen in en de bijhorende verminderde prijs.</p>
                <div class="field tussenprijs">
                    <div class="input_label">
                        <label for="aantal-min">Minimum aantal</label>
                        <input id="aantal-min" name="aantal[]" type="number" min="0" step="1" max="10000" onkeypress="return event.charCode >= 48 && event.charCode <= 57" title="Numbers only" />
                    </div>
                    
                    <div class="input_label">
                        <label for="price-min">Prijs</label>
                        <input id="price-min" name="price[]" type="number" min="0.01" step="0.01" />
                    </div>
                </div>

                
                <div class="field field-extra"><a class="extra">Voeg een extra tussenprijs toe.</a></div>
                
                    <p>Voeg het maximum aantal dat u wilt verkopen in.</p>
                <div class="field">
                    <div class="input_label">
                        <label for="aantal-max">Maximum aantal</label>
                        <input id="aantal-max" name="aantal-max" type="number" min="0" step="1" max="10000" onkeypress="return event.charCode >= 48 && event.charCode <= 57" title="Numbers only" />
                    </div>
                    
                </div>

            </section>
            <section class="artikel artikel_data">
                <h1>DATA</h1>
                <div class="field">
                    <div class="input_label">
                        <label for="date">Kies wanneer de groepsaankoop verloopt.</label>
                        <input type="date" name="date" id="date" min="<?php echo date("Y-m-d")?>" value="<?php echo date("Y-m-d")?>">
                    </div>
                    <div class="input_label">
                        <label for="pickup_date">Kies wanneer de groepsaankoop afgehaald kan worden.</label>
                        <input type="date" name="pickup_date" id="pickup_date" min="<?php echo date("Y-m-d")?>" value="<?php echo date("Y-m-d")?>">
                    </div>
                </div>

            </section>
            
            <input class="button button_send" name="submit" type="submit" value="CREËER GROEPSAANKOOP">
        
        </form>
        </div>

    </div>




</body>
</html>