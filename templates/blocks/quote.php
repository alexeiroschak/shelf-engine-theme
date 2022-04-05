<?php 
    $className = 'quote-shortcode';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    $text = get_field('text');
    $signature = get_field('signature');
?>
<div class="<?php echo esc_attr($className); ?>">
    <h2 class="quote-heading">
        <?php echo wp_kses_post($text) ?>
    </h2>
    <p class="quote-text">
        <?php echo esc_html($signature) ?>
    </p>
</div>
