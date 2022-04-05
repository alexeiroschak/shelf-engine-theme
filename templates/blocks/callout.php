
<?php 
$className = 'callout-box';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
$callout_text = get_field('callout_text');
?>
<div class="<?php echo esc_attr($className); ?>">
    <?php echo apply_filters('the_content', $callout_text) ?>
</div>
