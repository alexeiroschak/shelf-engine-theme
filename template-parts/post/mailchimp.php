<?php
/**
 * Mailchimp form.
 */

$mailchimp_title = get_field('mailchimp_title', 'option');
$mailchimp_text = get_field('mailchimp_text', 'option');
$mailchimp_info = get_field('mailchimp_info', 'option');
$mailchimp_shortcode = get_field('mailchimp_form', 'option');
$mailchimp_image = get_field('mailchimp_image', 'option');
$mailchimp_bg = get_field('background_image') ? get_field('background_image') : get_template_directory_uri() . '/img/mailchimp-bg.png';

$show_block = ( isset( $args['show_form'] ) && $args['show_form'] ) || ( isset( $args['is_post'] ) && $args['is_post'] );
$wrapp = isset( $args['is_post'] ) && $args['is_post'];

if ( $show_block ) : ?>
    <?php echo ! $wrapp ? '</div>' : ''; ?> 
    <div class="sh-mailchimp <?php echo ! is_single() ? 'sh-mailchimp--blog' : ''; ?>">
        <img src="<?php echo $mailchimp_bg; ?>" class="sh-mailchimp__bg" alt="">

        <div class="container">
            <div class="sh-mailchimp__wrapper" style="background-image: url(<?php echo $mailchimp_image['url']; ?>)">
                <h2 class="sh-mailchimp__title"><?php echo esc_html( $mailchimp_title ); ?></h2>

                <div class="sh-mailchimp__text"><?php echo $mailchimp_text; ?></div>

                <div class="sh-mailchimp__form">
					<?php echo do_shortcode( $mailchimp_shortcode ); ?>
                </div>

                <div class="sh-mailchimp__info"><?php echo wp_kses_post( $mailchimp_info ); ?></div>
            </div>
        </div>
    </div>
    <?php echo ! $wrapp ? '<div class="container">' : ''; ?> 
<?php endif;
