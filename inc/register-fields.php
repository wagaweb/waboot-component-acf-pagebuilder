<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array (
        'key' => 'group_wb_acf_pagebuilder',
        'title' => 'Waboot Pagebuilder',
        'fields' => array (
            array (
                'key' => 'field_wb_sections',
                'label' => 'Sections',
                'name' => 'wb_sections',
                'type' => 'repeater',
                'collapsed' => 'field_wb_section_id',
                'conditional_logic' => 0,
                'min' => 0,
                'max' => 0,
                'layout' => 'block',
                'button_label' => 'Add Section',
                'sub_fields' => array (
                    array (
                        'key' => 'field_wb_section_id',
                        'label' => 'Section Classes',
                        'name' => 'wb_section_id',
                        'type' => 'text',
                        'instructions' => '',
                        'wrapper' => array (
                            'width' => '50'
                        ),
                        'conditional_logic' => '',
                    ),
                    array (
                        'key' => 'field_wb_container',
                        'label' => 'Container',
                        'name' => 'wb_container',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'wrapper' => array (
                            'width' => '50'
                        ),
                        'default_value' => 1,
                        'ui' => 1,
                        'ui_on_text' => 'boxed',
                        'ui_off_text' => 'full-screen',
                    ),
                    /*
                    array (
                        'key' => 'field_section_advancedoptions',
                        'label' => 'Section Option',
                        'name' => 'section_advancedoptions',
                        'type' => 'true_false',
                        'instructions' => 'Show advanced options',
                        'required' => 0,
                        'wrapper' => array (
                            'width' => '33'
                        ),
                        'default_value' => '',
                        'ui' => 1,
                        'ui_on_text' => 'show',
                        'ui_off_text' => '',
                    ),
                    */
                    array(
                        'key' => 'field_wb_section_bgcolor',
                        'label' => 'Background Color',
                        'name' => 'wb_section_bgcolor',
                        'type' => 'color_picker',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => '',
                        'wrapper' => array(
                            'width' => '33'
                        ),
                        'default_value' => '',
                    ),
                    array(
                        'key' => 'field_wb_section_bgimage',
                        'label' => 'Background Image',
                        'name' => 'wb_section_bgimage',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => '',
                        'wrapper' => array(
                            'width' => '33'
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => 'jpg, png, gif',
                    ),
                    array (
                        'key' => 'field_wb_section_bgparallax',
                        'label' => 'Background Parallax',
                        'name' => 'wb_section_bgparallax',
                        'type' => 'true_false',
                        'required' => 0,
                        'conditional_logic' => '',
                        'wrapper' => array (
                            'width' => '33'
                        ),
                        'default_value' => '',
                        'ui' => 1,
                        'ui_on_text' => 'enable',
                        'ui_off_text' => 'disable',
                    ),
                    array (
                        'key' => 'field_wb_rows',
                        'label' => 'Rows',
                        'name' => 'wb_rows',
                        'type' => 'repeater',
                        'conditional_logic' => 0,
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'block',
                        'button_label' => 'Add Row',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_wb_cols',
                                'label' => 'Columns',
                                'name' => 'wb_cols',
                                'type' => 'repeater',
                                'conditional_logic' => 0,
                                'min' => 0,
                                'max' => 0,
                                'layout' => 'block',
                                'button_label' => 'Add Column',
                                'sub_fields' => array (
                                    array (
                                        'key' => 'field_wb_col',
                                        'label' => 'Column',
                                        'name' => 'wb_col',
                                        'type' => 'flexible_content',
                                        'instructions' => '',
                                        'button_label' => 'Add Block',
                                        'layouts' => wb_acf_pagebuilder_get_blocks()
                                    ),
                                    /*
                                    array (
                                        'key' => 'field_wb_col_advancedoptions',
                                        'label' => 'Column Option',
                                        'name' => 'wb_col_advancedoptions',
                                        'type' => 'true_false',
                                        'instructions' => '',
                                        'required' => 0,
                                        'wrapper' => array (
                                            'width' => '100'
                                        ),
                                        'default_value' => '',
                                        'ui' => 1,
                                        'ui_on_text' => 'show',
                                        'ui_off_text' => '',
                                    ),
                                    */
                                    array (
                                        'key' => 'field_wb_col_width',
                                        'label' => 'Force Column Width',
                                        'name' => 'wb_col_width',
                                        'type' => 'select',
                                        'instructions' => 'Choose to force width of column',
                                        'required' => 0,
                                        'wrapper' => array (
                                            'width' => '50'
                                        ),
                                        'choices' => array(
                                            '' => '',
                                            '25' => '1/4',
                                            '33' => '1/3',
                                            '50' => '1/2',
                                            '66' => '2/3'
                                        ),
                                        'default_value' => '',
                                        'conditional_logic' => '',
                                    ),
                                    array (
                                        'key' => 'field_wb_col_width_mobile',
                                        'label' => 'Force Column Width on Mobile',
                                        'name' => 'wb_col_width_mobile',
                                        'type' => 'select',
                                        'instructions' => 'Choose to force width of column on mobile (down 767px)',
                                        'required' => 0,
                                        'wrapper' => array (
                                            'width' => '50'
                                        ),
                                        'choices' => array(
                                            '' => '',
                                            '50' => '1/2',
                                        ),
                                        'default_value' => '',
                                        'conditional_logic' => '',
                                    ),
                                ),
                            ),
                            /*
                            array (
                                'key' => 'field_wb_row_masonry',
                                'label' => 'Masonry',
                                'name' => 'wb_row_masonry',
                                'type' => 'true_false',
                                'instructions' => 'Enable jQuery Masonry Effect',
                                'required' => 0,
                                'wrapper' => array (
                                    'width' => '100'
                                ),
                                'default_value' => '',
                                'ui' => 1,
                                'ui_on_text' => 'enable',
                                'ui_off_text' => 'disable',
                                'conditional_logic' => '',
                            ),
                            */
                        ),
                    ),
                ),
            ),

        ),
        'location' => $fieldsLocations,
        'menu_order' => 0,
        'position' => 'acf_after_title',
    ));

endif;


/**
 * @return array
 * @exemple
 * add_filter('waboot/component/wb_acf_pagebuilder/layouts', function($blocks){
 *  $blocks[] = [
 *   'key' => ...
 *  ];
 *  return $blocks;
 * })
 */
function wb_acf_pagebuilder_get_blocks(){
    return apply_filters('waboot/component/wb_acf_pagebuilder/blocks', []);
}