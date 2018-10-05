<div class="wb-carousel owl-carousel" data-carousel-items="<?php echo $items ?>">

    <?php foreach ( $images as $image ) : ?>

        <div class="wb-carousel__item">
            <?php
            if($preset != 'full'){
                $imageUrl = $image['wb_block_carousel_image']['sizes'][$preset];
            }else{
                $imageUrl = $image['wb_block_carousel_image']['url'];
            }
            ?>

            <?php switch ($link):
                case 'nolink': ?>

                    <img src="<?php echo $imageUrl; ?>">

                    <?php break;

                case 'media': ?>

                    <a href="<?php echo $image['wb_block_carousel_image']['url']; ?>">
                        <img src="<?php echo $imageUrl; ?>">
                    </a>

                    <?php break;

                case 'customlink': ?>

                    <a href="<?php echo $image['wb_block_carousel_image_customlink']; ?>">
                        <img src="<?php echo $imageUrl; ?>">
                    </a>

                    <?php break;

                case 'customlinkwlabel': ?>

                    <a class="imagelink__label" href="<?php echo $image['wb_block_carousel_image_customlink']; ?>">
                        <?php echo $image['wb_block_carousel_image_label']; ?>
                    </a>
                    <img src="<?php echo $imageUrl; ?>">

                    <?php break;

            endswitch; ?>

        </div>

    <?php endforeach; ?>

</div>