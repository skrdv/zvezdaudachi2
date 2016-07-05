
(function ($) {
    Drupal.behaviors.editFieldFinalist = {
        attach : function(context, settings) {
            $('#konkurs-pjatyj-etap-node-form #edit-field-finalist-und-0-value').focus(function(){
                $(this).val('');
            })
        }
    };
})(jQuery);
