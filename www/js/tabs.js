$(document).ready(function(){
   $(document).on('click', '.tabs-item', function(){
       var tabLink=$(this);
       var tabName=tabLink.data('tabLink');
       var tabContent=$(document).find('[data-tab-name='+tabName+']');
       if(!tabContent.hasClass('active')){
           $(document).find('.tab-content.active').removeClass('active');
           $(document).find('.tabs-item.active').removeClass('active');
           tabContent.addClass('active');
           tabLink.addClass('active');
       }
   }) ;
   $(document).on('click', '.create-item', function(){
       $(this).toggleClass('opened');
       $(this).siblings('.create-form').toggleClass('visible');
   })
});