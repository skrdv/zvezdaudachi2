jQuery.fn.myColorbox=function(obj){
    if(obj==undefined){
        obj={}
    }
    var objDefaultXsSm={
        maxWidth:'95%',
        maxHeight:'95%',
        retinaImage:true,
        current:"работа {current} из {total}",
        onOpen:function(){
            var _self=this;
            jQuery(window).swipe({
                swipeLeft: function() {
                    jQuery(_self).colorbox.next();
                },
                swipeRight: function() {
                    jQuery(_self).colorbox.next();
                }
            });
        },
        onClosed:function(){
            jQuery(window).swipe("destroy");
        }
    }

    var objDefaultMdLg={
        maxWidth:'80%',
        maxHeight:'80%',
        retinaImage:true,
        current:"работа {current} из {total}"
    }




    if(jQuery(window).width()<992){
        obj=jQuery.extend(obj,objDefaultXsSm)
    }else{
        obj=jQuery.extend(obj,objDefaultMdLg)
    }

    this.colorbox(obj);
}



