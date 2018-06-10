$( document ).ready(function(){


$(".extra").click(function(){
$tussenprijs = '<div class="field tussenprijs"><div class="input_label"><label for="aantal-min">Aantal</label><input id="aantal-min" name="aantal[]" type="number" min="0" step="1" max="10000" onkeypress="return event.charCode >= 48 && event.charCode <= 57" title="Numbers only" /></div><div class="input_label"><label for="price-min">Prijs</label><input id="price-min" name="price[]" type="number" min="0.01" step="0.01" /></div></div>'
$(".field-extra").before($tussenprijs);
});



});
function filePreview(input){

    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function (e){

            if(!$(".uploaded").length){
                $(".image_upload").css("min-width","15vh");
                $(".image_upload").css("width","auto");
                $(".image_upload").text("");
                $(".image_upload").append('<img class="uploaded" src="'+e.target.result+'">');
            }
            else{
                $('.uploaded').attr('src',e.target.result);
            }
                
        }
        

        reader.readAsDataURL(input.files[0]);
    }
};