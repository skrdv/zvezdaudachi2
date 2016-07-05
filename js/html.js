jQuery(document).ready(function(){
    /*Мобильное меню*/
    // jQuery('.navbar-toggle').click(toggleMenu);
    jQuery('#mobile-menu-hide-btn').click(toggleMenu);

    /*Слайдер в шапке*/
    jQuery("#zvezda-slider").simplyScroll({
        pauseOnHover: false,
        auto:true
    });

    /*Меню школьники*/
    jQuery('#block-menu-menu-school-menu>ul>li').filter(function(){
        return jQuery(this).find('.submenu').length>0
    }).each(function(num,element){
        jQuery(element)
            .children('a')
            .attr('href','#')
            .click(function(){
                return false;
            })
    })

        /*Меню студенты*/
    jQuery('#block-menu-menu-student-menu>ul>li').filter(function(){
        return jQuery(this).find('.submenu').length>0
    }).each(function(num,element){
        jQuery(element)
            .children('a')
            .attr('href','#')
            .click(function(){
                return false;
            })
    })


})

function toggleMenu(){
    jQuery('#block-menu-menu-school-menu').toggle('slow');
    jQuery('#block-menu-menu-student-menu').toggle('slow');
    jQuery('#mobile-menu-hide-btn').toggle();
}
