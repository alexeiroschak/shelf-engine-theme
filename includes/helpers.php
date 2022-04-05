<?php
/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the template as $template_args array
 * @param string filepart
 * @param mixed wp_args style argument list
 */
function _get_template_part($file, $template_args = array())
{
    $template_args = wp_parse_args($template_args);
    $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require $file;
    echo ob_get_clean();
}


/**
 * New location for ACF fields group
 */
function shelfengine_acf_location_rules_types($choices)
{
    $choices['Menu']['menu_level'] = 'Menu Depth';
    return $choices;
}

add_filter('acf/location/rule_types', 'shelfengine_acf_location_rules_types');


/**
 * Choises for the new ACF fields location
 */
function shelfengine_acf_location_rule_values_level($choices)
{
    $choices[0] = '0';
    $choices[1] = '1';
    $choices[2] = '2';

    return $choices;
}

add_filter('acf/location/rule_values/menu_level', 'shelfengine_acf_location_rule_values_level');


/**
 * Rules for the new ACF fields location
 */
function shelfengine_acf_location_rule_match_level($match, $rule, $options, $field_group)
{
    $current_screen = get_current_screen();
    if (isset($current_screen->base) && $current_screen->base == 'nav-menus') {
        if ($rule['operator'] == "==") {
            $match = (isset($options['nav_menu_item_depth']) && $options['nav_menu_item_depth'] == $rule['value']);
        }
    }
    return $match;
}

add_filter('acf/location/rule_match/menu_level', 'shelfengine_acf_location_rule_match_level', 10, 4);


/**
 * Custom menu class
 */
function shelfengine_nav_menu_css_class($classes, $item, $args, $depth)
{
    if ($depth == 0) {
        $menu_type = get_field('menu_type', $item);
        if (!empty($menu_type)) {
            $classes[] = 'type-' . $menu_type;
        }
    }

    if ($depth == 1) {
        $style = get_field('style', $item);
        if (!empty($style)) {
            $classes[] = 'style-' . $style;
        }
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'shelfengine_nav_menu_css_class', 10, 4);


function shelfengine_resource_get_type($post_id)
{
    $type = get_field('type', $post_id);
    $values = array(
        'case-study' => 'Case study',
        'white-paper' => 'White paper',
        'playbook' => 'Playbook',
        'webinar' => 'Webinar',
        'video' => 'Video'
    );

    return !empty($type) && isset($values[$type]) ? $values[$type] : '';
}


function shelfengine_walker_nav_menu_start_el($item_output, $item, $depth, $args)
{
    // $style = get_field('menu_type', $item);
    if ($depth == 0 && in_array('menu-item-has-children', $item->classes) /*&& $style == 'mega-menu'*/) {
        /*$media_items = get_field('media_items', $item);
        // media_items
        $item_output = $item_output . '<div class="aw-header__menu-submenu">';
        //$item_output = $item_output . '<img class="aw-header__menu-submenu-bg" src="' . get_stylesheet_directory_uri() . '/assets/img/menu-bg.svg" alt="">';
        $item_output = $item_output . '<div class="aw-container">';

        if ( ! empty( $media_items ) ) {
            $html = '<div class="aw-menu-media-items">';
            foreach ($media_items as $item) {
                $link_title = ! empty( $item['link'] ) ? $item['link']['title'] : '';
                $html .= '<div class="aw-menu-media-item">';
                $html .= '<img src="' . $item['image']['url'] . '" alt="' . $link_title . '">';
                $html .= '<div class="aw-menu-media-item_wrap">';
                    $html .= '<span>' . $item['title'] . '</span>';
                    if ( ! empty( $item['link'] ) ) {
                        $html .= '<a href="' . $item['link']['url'] . '">' . $link_title . '</a>';
                    }
                $html .= '</div>';
                $html .= '</div>';
            }

            $html .= '</div>';
            $item_output = $item_output . $html;
        }*/
        $item_output = $item_output . '<div class="sheld-header__menu-submenu"><div class="sheld-header__menu-submenu-items">';
    }

    if ($depth == 1) {
        $text = get_field('text', $item);
        $style = get_field('style', $item);
        $resource = get_field('resource', $item);

        if (!empty($text)) {
            $item_output = $item_output . '<p>' . $text . '</p>';
        }

        if ($style == 'resources' && !empty($resource)) {
            $img = has_post_thumbnail($resource->ID) ? '<img src="' . get_the_post_thumbnail_url($resource->ID) . '" alt="' . $resource->post_title . '">' : '';
            $resource_html = '<a href="' . get_permalink($resource->ID) . '" class="page-header__resource">
                ' . $img . '
                <div class="page-header__resource-details">
                    <h6>Featured: ' . shelfengine_resource_get_type($resource->ID) . '</h6>
                    <h5>' . $resource->post_title . '</h5>
                    <p>' . get_field('short_description', $resource->ID) . '</p>
                </div>
            </a>';
            $item_output = $item_output . $resource_html;
        }
    }

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'shelfengine_walker_nav_menu_start_el', 10, 4);


function shelfengine_press_mentions_load_posts()
{
    $args = array();
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $args['post_type'] = 'press';

    if ( isset( $_POST['category'] ) && ! empty( $_POST['category'] ) && is_numeric( $_POST['category'] ) ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'press-cat',
                'terms'    => array($_POST['category']),
            ),
        );
    }

    $data = array();

    $press_mentions = new WP_Query($args);

    if ($press_mentions->have_posts()) :
        $press_mentions_years = $_POST['year'];

        while ($press_mentions->have_posts()) :
            $press_mentions->the_post();
            $post_year = get_the_time('Y');

            $args = array(
                'post_year' => $post_year,
                'press_mentions_years' => $press_mentions_years,
                'is_ajax' => true,
            );

            ob_start();
            get_template_part( 'template-parts/press/item', null, $args );

            $data['html'] .= ob_get_clean();

            if ($post_year != $press_mentions_years) {
                $press_mentions_years = $post_year;
            }

        endwhile;

        $data['year'] = $press_mentions_years;
    endif;
    wp_reset_postdata();

    echo json_encode($data);

    wp_die();
}

