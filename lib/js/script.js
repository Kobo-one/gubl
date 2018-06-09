$( document ).ready(function(){

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




});