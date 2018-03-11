$(document).ready(function() {
 
    if($.browser.version == '6.0' && jQuery.browser.msie){
        location.replace("ie6/ie6.html");
    } 
 
$('.aclick').click(function(){
 
 var slist = $(this).attr("id");  
  
$("#list"+slist).slideToggle(400);



});    
    
});