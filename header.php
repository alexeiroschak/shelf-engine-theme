<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-name
 */
$logo = get_field('logo', 'options');
$header_class = is_front_page() || is_archive('resources') || is_page_template('template-faq.php') ? 'green' : ''; // green
?>
<!doctype html>
<html <?php language_attributes(); ?> class="is-observer">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preload" href="https://use.typekit.net/jxt4qnf.css" as="style">
    <link rel="preload" href="<?php echo get_template_directory_uri() ?>/css/style.min.css" as="style">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com/">
    <link rel="preconnect" href="https://f.vimeocdn.com">

    <link rel="stylesheet" href="https://use.typekit.net/jxt4qnf.css">

    <script>
        // Picture element HTML5 shiv
        document.createElement('picture');
    </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-57V5RTG');</script>
    <!-- End Google Tag Manager -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--<script src="https://boards.greenhouse.io/embed/job_board/js?for=shelfengine"></script>-->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-57V5RTG"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->
<header class="page-header <?php echo $header_class; ?>">
    <div class="page-header__inner">
        <a class="page-header__logo" title="Shelf Engine logo" href="<?php echo home_url( '/' ) ?>">
            <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
        </a>
        <div class="page-header__nav--wrapper">
            <nav class="page-header__nav">
                <?php wp_nav_menu( array(
                    'theme_location' => 'header-menu',
                    'container'      => '',
                    'menu_class'     => 'page-header__menu page-header__menu--desktop',
                    'depth' => 4,
                    'fallback_cb' => '__return_empty_string',
                    'walker' => new Shelf_Walker_Nav_Menu
                ) ); ?>
                <?php wp_nav_menu( array(
                    'menu' => 'Mobile Menu',
                    'container'      => '',
                    'menu_class'     => 'page-header__menu page-header__menu--mobile',
                    'depth' => 4,
                    'fallback_cb' => '__return_empty_string',
                    'walker' => new Shelf_Walker_Nav_Menu
                ) ); ?>
                <ul class="page-header__btns">
                    <li>
                        <a class="btn btn--secondary" href="https://app.shelfengine.com/guest/login" target="_blank">Sign In</a>
                    </li>
                    <li>
                        <a class="btn js-show-demo" href="#"><?php the_field('form_cta', 'options'); ?></a>
                        <!-- <a id="typeform-shelf" class="typeform-share btn" href="https://form.typeform.com/to/zcsViRF5" data-mode="popup" style="text-align: center" target="_blank">Free Demo</a>  -->
                    </li>

                    <!-- <script>
                        (function() {
                            var qs,js,q,s,d=document,
                                gi=d.getElementById,
                                ce=d.createElement,
                                gt=d.getElementsByTagName,
                                id="typef_orm_share",
                                b="https://embed.typeform.com/";
                            if( ! gi.call(d,id) ){
                                js=ce.call(d,"script");
                                js.id=id; js.src=b+"embed.js";
                                q=gt.call(d,"script")[0];
                                q.parentNode.insertBefore(js,q)
                            }
                        })()
                    </script> -->
                    <!-- <li><button class="btn js-popup">Free Demo</button></li> -->
                </ul>
            </nav>
        </div>
		<button class="hamburger"><span></span></button>
	</div>
</header>
<main>
