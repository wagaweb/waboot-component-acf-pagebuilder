jQuery(document).ready(function($) {


    $('.acf-button[data-event="add-row"]').removeClass('button-primary');
    $('.acf-button[data-event="add-row"]').addClass('button-default');


    function hideSectionAdvancedFields(){
        let sectionAdvancedOptionsButton = $('.wb-section-advanced-options');
        sectionAdvancedOptionsButton.each(function(){
            let siblings = $(this).parents('.acf-fields').children();
            let targetFields = [
                siblings[1],
                siblings[2],
                siblings[3],
                siblings[4],
                siblings[5],
            ];
            for(let i = 0; i < targetFields.length; i++){
                $(targetFields[i]).hide();
            }
        });
    }
    function hideColumnAdvancedFields(){
        let columnAdvancedOptionsButton = $('.wb-column-advanced-options');
        columnAdvancedOptionsButton.each(function(){
            let siblings = $(this).parents('.acf-fields').children();
            let targetFields = [
                siblings[2],
                siblings[3],
            ];
            for(let i = 0; i < targetFields.length; i++){
                $(targetFields[i]).hide();
            }
        });
    }

    $('.acf-field-wb-col .layout').addClass('-collapsed');


    $( '.acf-field-wb-section-id' ).before( '<a class="wb-advancedoptions wb-section-advanced-options">Section Options</a>' );
    $( '.acf-field-wb-col' ).after( '<a class="wb-advancedoptions wb-column-advanced-options">Column Options</a>' );

    $(window).on('load', function () {
        hideSectionAdvancedFields();
        let sectionAdvancedOptionsButton = $('.wb-section-advanced-options');
        sectionAdvancedOptionsButton.on('click', function(){
            $(this).toggleClass('collapse');
            let siblings = $(this).parents('.acf-fields').children();
            let targetFields = [
                siblings[1],
                siblings[2],
                siblings[3],
                siblings[4],
                siblings[5],
            ];
            for(let i = 0; i < targetFields.length; i++){
                if($(targetFields[i]).is(':visible')){
                    $(targetFields[i]).hide();
                }else{
                    $(targetFields[i]).show();
                }
            }
        });
    });

    $(window).on('load', function () {
        hideColumnAdvancedFields();
        let columnAdvancedOptionsButton = $('.wb-column-advanced-options');
        columnAdvancedOptionsButton.on('click', function(){
            $(this).toggleClass('collapse');
            let siblings = $(this).parents('.acf-fields').children();
            let targetFields = [
                siblings[2],
                siblings[3],
            ];
            for(let i = 0; i < targetFields.length; i++){
                if($(targetFields[i]).is(':visible')){
                    $(targetFields[i]).hide();
                }else{
                    $(targetFields[i]).show();
                }
            }
        });
    });






    //$('.acf-field-wb-section-id').wrapAll('<div class="wb-advancedoptions" />');


});