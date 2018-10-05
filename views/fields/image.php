<?php if($preset) {
    $imageUrl = $image['sizes'][$preset];
}else{
    $imageUrl = $image['url'];
}
?>

<?php if($link != '' && $label != '' ) : ?>

    <a class="imagelink__label" href="<?php echo $link; ?>" <?php if($target != ''){ echo 'target="'. $target .'"'; }?>>
        <?php echo $label; ?>
    </a>

    <?php if($image['caption']) : ?>
        <figure>
            <img src="<?php echo $imageUrl ?>">
            <figcaption><?php echo $image['caption'] ?></figcaption>
        </figure>
    <?php else :  ?>
        <img src="<?php echo $imageUrl ?>">
    <?php endif; ?>


<?php elseif($link != '' && $label === '' ) : ?>

    <a href="<?php echo $link; ?>" <?php if($target != ''){ echo 'target="'. $target .'"'; }?>>

        <?php if($image['caption']) : ?>
            <figure>
                <img src="<?php echo $imageUrl ?>">
                <figcaption><?php echo $image['caption'] ?></figcaption>
            </figure>
        <?php else :  ?>
            <img src="<?php echo $imageUrl ?>">
        <?php endif; ?>

    </a>

<?php else : ?>

    <?php if($image['caption']) : ?>
        <figure>
            <img src="<?php echo $imageUrl ?>">
            <figcaption><?php echo $image['caption'] ?></figcaption>
        </figure>
    <?php else :  ?>
        <img src="<?php echo $imageUrl ?>">
    <?php endif; ?>

<?php endif; ?>