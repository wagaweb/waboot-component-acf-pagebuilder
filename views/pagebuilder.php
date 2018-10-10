<?php
if(isset($pageBuilderPostId)){
    global $post;
    if($post instanceof \WP_Post && $post->ID !== $pageBuilderPostId){
	    $oldGlobalPost = $post;
	    $post = get_post($pageBuilderPostId);
	    setup_postdata($pageBuilderPostId);
	    $mustResetPostDataFlag = true;
    }
}
if( function_exists('get_field') && have_rows('wb_sections') ):

    while ( have_rows('wb_sections') ) : the_row();

        $sectionWidth = get_sub_field('wb_container');
        if($sectionWidth){
            $sectionWidth = 'wbcontainer';
        }else{
            $sectionWidth = 'wbcontainer-fluid';
        };

        $sectionId = get_sub_field('wb_section_id');
        $sectionTitle = get_sub_field('wb_section_title');
        $sectionBgColor = get_sub_field('wb_section_bgcolor');
        $sectionBgImage = get_sub_field('wb_section_bgimage');
        $sectionBgParallax = get_sub_field('wb_section_bgparallax');
        $sectionColoumns = get_sub_field('wb_cols');

        $sectionCssProperty = '';
        if($sectionBgColor != '' || $sectionBgImage != ''  ) { $sectionCssProperty = $sectionCssProperty . 'style="'; };

        if($sectionBgColor != ''){ $sectionCssProperty = $sectionCssProperty . 'background-color:'.$sectionBgColor.'; '; };
            if($sectionBgImage != ''){ $sectionCssProperty = $sectionCssProperty . 'background-image:url(\''.$sectionBgImage.'\');'; };


        if($sectionBgColor != '' || $sectionBgImage != '' ) { $sectionCssProperty = $sectionCssProperty . '"'; };
        ?>

        <section class="wbpagebuilder__section <?php if($sectionId != ''){ echo $sectionId; } ?><?php if($sectionBgParallax && !wb_is_mobile()){ echo ' parallax-wrap'; } ?>" <?php if($sectionCssProperty != ''){ echo $sectionCssProperty; } ?><?php if($sectionBgParallax && !wb_is_mobile()){ echo ' data-speed="1"'; } ?>>

        <div class="<?php echo $sectionWidth; ?>">


        <?php if($sectionTitle != '') : ?>
            <h2><?php echo $sectionTitle; ?></h2>
        <?php endif; ?>

        <?php
        if( have_rows('wb_rows') ):

            while ( have_rows('wb_rows') ) : the_row(); ?>

            <div class="wbrow">

            <?php
            if( have_rows('wb_cols') ):

                while ( have_rows('wb_cols') ) : the_row();

                    $colWidth = get_sub_field('wb_col_width');
                    $colWidthMobile = get_sub_field('wb_col_width_mobile');
                    ?>

                    <div class="wbcol<?php if($colWidth != ''){ echo ' wbcol-'.$colWidth; } ?><?php if($colWidthMobile != ''){ echo ' wbcol-'.$colWidthMobile.'-mobile'; } ?>">

                        <?php
                        if( have_rows('wb_col') ):

                            while ( have_rows('wb_col') ) : the_row(); ?>

                                <?php $layout = get_row_layout(); ?>

                                <div class="wb_block <?php echo $layout; ?>">

                                    <?php
                                    /**
                                     * @exemple
                                     * add_action('waboot/component/wb_acf_pagebuilder/layouts/render', function($layout){
                                     *  if($layout == 'wb_block_CUSTOM') { ... };
                                     * })
                                     */
                                    do_action('waboot/component/wb_acf_pagebuilder/layouts/render', $layout);
                                    ?>

                                    <?php switch ($layout) :

                                        case 'wb_block_title':
                                            $view_args = [
                                                'title' => get_sub_field('wb_title'),
                                                'tag' => get_sub_field('wb_title_tag'),
                                            ];
                                            $v = new \WBF\components\mvc\HTMLView(get_stylesheet_directory().'/components/wb_acf_pagebuilder/views/fields/title.php',null,false);
                                            $v->display($view_args);

                                            break;

                                        case 'wb_block_text':
                                            $view_args = [
                                                'text' => get_sub_field('wb_text'),
                                            ];
                                            $v = new \WBF\components\mvc\HTMLView(get_stylesheet_directory().'/components/wb_acf_pagebuilder/views/fields/text.php',null,false);
                                            $v->display($view_args);

                                            break;

                                        case 'wb_block_button':
                                            $view_args = [
                                                'label' => get_sub_field('wb_button_label'),
                                                'link' => get_sub_field('wb_button_link'),
                                                'classes' => get_sub_field('wb_button_classes'),
                                                'target' => get_sub_field('wb_button_target'),
                                            ];
                                            $v = new \WBF\components\mvc\HTMLView(get_stylesheet_directory().'/components/wb_acf_pagebuilder/views/fields/button.php',null,false);
                                            $v->display($view_args);

                                            break;

                                        case 'wb_block_image':

                                            // display product
                                            $view_args = [
                                                'image' => get_sub_field('wb_image'),
                                                'preset' => get_sub_field('wb_image_preset'),
                                                'link' => get_sub_field('wb_image_link'),
                                                'label' => get_sub_field('wb_imagen_label'),
                                                'target' => get_sub_field('wb_image_target')
                                            ];
                                            $v = new \WBF\components\mvc\HTMLView(get_stylesheet_directory().'/components/wb_acf_pagebuilder/views/fields/image.php',null,false);
                                            $v->display($view_args);

                                            break;

                                        case 'wb_block_gallery':

                                            // display product
                                            $view_args = [
                                                'images' => get_sub_field('wb_block_gallery_images'),
                                                'cols' => get_sub_field('wb_block_gallery_cols'),
                                                'preset' => get_sub_field('wb_block_gallery_preset'),
                                                'link' => get_sub_field('wb_block_gallery_link'),
                                            ];

                                            $v = new \WBF\components\mvc\HTMLView(get_stylesheet_directory().'/components/wb_acf_pagebuilder/views/fields/gallery.php',null,false);
                                            $v->display($view_args);

                                            break;

                                        case 'wb_block_carousel':

                                            // display product
                                            $view_args = [
                                                'cols' => get_sub_field('wb_block_carousel_cols'),
                                                'items' => get_sub_field('wb_block_carousel_items'),
                                                'preset' => get_sub_field('wb_block_carousel_preset'),
                                                'link' => get_sub_field('wb_block_carousel_link'),
                                                'images' => get_sub_field('wb_block_carousel_images'),
                                            ];

                                            $v = new \WBF\components\mvc\HTMLView(get_stylesheet_directory().'/components/wb_acf_pagebuilder/views/fields/carousel.php',null,false);
                                            $v->display($view_args);

                                            break;

                                        case 'wb_block_tabs':

                                            // display product
                                            $view_args = [
                                                'style' => get_sub_field('wb_block_tabs_style'),
                                                'tabs' => get_sub_field('wb_block_tab'),
                                            ];

                                            $v = new \WBF\components\mvc\HTMLView(get_stylesheet_directory().'/components/wb_acf_pagebuilder/views/fields/tabs.php',null,false);
                                            $v->display($view_args);

                                            break;

                                        case 'wb_block_accordion':

                                            // display product
                                            $view_args = [
                                                'sections' => get_sub_field('wb_block_accordion_sections'),
                                            ];

                                            $v = new \WBF\components\mvc\HTMLView(get_stylesheet_directory().'/components/wb_acf_pagebuilder/views/fields/accordion.php',null,false);
                                            $v->display($view_args);

                                            break;

                                    endswitch;
                                    ?>

                                </div>

                            <?php endwhile;

                        endif;
                        ?>


                    </div>

                <?php endwhile;

            endif;
            ?>

            </div>

            <?php endwhile;

        endif; ?>

        </div>



        </section>

    <?php endwhile;

endif;
if(isset($pageBuilderPostId)){
    if(isset($mustResetPostDataFlag) && $mustResetPostDataFlag){
	    $post = $oldGlobalPost;
	    wp_reset_postdata();
    }
}