<?php
add_filter('waboot/component/wb_acf_pagebuilder/blocks', function($blocks){

    /* Block Title */
    $blocks[] = [
        'key' => 'field_wb_block_title',
        'label' => 'Title',
        'name' => 'wb_block_title',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_wb_title',
                'label' => 'Title',
                'name' => 'wb_title',
                'type' => 'text',
                'instructions' => '',
                'wrapper' => array (
                    'width' => '75'
                ),
            ),
            array (
                'key' => 'field_wb_title_tag',
                'label' => 'Style',
                'name' => 'wb_title_tag',
                'type' => 'select',
                'instructions' => '',
                'choices' => array(
                    'h1' => 'h1',
                    'h2' => 'h2',
                    'h3' => 'h3',
                    'h4' => 'h4',
                    'h5' => 'h5',
                    'h6' => 'h6',
                ),
                'default_value' => array(
                    'h2' => 'h2',
                ),
                'wrapper' => array (
                    'width' => '25'
                )
            )
        )
    ];
    /* End Block Title */

    /* Block Text */
    $blocks[] = [
        'key' => 'field_wb_block_text',
        'label' => 'Text',
        'name' => 'wb_block_text',
        'display' => 'block',
        'sub_fields' => array (
            array(
                'key' => 'field_wb_text',
                'label' => 'Text',
                'name' => 'wb_text',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'wrapper' => array (
                    'width' => '100'
                )
            )
        )
    ];
    /* End Block Text */

    /* Block Button */
    $blocks[] = [
        'key' => 'field_wb_block_button',
        'label' => 'Button',
        'name' => 'wb_block_button',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_wb_button_label',
                'label' => 'Label Button',
                'name' => 'wb_button_label',
                'type' => 'text',
                'required' => 1,
                'instructions' => '',
                'wrapper' => array (
                    'width' => '100'
                ),
            ),
            array(
                'key' => 'field_wb_button_link',
                'label' => 'Link Button',
                'name' => 'wb_button_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => '',
                'wrapper' => array(
                    'width' => '100'
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array (
                'key' => 'field_wb_button_classes',
                'label' => 'Classes Button',
                'name' => 'wb_button_classes',
                'type' => 'text',
                'instructions' => '',
                'wrapper' => array (
                    'width' => '50'
                ),
            ),
            array (
                'key' => 'field_wb_button_target',
                'label' => 'Target Button',
                'name' => 'wb_button_target',
                'type' => 'select',
                'instructions' => '',
                'choices' => array(
                    '_self' => 'self',
                    '_blank' => 'blank',
                ),
                'default_value' => array(
                    '_self' => 'self',
                ),
                'wrapper' => array (
                    'width' => '50'
                ),
            )
        )
    ];
    /* End Block Button */

    /* Block Image */
    $blocks[] = [
        'key' => 'field_wb_block_image',
        'label' => 'Image',
        'name' => 'wb_block_image',
        'display' => 'block',
        'sub_fields' => array (
            array (
                'key' => 'field_wb_image',
                'label' => 'Image',
                'name' => 'wb_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'return_format' => 'array',
                'preview_size' => 'thumbnail',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_wb_image_preset',
                'label' => 'Preset Image',
                'name' => 'wb_image_preset',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '50'
                ),
                'choices' => array(
                    'thumbnail' => 'Thumbnail',
                    'medium' => 'Medium',
                    'large' => 'Large',
                ),
                'allow_null' => 1,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
                'disabled' => 0,
                'readonly' => 0,
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_wb_image_link',
                'label' => 'Image Link',
                'name' => 'wb_image_link',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => '',
                'wrapper' => array(
                    'width' => '50'
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array (
                'key' => 'field_wb_image_label',
                'label' => 'Label Link',
                'name' => 'wb_imagen_label', // TODO: Fix name
                'type' => 'text',
                'required' => 0,
                'instructions' => '',
                'wrapper' => array (
                    'width' => '50'
                ),
            ),
            array (
                'key' => 'field_wb_image_target',
                'label' => 'Target Link',
                'name' => 'wb_image_target',
                'type' => 'select',
                'instructions' => '',
                'choices' => array(
                    '' => '',
                    '_self' => 'self',
                    '_blank' => 'blank',
                ),
                'default_value' => array(
                    '' => '',
                ),
                'wrapper' => array (
                    'width' => '50'
                ),
            )
        )
    ];
    /* End Block Image */

    /* Block Gallery */
    $blocks[] = [
        'key' => 'field_wb_block_gallery',
        'label' => 'Gallery',
        'name' => 'wb_block_gallery',
        'type' => 'group',
        'conditional_logic' => 0,
        'layout' => 'block',
        'button_label' => 'Add Image',
        'sub_fields' => array (
            array(
                'key' => 'field_wb_block_gallery_images',
                'label' => 'Gallery',
                'name' => 'wb_block_gallery_images',
                'type' => 'gallery',
                'instructions' => 'Inserisci una galleria di immagini',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '100',
                    'class' => '',
                    'id' => '',
                ),
                'min' => '',
                'max' => '',
                'insert' => 'append',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_wb_block_gallery_cols',
                'label' => 'Columns',
                'name' => 'wb_block_gallery_cols',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'default_value' => '1',
                'min' => '1',
                'max' => '5',
                'conditional_logic' => '',
                'wrapper' => array(
                    'width' => '33',
                    'class' => '',
                    'id' => '',
                ),
            ),
            array(
                'key' => 'field_wb_block_gallery_preset',
                'label' => 'Preset Image',
                'name' => 'wb_block_gallery_preset',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'thumbnail' => 'Thumbnail',
                    'medium' => 'Medium',
                    'large' => 'Large',
                    'full' => 'Original',
                ),
                'default_value' => array(
                    'thumbnail' => 'Thumbnail',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
                'disabled' => 0,
                'readonly' => 0,
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_wb_block_gallery_link',
                'label' => 'Link Image',
                'name' => 'wb_block_gallery_link',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'nolink' => 'No Link',
                    'media' => 'Link to media',
                ),
                'default_value' => array(
                    'nolink' => 'No Link',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
                'disabled' => 0,
                'readonly' => 0,
                'return_format' => 'value',
            )
        )
    ];
    /* End Block Gallery */

    /* Block Carousel */
    $blocks[] = [
        'key' => 'field_wb_block_carousel',
        'label' => 'Carousel',
        'name' => 'wb_block_carousel',
        'type' => 'group',
        'conditional_logic' => 0,
        'layout' => 'block',
        'button_label' => 'Add Image',
        'sub_fields' => array (
            array(
                'key' => 'field_wb_block_carousel_items',
                'label' => 'Visible Items',
                'name' => 'wb_block_carousel_items',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'default_value' => '1',
                'min' => '1',
                'max' => '5',
                'conditional_logic' => '',
                'wrapper' => array(
                    'width' => '33',
                    'class' => '',
                    'id' => '',
                ),
            ),
            array(
                'key' => 'field_wb_block_carousel_preset',
                'label' => 'Preset Image',
                'name' => 'wb_block_carousel_preset',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'thumbnail' => 'Thumbnail',
                    'medium' => 'Medium',
                    'large' => 'Large',
                    'full' => 'Original',
                ),
                'default_value' => array(
                    'thumbnail' => 'Thumbnail',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
                'disabled' => 0,
                'readonly' => 0,
                'return_format' => 'value',
            ),
            array(
                'key' => 'field_wb_block_carousel_link',
                'label' => 'Link Image',
                'name' => 'wb_block_carousel_link',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '33',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'nolink' => 'No Link',
                    'media' => 'Link to media',
                    'customlink' => 'Custom Link',
                    'customlinkwlabel' => 'Custom Link with Label',
                ),
                'default_value' => array(
                    'nolink' => 'No Link',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
                'disabled' => 0,
                'readonly' => 0,
                'return_format' => 'value',
            ),
            array (
                'key' => 'field_wb_block_carousel_images',
                'label' => 'Images',
                'name' => 'wb_block_carousel_images',
                'type' => 'repeater',
                'conditional_logic' => 0,
                'layout' => 'block',
                'button_label' => 'Add Image',
                'sub_fields' => array (
                    array (
                        'key' => 'field_wb_block_carousel_image',
                        'label' => 'Image',
                        'name' => 'wb_block_carousel_image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_wb_block_carousel_image_customlink',
                        'label' => 'Custom Link',
                        'name' => 'wb_block_carousel_image_customlink',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_wb_block_carousel_link',
                                    'operator' => '==',
                                    'value' => 'customlink',
                                )
                            ),
                            array(
                                array(
                                    'field' => 'field_wb_block_carousel_link',
                                    'operator' => '==',
                                    'value' => 'customlinkwlabel',
                                )
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                    ),
                    array (
                        'key' => 'field_wb_block_carousel_image_label',
                        'label' => 'Label Link',
                        'name' => 'wb_block_carousel_image_label',
                        'type' => 'text',
                        'instructions' => '',
                        'wrapper' => array (
                            'width' => '100'
                        ),
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_wb_block_carousel_link',
                                    'operator' => '==',
                                    'value' => 'customlinkwlabel',
                                ),
                            ),
                        ),
                    ),
                )
            )
        )
    ];
    /* End Block Carousel */

    /* Block Tabs */
    $blocks[] = [
        'key' => 'field_wb_block_tabs',
        'label' => 'Tabs',
        'name' => 'wb_block_tabs',
        'type' => 'group',
        'conditional_logic' => 0,
        'layout' => 'block',
        'button_label' => 'Add Tab',
        'sub_fields' => array (
            array(
                'key' => 'field_wb_block_tabs_style',
                'label' => 'Tabs Style',
                'name' => 'wb_block_tabs_style',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '100',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'horizontal' => 'Horizontal',
                    'vertical' => 'Vertical'
                ),
                'default_value' => array(
                    'horizontal' => 'Horizontal',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
                'disabled' => 0,
                'readonly' => 0,
                'return_format' => 'value',
            ),
            array (
                'key' => 'field_wb_block_tab',
                'label' => 'Tabs',
                'name' => 'wb_block_tab',
                'type' => 'repeater',
                'conditional_logic' => 0,
                'layout' => 'block',
                'button_label' => 'Add Tab',
                'sub_fields' => array (
                    array(
                        'key' => 'field_wb_block_tab_text',
                        'label' => 'Text',
                        'name' => 'wb_block_tab_text',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'wrapper' => array (
                            'width' => '100'
                        )
                    ),
                    array(
                        'key' => 'field_wb_block_tab_label',
                        'label' => 'Tab Label',
                        'name' => 'wb_block_tab_label',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                        'wrapper' => array (
                            'width' => '100'
                        )
                    ),
                    array (
                        'key' => 'field_wb_block_tab_image',
                        'label' => 'Image',
                        'name' => 'wb_block_tab_image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'return_format' => 'array',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                )
            )
        )
    ];
    /* End Block Tabs */

    /* Block Accordion */
    $blocks[] = [
        'key' => 'field_wb_block_accordion',
        'label' => 'Accordion',
        'name' => 'wb_block_accordion',
        'type' => 'group',
        'conditional_logic' => 0,
        'layout' => 'block',
        'button_label' => 'Add Accordion',
        'sub_fields' => array (
            array (
                'key' => 'field_wb_block_accordion_sections',
                'label' => 'Accordion Sections',
                'name' => 'wb_block_accordion_sections',
                'type' => 'repeater',
                'conditional_logic' => 0,
                'layout' => 'block',
                'button_label' => 'Add Tab',
                'sub_fields' => array (
                    array(
                        'key' => 'field_wb_block_accordion_section_text',
                        'label' => 'Section Text',
                        'name' => 'wb_block_accordion_section_text',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'wrapper' => array (
                            'width' => '100'
                        )
                    ),
                    array(
                        'key' => 'field_wb_block_accordion_section_label',
                        'label' => 'Section Label',
                        'name' => 'wb_block_accordion_section_label',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                        'wrapper' => array (
                            'width' => '100'
                        )
                    )
                )
            )
        )
    ];
    /* End Block Accordion */

    return $blocks;

});