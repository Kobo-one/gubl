
    <div class="settings">
        <div class="settings_nav">
            <div class="button button_close"></div>
            <a href="items.php" class="reset">resetten</a>
        </div>
        
        <h1>ZOEKEN OP</h1>
        <div class="zoeken">
            <a href="<?php echo Functions::addOrUpdateUrlParam("type", 1);?>" class="optie zoek">ETEN EN DRINKEN</a>
            <a href="<?php echo Functions::addOrUpdateUrlParam("type", 2);?>" class="optie zoek">HOBBY</a>
            <a href="<?php echo Functions::addOrUpdateUrlParam("type", 3);?>" class="optie zoek">HUIS EN TUIN</a>
            <a href="<?php echo Functions::addOrUpdateUrlParam("type", 4);?>" class="optie zoek">AMUSEMENT</a>
            <a href="<?php echo Functions::addOrUpdateUrlParam("type", 5);?>" class="optie zoek">KLEDING</a>
            <a href="<?php echo Functions::addOrUpdateUrlParam("type", 6);?>" class="optie zoek">TECHNOLOGIE</a>
        </div>

        <h1>SORTEREN OP</h1>
        <div class="sorteren">
            <a href="<?php echo Functions::addOrUpdateUrlParam("sort", "new");?>" class="optie sorteer">NIEUWSTE</a>
            <a href="<?php echo Functions::addOrUpdateUrlParam("sort", "old");?>" class="optie sorteer">BIJNA VERLOPEN</a>
            <a href="<?php echo Functions::addOrUpdateUrlParam("sort", "recomended");?>" class="optie sorteer">AANBEVOLEN</av>
            <a href="<?php echo Functions::addOrUpdateUrlParam("sort", "popular");?>" class="optie sorteer">POPULAIRSTE</a>
        </div>

    </div>
    