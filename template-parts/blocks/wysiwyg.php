<?php
$wysiwyg_block = get_sub_field('wysiwyg_block');

echo apply_filters('the_content', $wysiwyg_block)
?>