add_action('wp_ajax_press_mentions', 'shelfengine_press_mentions_load_posts');
add_action('wp_ajax_nopriv_press_mentions', 'shelfengine_press_mentions_load_posts');

// function shelfengine_contributed_query($query)
// {
//     if (!is_admin() &&
//         ($query->is_post_type_archive('contributed') ||
//             $query->is_tax('contributed-tag') ||
//             $query->is_main_query()) &&
//         ! is_single() && ! is_home() ) {
//         $query->set('posts_per_page', 6);
//     }

// }
// add_action('pre_get_posts', 'shelfengine_contributed_query');


function shelfengine_contributed_paginate_links($args = '')
{
    global $wp_query, $wp_rewrite;

    // Setting up default values based on the current URL.
    $pagenum_link = html_entity_decode(get_pagenum_link());
    $url_parts = explode('?', $pagenum_link);

    // Get max pages and current page out of the current query, if available.
    $total = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
    $current = get_query_var('paged') ? (int)get_query_var('paged') : 1;

    // Append the format placeholder to the base URL.
    $pagenum_link = trailingslashit($url_parts[0]) . '%_%';

    // URL base depends on permalink settings.
    $format = $wp_rewrite->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

    $defaults = array(
        'base' => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below).
        'format' => $format, // ?page=%#% : %#% is replaced by the page number.
        'total' => $total,
        'current' => $current,
        'aria_current' => 'page',
        'show_all' => false,
        'prev_text' => __('Prev'),
        'next_text' => __('Next'),
        'add_args' => array(), // Array of query args to add.
        'add_fragment' => ''
    );

    $args = wp_parse_args($args, $defaults);

    if (!is_array($args['add_args'])) {
        $args['add_args'] = array();
    }

    // Merge additional query vars found in the original URL into 'add_args' array.
    if (isset($url_parts[1])) {
        // Find the format argument.
        $format = explode('?', str_replace('%_%', $args['format'], $args['base']));
        $format_query = isset($format[1]) ? $format[1] : '';
        wp_parse_str($format_query, $format_args);

        // Find the query args of the requested URL.
        wp_parse_str($url_parts[1], $url_query_args);

        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        foreach ($format_args as $format_arg => $format_arg_value) {
            unset($url_query_args[$format_arg]);
        }

        $args['add_args'] = array_merge($args['add_args'], urlencode_deep($url_query_args));
    }

    // Who knows what else people pass in $args.
    $total = (int)$args['total'];
    if ($total < 2) {
        return;
    }
    $current = (int)$args['current'];
    $end_size = (int) $args['end_size']; // Out of bounds? Make it the default.
    if ( $end_size < 1 ) {
        $end_size = 1;
    }
    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
        $mid_size = 2;
    }



    $add_args = $args['add_args'];
    $r = '';
    $page_links = array();

    // PREV
    $link = str_replace('%_%', 2 == $current ? '' : $args['format'], $args['base']);
    $link = str_replace('%#%', $current - 1, $link);
    if ($add_args) {
        $link = add_query_arg($add_args, $link);
    }
    $link .= $args['add_fragment'];

    $prev_calss = 'prev page-numbers';
    if ($current && 1 === $current) $prev_calss = 'prev page-numbers paginate-disabled';
    if ($current && 1 < $current) {
        $page_links[] = sprintf(
            '<a class="' . $prev_calss . '" href="%s">%s</a>',
            esc_url(apply_filters('paginate_links', $link)),
            $args['prev_text']
        );
    } elseif ($current && 1 === $current) {
        $page_links[] = '<div class="' . $prev_calss . '">' . $args['prev_text'] . '</div>';
    }


    for ( $n = 1; $n <= $total; $n++ ) :
        if ( $n == $current ) :
            $page_links[] = sprintf(
                '<span aria-current="%s" class="page-numbers current">%s</span>',
                esc_attr( $args['aria_current'] ),
                $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number']
            );

            $dots = true;
        else :
            if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $n, $link );
                if ( $add_args ) {
                    $link = add_query_arg( $add_args, $link );
                }
                $link .= $args['add_fragment'];

                $page_links[] = sprintf(
                    '<a class="page-numbers" href="%s">%s</a>',
                    /** This filter is documented in wp-includes/general-template.php */
                    esc_url( apply_filters( 'paginate_links', $link ) ),
                    $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number']
                );

                $dots = true;
            elseif ( $dots && ! $args['show_all'] ) :
                $page_links[] = '<span class="page-numbers dots">' . __( '&hellip;' ) . '</span>';

                $dots = false;
            endif;
        endif;
    endfor;


    // NEXT
    $link = str_replace('%_%', $args['format'], $args['base']);
    $link = str_replace('%#%', $current + 1, $link);
    if ($add_args) {
        $link = add_query_arg($add_args, $link);
    }
    $link .= $args['add_fragment'];

    $next_calss = 'next page-numbers';
    if ($current && $current >= $total) $next_calss = 'next page-numbers paginate-disabled';
    if ($current && $current < $total) {
        $page_links[] = sprintf(
            '<a class="' . $next_calss . '" href="%s">%s</a>',
            esc_url(apply_filters('paginate_links', $link)),
            $args['next_text']
        );
    } elseif ($current && $current >= $total) {
        $page_links[] = '<div class="' . $next_calss . '">' . $args['next_text'] . '</div>';
    }


    $r = implode("\n", $page_links);

    /**
     * Filters the HTML output of paginated links for archives.
     *
     * @param string $r HTML output.
     * @param array $args An array of arguments. See paginate_links()
     *                     for information on accepted arguments.
     * @since 5.7.0
     *
     */
    $r = apply_filters('paginate_links_output', $r, $args);

    return $r;
}


function link_click_counter() {
    if (isset($_POST['post_id'])) {
        $count = get_post_meta($_POST['post_id'], 'link_click_counter', true);
        update_post_meta($_POST['post_id'], 'link_click_counter', ($count === '' ? 1 : $count + 1));
    }
    exit();
}
add_action('wp_ajax_nopriv_link_click_counter', 'link_click_counter');
add_action('wp_ajax_link_click_counter', 'link_click_counter');

function shelfengine_resources_query($query)
{
    if (!is_admin() && $query->is_post_type_archive('resources') && !is_single()) {
        $query->set('posts_per_page', -1);
    }
}
add_action('pre_get_posts', 'shelfengine_resources_query');


