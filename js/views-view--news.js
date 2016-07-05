jQuery(document).ready(function(){
    jQuery('.node--view--news')
    .filter(function(num,element){
        return jQuery(element).find('.btn-more').length!=0
    }).each(function(num,element){
        jQuery(element).find('.btn-more').click(function(){
            jQuery(element).find('.field_body_wrapper').toggle('slow');
            jQuery(this).addClass('hidden');
            jQuery(element).find('.btn-hide').removeClass('hidden');
        })
        jQuery(element).find('.btn-hide').click(function(){
            jQuery(element).find('.field_body_wrapper').toggle('slow');
            jQuery(this).addClass('hidden');
            jQuery(element).find('.btn-more').removeClass('hide');
        })

    })
})
