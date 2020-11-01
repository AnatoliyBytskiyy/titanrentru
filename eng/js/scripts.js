$(function(){

$( ".serv" ).append( "<img class='speedometer' src='img/speedom.png' /><img class='arrow' src='img/arrow.png' />" );
$( ".type_box1" ).append( "<img src='img/car1.png' id='car1' /><img src='img/star1.png' class='stars' />" );
$( ".type_box2" ).append( "<img src='img/car2.png' id='car2' /><img src='img/star2.png' class='stars' />" );
$( ".type_box3" ).append( "<img src='img/car3.png' id='car3' /><img src='img/star3.png' class='stars' />" );
$( "h1" ).append( "<img src='img/h1.png' id='shadow' />" );



$("a.serv").mouseover(function(){
if (!$.browser.msie){ 
$(this).children("img.arrow").rotate({animateTo:100, duration:1000});
}
 });
 
 $("a.serv").mouseout(function(){
if (!$.browser.msie){ 
$(this).children("img.arrow").rotate({animateTo:0, duration:400});
}
 });
 
 


 

})


