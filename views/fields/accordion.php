<div class="wb-accordion">

    <?php $i = 1; ?>
    <?php foreach ( $sections as $section ) : ?>

        <h3>
            <?php echo $section['wb_block_accordion_section_label'] ?>
        </h3>

        <div id="wb-accordion--<?php echo $i ?>">

            <?php echo $section['wb_block_accordion_section_text'] ?>

        </div>
        <?php $i ++ ?>

    <?php endforeach; ?>

</div>

