$( document ).ready(function(){

    //settings open / close
    var settings = 0;
$(".button_settings").click(open);
$(".button_close").click(close);


function open(){
    $(".settings").show();
    $(".products").hide();
    settings = 1;
}

function close(){
    $(".settings").hide();
    $(".products").show();
}

$("body").click(function(){

    console.log(settings);
})

//marker info open / close

var timer;
    var data
    $(".hiddenmarkers").click(function () {
        clearTimeout(timer);
        
        if (!$(".markerinfo").length) {
            data = $(this).attr("data-title");
            $(this).after('<div class="markerinfo" >' + data + '</div>');
            timer = setTimeout(function(){ $(".markerinfo").fadeOut('fast',function(){$(this).remove()}) }, 5000);
        } else {

            if($(this).attr("data-title") == data){
                console.log("same");
                $(".markerinfo").fadeOut('fast',function(){$(this).remove()});
            }
            else{
                data = $(this).attr("data-title");
                $(".markerinfo").text(data);
                timer = setTimeout(function(){ $(".markerinfo").fadeOut('fast',function(){$(this).remove()}) }, 5000);
            }
            
        }
    })



//slider

$('.slider').bxSlider({
    auto: false,
    controls:false,
    autoControls: false,
    pager: false,
    wrapperClass: 'slider',
    infiniteLoop: false
});

});