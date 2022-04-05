<?php
$style = get_sub_field('style');
$links = get_sub_field('links');

$class = 'sh-contributed-links';
if ($style === 'dark') {
    $class = 'sh-contributed-links sh-contributed-links_dark';
}

if (!empty($links)): ?>
    <div class="<?php echo $class ?>">
        <?php foreach ($links as $link):
            $target = (!empty($link['link']['target']) &&
                $link['link']['target'] === '_blank') ? 'target="_blank"' : '';
            echo '<a href="' . esc_url($link['link']['url']) . '" ' . $target . '>' . esc_html($link['link']['title']) . '</a>';
        endforeach; ?>
    </div>
<?php endif;
