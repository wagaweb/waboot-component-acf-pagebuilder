<div class="wb-gallery wb-gallery--cols<?php echo $cols ?>">

    <?php foreach ( $images as $image ) : ?>

        <div class="wb-gallery__item">
            <?php
            if($preset != 'full'){
                $imageUrl = $image['sizes'][$preset];
            }else{
                $imageUrl = $image['url'];
            }
            ?>

            <?php switch ($link):
                case 'nolink': ?>

                    <img src="<?php echo $imageUrl; ?>">

                    <?php break;

                case 'media': ?>

                    <a href="<?php echo $image['url']; ?>">
                        <img src="<?php echo $imageUrl; ?>">
                    </a>

                    <?php break;

            endswitch; ?>

        </div>

    <?php endforeach; ?>

</div>

