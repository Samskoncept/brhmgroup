(function($) {
"use strict"

    var imageSelect = elementor.modules.controls.BaseData.extend({

    onReady: function () {

        var self = this;

        var parentSelector = this.ui.controlTitle.parent().parent();
        var btnSelector = parentSelector.find('.image-select-btn');


        // Onclick add and remove active class
        var item = parentSelector.find('.darklup-image-select-item')

        $(item).on( 'click', function() {
            var $this = $(this);

            item.removeClass( 'darklup_block-active' );
            $this.addClass( 'darklup_block-active' );

        } )

        // Default Active
        var $defaultActive = self.ui.radio.first().parent().parent();
        $defaultActive.addClass('darklup_block-active');

        // Seved item active
        self.ui.radio.each( function( index, val ) {

            if( val.checked == true ) {
                var inputTopParent = $(val).parent().parent();

                item.removeClass( 'darklup_block-active' );

                inputTopParent.addClass('darklup_block-active');
            }

        } )

        // Buton click  show hide
        btnSelector.on( 'click', function() {

            var pop = parentSelector.find('.select-image-wrapper');
            pop.slideToggle('slow');

        } )


    },

});

elementor.addControlView('image-select', imageSelect );


})(jQuery)