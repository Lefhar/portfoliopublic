<?php
if(!empty($pro)){
    $count = count($pro);
    $key = 1;
    foreach ($pro as $obj){
 if(!empty($obj->lien_github)){?>
let myText<?=$key;?> = "git clone <?=$obj->lien_github;?>";
            <?php }else{?>
let myText<?=$key;?> = "wget <?=$obj->lien_web;?>";
     <?php   }?>
let nbrtext<?=$key;?> = myText<?=$key;?>.length;
let myArray<?=$key;?> = myText<?=$key;?>.split("");
let timeLooper<?=$key;?>;
let i<?=$key;?> = 0;
        function loop<?=$key;?>(){
        if(myArray<?=$key;?>.length > 0){
        document.getElementById("intro<?=$key;?>").innerHTML += myArray<?=$key;?>.shift();
        i<?=$key;?>++;
        }else{
        clearTimeout(timeLooper<?=$key;?>);
        }
        timeLooper<?=$key;?> = setTimeout('loop<?=$key;?>()',10);
        if(nbrtext<?=$key;?> == i<?=$key;?>){
        clearTimeout(timeLooper<?=$key;?>);
        <?php if(!empty($obj->lien_github)){?>
            document.getElementById("intro<?=$key;?>").innerHTML = 'git clone <a href="<?=$obj->lien_github;?>" target="_blank"><?=$obj->lien_github;?></a>';
        <?php }else{?>
            document.getElementById("intro<?=$key;?>").innerHTML = 'wget <a href="<?=$obj->lien_web;?>" target="_blank"><?=$obj->lien_web;?></a>';
        <?php   }?>
       fondu("projet<?=$key;?>");
        <?php if($key+1<= $count){?>
        loop<?=$key+1;?>();
            <?php } ?>
        }
        }
  <?php 
  $key++; }
}?>
loop1();
function fondu(nomDiv)
{
var div = document.getElementById(nomDiv).style;// récupère div
var i = 0;// initialise i
var f = function()// attribut à f une fonction anonyme
{
div.opacity = i;// attribut à l'opacité du div la valeur d'i
i = i+0.02;// l'incrémente
if(i<=1)// si c'est toujours pas égal à 1
{
setTimeout(f,20);// attend 20 ms, et relance la fonction
}
};
f();// l'appel une première fois pour lancer la boucle
}
function fonduinverse(nomDiv)
{
var div = document.getElementById(nomDiv).style;// récupère div
var i = 100;// initialise i
var f = function()// attribut à f une fonction anonyme
{
div.opacity = i;// attribut à l'opacité du div la valeur d'i
i = i-0.8;// l'incrémente
if(i>=0)// si c'est toujours pas égal à 1
{
setTimeout(f,20);// attend 20 ms, et relance la fonction
}
if(i < 0){
document.getElementById(nomDiv).style.display = "none";
}
};
f();// l'appel une première fois pour lancer la boucle
}
//petit js qui permet la transition de nav en noir lorsqu'on scroll
$(window).scroll(function(){
var scroll = $(window).scrollTop();
if (scroll > 90) {
$( "nav" ).addClass( "bg-nav-dark" );
} else{
$( "nav" ).removeClass( "bg-nav-dark" );
}
})
$(window).ready(function ()
{
$('html, body').animate({
scrollTop: '0px'
},
1500);
return false;
});
$(document).on('click', 'a[href^="#"]', function (event) {
event.preventDefault();
$('html, body').animate({
scrollTop: $($.attr(this, 'href')).offset().top
}, 500);
});
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;

window.print();

document.body.innerHTML = originalContents;
}
$("#contactme").submit(function(e){
e.preventDefault(); //empêcher une action par défaut
var form_url = $(this).attr("action"); //récupérer l'URL du formulaire
var form_method = "POST"; //récupérer la méthode GET/POST du formulaire
var form_data = $(this).serialize(); //Encoder les éléments du formulaire pour la soumission
console.log(form_data);
$.ajax({
url : form_url,
type: form_method,
data : form_data
}).done(function(response){
$("#res").html(response);
});
});
$(document).ready(function(){
$("#sujet").change(function(){
var option = $(this).children("option:selected").val();
if(option =="cv"){
document.getElementById("boxmessage").style.display = "none";
}else{
document.getElementById("boxmessage").style.display = "block";
}
});
});
$('#closewindows').click(function(){
document.getElementById("console").style.display = "none";
});
$('#maximize').click(function(){
//overlay
$('#console').addClass('overlay').removeClass('console');
});
$('#minimize').click(function(){
$('#console').addClass('console').removeClass('overlay');
});