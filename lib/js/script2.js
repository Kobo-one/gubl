
var clicks = 2;

$( document ).ready(function(){

    

$(".extra").click(function(){
    $tussenprijs = '<div class="field tussenprijs"><div class="input_label"><label for="aantal-min">Aantal</label><input id="aantal-min" name="aantal[]" type="number" min="0" step="1" max="10000" onkeypress="return event.charCode >= 48 && event.charCode <= 57" title="Numbers only" /></div><div class="input_label"><label for="price-min">Prijs</label><input id="price-min" name="price[]" type="number" min="0.01" step="0.01" /></div></div>'
    $(".field-extra").before($tussenprijs);
});

$(".extra_artikel").click(function(){
    clicks++;
    $tussenartikel = '<div class="field"> <div class="input_label"> <label for="name">Artikel naam</label> <input type="text" class="name" id="name" name="artikel[]"> </div> <div class="input_label"> <label for="price-original">Normale prijs</label> <input id="price-original" name="price-original[]" type="number" min="0.01" step="0.01" /> </div> </div> <div class="image_description img_artikel"> <div class="image"> <label for="image_upload" class="image_upload load'+clicks+'" >Kies foto&#39;s om toe te voegen</label> </div> <input type="file" name="image[]" id="image_upload" accept=".jpg, .jpeg, .png" onchange="filePreview(this);" multiple> <textarea name="description[]" id="description" class="description" rows="4" placeholder="Geef hier de omschrijving van het artikel"></textarea> </div>'
    $(".field-extra").before($tussenartikel);
});



});
function filePreview(input){



    if(input.files && input.files[0]){
       
        $(input.files).each(function (i) {
            var c = i + 1;
            var reader = new FileReader();
            reader.onload = function (e){

                if(!$(".loaded"+c).length){
                    console.log(c);
                    console.log('new');
                    $(".load"+c).css("min-width","15vh");
                    $(".load"+c).css("width","auto");
                    $(".load"+c).text("");
                    $(".load"+c).append('<img class="uploaded loaded'+c+'" src="'+e.target.result+'">');
                }
                else{
                    
                    console.log("change");
                    $('.loaded'+c).attr('src',e.target.result);
                    console.log(c);
                }
               
        }
        reader.readAsDataURL(this);
                
        });
        

        
    }


    // if(input.files && input.files[0]){

    //     $(input.files).each(function () {
    //         var number = clicks;
    //         var reader = new FileReader();
    //         reader.onload = function (e){

    //             if(!$(".uploaded").length){
    //                 $(".image_upload").css("min-width","15vh");
    //                 $(".image_upload").css("width","auto");
    //                 $(".image_upload").text("");
    //                 $(".load"+number).append('<img class="uploaded loaded'+number+'" src="'+e.target.result+'">');
    //             }
    //             else{
    //                 $('.loaded'+number).attr('src',e.target.result);
    //             }
    //             number = number -1;
    //     }
    //     reader.readAsDataURL(this);
                
    //     });
        

        
    // }
};