<?php
$text = get_sub_field('text');
$signature = get_sub_field('signature');
?>
<div class="sh-contributed-quote">
    <div class="sh-contributed-quote__text">
        <?php echo wp_kses_post($text) ?>
    </div>
    <div class="sh-contributed-quote__signature">
        <?php echo esc_html($signature) ?>
    </div>
</div>
