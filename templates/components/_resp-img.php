<?php
$image = $template_args['field'];
$class = $template_args['class'];
$sizes = $template_args['sizes'];
$medium = $image['sizes']['medium'];
$srcset = wp_get_attachment_image_srcset( $image['ID'], 'medium' );
if(!$srcset) $srcset = $medium;
?>
<img
class="<?php echo $class; ?>"
src="<?php echo $medium; ?>"
srcset="<?php echo $srcset; ?>"
sizes="<?php echo $sizes; ?>"
alt="<?php echo $image['alt'] ?>"
loading="lazy">
