<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gubl</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/landing.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="lib/js/jquery.scrollify.js"></script>
    <script src="lib/js/script.js"></script>
</head>
<body>

    <section class="page page_home">
        <nav>

            <ul>
            <li><img src="images/GUBL_Logo.svg" alt="logo" class="nav nav_logo"></li>
            <li><a href="home.php" class="nav nav_login">LOG IN</a></li>
            </ul>

        </nav>
    

   

        <div class="page_home_quote">
        
        <H1 class="text_white">WIJ HELPEN U
        <br> een handje verder!</H1>
        
        </div>

        <div class="page_home_CTA"></div>

    </section>

    <section id="gubl" class="page page_gubl">
        <div class="page_gubl_div div_white">
        <img class="page_gubl_logo"src="images/logo_slogan.png" alt="Gubl, Group up Buy Low!">
        </div>

        <div class="text text_gubl text_white">
        <p>Gubl is een groepsverkoop website die zich specialiseert in de verkoop van noodzakelijke artikelen. Dit is gericht op de Mechelse bevolking met een leefloon. De verkochte artikels komen van lokale handelaars.</p>
        </div>    
    </section>


    <section id="what" class="page page_what">

        <div class="text text_what text_white">
        <h2 class="header page_what_header text_blue">Wat doen we?</h2>
        <p>Gubl bestaat uit twee delen, een platform voor de koper en een dashboard voor de verkoper. De verkopers krijgen de vrijheid zelf te posten wat en wanneer ze iets willen verkopen aan een verlaagde prijs. De kopers kiezen wat hun interesseert.</p>
        </div>


    </section>


    
    <section id="who" class="page page_who">

        <div class="text text_who">
            <h2 class="text_white header">Wie zijn we?</h2>
            <div class="persons">
            <div class="person person_1">
                <img class="person_img" src="images/kobe.jpg" alt="Kobe Christiaensen">
                <p class="text_white">Kobe Christiaensen</p>
            </div>

            <div class="person person_2">
                <img class="person_img" src="images/jimmy.jpg" alt="Jimmy Truyts">
                <p class="text_white">Jimmy Truyts</p>
            </div>
            </div>
            <p class="text_white">Studenten Thomas More Mechelen, wij kregen de opdracht een smart-city project uit te werken.</p>
        </div>

    </section> 
    <script>
        $(function() {
          $.scrollify({
            section : ".page",
          });
        });

        $(".page_home_CTA").on("click",function(){
            $.scrollify.next();
            console.log('hey');
            });


      </script>
</body>
</html>