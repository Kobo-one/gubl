<?php
session_start();
$_SESSION["user"] =1;
include_once("lib/classes/Functions.class.php");
include_once("lib/classes/Image.class.php");
include_once("lib/classes/Request.class.php");

if( !empty($_POST) ){
    if(isset($_POST['submit'])){
    //if image is chosen
        try{
        if(!empty($_POST['name']) ){
            $request = new Request();
            $request->setName($_POST['name']);
            $request->setCategory($_POST['category']);
            $request->setEndDate($_POST['date']);

                if($request->createRequest()){
                    $images;
                    foreach($_FILES['image']['name'] as $key => $r){
                       
                        $image = new Image();
                        $image->setFileName($_FILES['image']['name'][$key]);
                        $image->setFileSize($_FILES['image']['size'][$key]);
                        $image->setFileTmp($_FILES['image']['tmp_name'][$key]);
                        $image->setFileType($_FILES['image']['type'][$key]);
                        $image->setFileDir("images/products/".$_FILES['image']['name'][$key]);
                        $image->setFileExt(strtolower((explode('.',$_FILES['image']['name'][$key]))[count(explode('.',$_FILES['image']['name'][$key]))-1]));
                        //get variables to upload and save image on database
                        $fileTmp = $image->getFileTmp();
                        $fileDir = $image->getFileDir();
                        $fileName = $image->getFileName(); 
                        $fileSize = $image->getFileSize();
                        if( move_uploaded_file($fileTmp, $fileDir) ){
                            $images[$key] = $fileDir;
                            var_dump($images);
                        }
                    };

                    
                    $request->setOriginalPrice($_POST['price-original']);
                    $request->setImages( $images );
                    $request->setName($_POST['artikel']);
                    $request->setDescription($_POST['description']);

                    if($request->saveArtikels()){
                        echo "done";
                        // header("Location: dashboard.php"); 
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
    <title>GUBL - Nieuwe request</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto:300" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="lib/js/script2.js"></script>
</head>
<body>

    <?php include_once("includes/nav_dashboard.php")?>
    <div class="board">
        <div class="top_page"><img class="home" src="images/home.svg" alt="Home"><h1 class="title">NIEUWE REQUEST</h1></div>
        
        <div class="dashboard">
        <form action="" method="post" enctype="multipart/form-data" id="uploadForm">
            <section class="artikel artikel_details">
                <h1>Details</h1>    
                <p>Met deze tool start u een stemming tussen varianten van een bepaald product. Zo kan u de interesse bij de gebruikers bekijken.</p>
                <div class="field">
                    <div class="input_label">
                        <label for="name">Product</label>
                        <input type="text" class="name" id="name" name="name" placeholder="">
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
                    
                    <div class="input_label">
                        <label for="date">Kies wanneer de stemming eindigt.</label>
                        <input type="date" name="date" id="date" min="<?php echo date("Y-m-d")?>" value="<?php echo date("Y-m-d")?>">
                    </div>
                </div>
            </section>

            <section class="artikel artikel_prijs">
                <h1>Artikels</h1>  

                <div class="field">
                    <div class="input_label">
                        <label for="name">Artikel naam</label>
                        <input type="text" class="name" id="name" name="artikel[]">
                    </div>
                    <div class="input_label">
                        <label for="price-original">Normale prijs</label>
                        <input id="price-original" name="price-original[]" type="number" min="0.01" step="0.01" />
                    </div>
                </div>
                    <div class="image_description img_artikel">
                        <div class="image">
                            
                            <label for="image_upload"  class="image_upload load1" >Kies foto&#39;s om toe te voegen</label>
                        </div>
                            <input type="file" name="image[]" id="image_upload" accept=".jpg, .jpeg, .png" onchange="filePreview(this);" multiple>
                        <textarea name="description[]" id="description" class="description"  rows="4" placeholder="Geef hier de omschrijving van het artikel"></textarea>
                    </div>
                
                
                
                <div class="field">
                    <div class="input_label">
                        <label for="name">Artikel naam</label>
                        <input type="text" class="name" id="name" name="artikel[]">
                    </div>
                    <div class="input_label">
                        <label for="price-original">Normale prijs</label>
                        <input id="price-original" name="price-original[]" type="number" min="0.01" step="0.01" />
                    </div>
                </div>
                    <div class="image_description img_artikel">
                        <div class="image">
                            
                            <label for="image_upload"  class="image_upload load2" >Kies foto&#39;s om toe te voegen</label>
                        </div>
                            <input type="file" name="image[]" id="image_upload" accept=".jpg, .jpeg, .png" onchange="filePreview(this);" multiple>
                        <textarea name="description[]" id="description" class="description"  rows="4" placeholder="Geef hier de omschrijving van het artikel"></textarea>
                    </div>

                
                <div class="field field-extra"><a class="extra_artikel">Voeg nog een optie toe.</a></div>

            </section>
            
            <input class="button button_send" name="submit" type="submit" value="CREËER POLL">
        
        </form>
        </div>

    </div>




</body>
</html>