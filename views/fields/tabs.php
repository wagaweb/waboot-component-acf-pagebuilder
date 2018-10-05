<div class="wb-tabs wb-tabs--<?php echo $style ?>">

    <ul class="wb-tabs__list">
    <?php $i = 1; ?>
    <?php foreach ( $tabs as $tab ) : ?>
        <li><a href="#wb-tab--<?php echo $i ?>"><?php echo $tab['wb_block_tab_label'] ?></a></li>
        <?php $i ++ ?>
    <?php endforeach; ?>
    </ul>

    <div class="wb-tabs__wrapper">

        <?php $i = 1; ?>
        <?php foreach ( $tabs as $tab ) : ?>

            <div id="wb-tab--<?php echo $i ?>">

                <div class="wb-tab__inner">

                    <div class="wb-tab__text">
                        <?php echo $tab['wb_block_tab_text'] ?>
                    </div>

                    <div class="wb-tab__img">
                        <img src="<?php echo $tab['wb_block_tab_image']['url'] ?>">
                    </div>

                </div>

            </div>
            <?php $i ++ ?>

        <?php endforeach; ?>

    </div>

</div>

