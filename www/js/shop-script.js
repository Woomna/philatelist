$(document).ready(function()
{
   loadcart();       
$('.add-cart-style-grid').click(function(){
var tid=$(this).attr("tid");

$.ajax(
        {
 type:"POST",
 url:'/include/addtocart.php',
 datatype:'html',
 data:'id='+tid,
 cashe:false,
 success: function(data){
loadcart();
 }
  
            
        }       
            
            
            
            );



});
$('.buttonbuy').click(function(){
var kid=$(this).attr("kid");
$.ajax(
        {
 type:"POST",
 url:'/include/addtocart.php',
 datatype:'html',
 data:'id='+kid,
 cashe:false,
 success: function(data){
   loadcart();
 }
  
            
        }       
            
            
            
            );



});
function loadcart()
{
 $.ajax({
 type:"POST",
 url:"/include/loadcart.php",
 datatype:"HTML",
 cashe:false,
 success: function(data){
if(data==="0")
{
    $("#block-basket > p > a").html("Корзина пуста!");
}
else
{
   $("#block-basket > p > a").html(data);  
   
}
 }    
     
     
 });   
    
}
$('.zakaz1').click(function(e){
  alert(2);   
var FIO=$("FIO").val();
var mail=$("mail").val();
var phone=$("phone").val();
var adress=$("adress").val();
var note=$("note").val();
if(!$(".sel_opl").is(":cheked"))
{
  $(".label_cash").css("color","red");
  send_sel_opl='0';
    
    
}
else
{
    $(".label_cash").css("color","black");
  send_sel_opl='1';
}

if(!$(".sel_dost").is(":cheked"))
{
  $(".label_dostavka").css("color","red");
  send_sel_dost='0';
    
    
}
else
{
    $(".label_dostavka").css("color","black");
  send_sel_dost='1';
}
if(isvalidemail(mail)===false)
{
  $("#mail").css("bordercolor","red");
  send_mail='0';
    
    
}
else
{
    $("#mail").css("bordercolor","black");
  send_mail='1';
}
if(FIO===""||FIO.length>50)
{
  $("#FIO").css("bordercolor","red");
  send_FIO='0';
    
    
}
else
{
    $("#FIO").css("bordercolor","black");
  send_FIO='1';
}
if(phone===""||phone.length>50)
{
  $("#phone").css("bordercolor","red");
  send_phone='0';
    
    
}
else
{
    $("#phone").css("bordercolor","black");
  send_phone='1';
}
if(adress===""||adress.length>50)
{
  $("#adress").css("bordercolor","red");
  send_adress='0';
    
    
}
else
{
    $("#adress").css("bordercolor","black");
  send_adress='1';
}
if(send_adress==='1'&&send_phone==='1'&& send_FIO==='1'&&send_mail==='1'&&send_sel_dost==='1'&&send_sel_opl==='1')
{alert(3); return true;};
 alert(1); 
e.preventdefault();
return false;
});
function isvalidemail(mail)
{
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim(mail))){ return false; };
  return true;
}
} 
        );


