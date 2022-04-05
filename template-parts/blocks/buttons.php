<?php
$buttons_style = get_sub_field('buttons_style');
$buttons = get_sub_field('buttons');

$class = 'sh-contributed-buttons';
if ($buttons_style === 'dark') {
    $class = 'sh-contributed-buttons sh-contributed-buttons_dark';
}

if (!empty($buttons)): ?>
    <div class="<?php echo $class ?>">
        <?php foreach ($buttons as $button):
            $target = (!empty($button['button']['target']) &&
                $button['button']['target'] === '_blank') ? 'target="_blank"' : '';
            $class_button = 'sh-contributed-buttons__link';
            if($button['type'] === 'outline') $class_button = 'sh-contributed-buttons__link sh-contributed-buttons__link_outline';
            echo '<a class="' . $class_button . '" href="' . esc_url($button['button']['url']) . '" ' . $target . '>' . esc_html($button['button']['title']) . '</a>';
        endforeach; ?>
    </div>
<?php endif;
