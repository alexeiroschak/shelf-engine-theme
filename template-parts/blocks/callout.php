<?php
$callout_text = get_sub_field('callout_text');
?>
<div class="sh-contributed-callout">
    <?php echo apply_filters('the_content', $callout_text) ?>
</div>
