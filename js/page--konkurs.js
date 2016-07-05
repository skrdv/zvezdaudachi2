jQuery(document).ready(function(){
    if(jQuery(window).width()<980){
        jQuery('#konkurs-nominaciya-toggle-button').click(function(){
            jQuery('#konkurs-nominaciya-toggle').css({height:'auto'});
            jQuery(this).hide();
        })
    }
})