<?php
/**
 * The template for displaying the footer
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package theme-name
 */
$logo         = get_field('logo', 'options');
$linkedin_url = get_field('linkedin_url', 'options');
$twitter_url  = get_field('twitter_url', 'options');
$facebook_url = get_field('facebook_url', 'options');
?>

    <footer class="page-footer">

        <?php // if(is_front_page()) get_template_part( 'templates/components/_banner' ); ?>



        <div class="page-footer__inner">
            <div class="page-footer__row">
                <div class="page-footer__col1-1">
                    <a class="page-footer__logo" title="Shelf Engine logo" href="<?php echo home_url('/') ?>">
                        <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
                    </a>
                </div>
            </div>
            <div class="page-footer__row">
                <div class="page-footer__col1-4">
                    <?php the_field('footer_address', 'options'); ?>
                    <ul class="page-footer__socials">
                        <?php if (! empty($linkedin_url)) : ?>
                            <li>
                                <a href="<?php echo esc_url($linkedin_url); ?>" rel="nofollow">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 17">
                                        <path d="M3.51562 16.4609V5.94922H.246094V16.4609H3.51562zM1.86328 4.54297c1.05469 0 1.89844-.87891 1.89844-1.93359 0-1.01954-.84375-1.863286-1.89844-1.863286C.84375.746094 0 1.58984 0 2.60938c0 1.05468.84375 1.93359 1.86328 1.93359zM15.7148 16.4609h.0352v-5.7656c0-2.81249-.6328-4.99218-3.9375-4.99218-1.582 0-2.63672.87891-3.09375 1.6875h-.03516v-1.4414h-3.1289V16.4609h3.26953v-5.2031c0-1.37108.24609-2.67186 1.93358-2.67186 1.6875 0 1.7227 1.54686 1.7227 2.77736v5.0976h3.2343z" fill="#153343"/>
                                    </svg>
                                </a>
                            </li>
                        <?php endif ?>
                        <?php if (! empty($twitter_url)) : ?>
                            <li>
                                <a href="<?php echo esc_url($twitter_url); ?>" rel="nofollow">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 16">
                                        <path d="M16.1367 4.05469c.7031-.52735 1.336-1.16016 1.8281-1.89844-.6328.28125-1.371.49219-2.1093.5625.7734-.45703 1.3359-1.16016 1.6172-2.039062-.7032.421872-1.5118.738282-2.3204.914062C14.4492.855469 13.5.433594 12.4453.433594c-2.0391 0-3.69139 1.652346-3.69139 3.691406 0 .28125.03515.5625.10547.84375-3.0586-.17578-5.80079-1.65234-7.62891-3.86719-.316408.52735-.492189 1.16016-.492189 1.86328 0 1.26563.632809 2.39063 1.652339 3.0586-.59765-.03516-1.19531-.17578-1.687495-.45703v.03515c0 1.79297 1.265625 3.26953 2.953125 3.6211-.28125.07031-.63281.14062-.94922.14062-.24609 0-.45703-.03516-.70312-.07031.45703 1.47653 1.82812 2.53123 3.44531 2.56643-1.26563.9844-2.84766 1.582-4.570314 1.582-.316406 0-.597656-.0352-.878906-.0703 1.61719 1.0547 3.55078 1.6523 5.66016 1.6523 6.78514 0 10.47654-5.58981 10.47654-10.47652v-.49219z" fill="#153343"/>
                                    </svg>
                                </a>
                            </li>
                        <?php endif ?>
                        <?php if (! empty($facebook_url)) : ?>
                            <li>
                                <a href="<?php echo esc_url($facebook_url); ?>" rel="nofollow">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 19">
                                        <path d="M9.80859 10.8359l.49221-3.23434H7.17188V5.49219c0-.91407.42187-1.75781 1.82812-1.75781h1.4414V.957031S9.14062.710938 7.91016.710938c-2.56641 0-4.25391 1.582032-4.25391 4.394532v2.49609H.773438v3.23434H3.65625v7.875h3.51563v-7.875h2.63671z" fill="#153343"/>
                                    </svg>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>

                    <div class="page-footer__copyright">
                        <?php echo get_field('footer_copyright', 'options'); ?>
                    </div>
                </div>
                <div class="page-footer__col1-4">
                    <div class="page-footer__widget">
                        <h4 class="page-footer__widget-title">Company</h4>

                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer-menu1',
                            'menu_class'     => 'page-footer__menu',
                            'depth'          => 1,
                            'fallback_cb'    => '__return_empty_string'
                        )); ?>
                    </div>
                </div>
                <div class="page-footer__col1-4">
                    <div class="page-footer__widget">
                        <h4 class="page-footer__widget-title">Resources</h4>

                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer-menu2',
                            'menu_class'     => 'page-footer__menu',
                            'depth'          => 1,
                            'fallback_cb'    => '__return_empty_string'
                        )); ?>
                    </div>
                </div>
                <div class="page-footer__col1-4">
                    <div class="page-footer__widget">
                        <h4 class="page-footer__widget-title">Get started</h4>

                        <?php wp_nav_menu(array(
                            'theme_location' => 'footer-menu3',
                            'menu_class'     => 'page-footer__menu',
                            'depth'          => 1,
                            'fallback_cb'    => '__return_empty_string'
                        )); ?>
                    </div>
                </div>
            </div>
        </div>



        <!-- <div class="page-footer__inner container js-visibility">
            <div class="page-footer__main reveal-fade">
                <a class="page-footer__logo" title="Shelf Engine logo" href="<?php echo home_url('/') ?>">
                    <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
                </a>
                <?php the_field('footer_address', 'options'); ?>
            </div>
            <div class="page-footer__social reveal-fade reveal-del-1">
                <?php the_field('footer_social', 'options'); ?>
            </div>
            <div class="page-footer__about reveal-fade reveal-del-2">
                <?php the_field('footer_nav', 'options'); ?>
            </div>
            <div class="page-footer__copyright reveal-fade">© <?php echo date('Y') . get_field('footer_copyright', 'options'); ?></div>
        </div> -->
    </footer>
</main>

    <!-- <section class="popup">
        <div class="popup__inner">
            <button class="popup__close"></button>
            <h2>Ready to learn how much you can save?</h2>
            <div class="form">
                <?php echo do_shortcode(get_field('popup_form_shortcode', 'options')); ?>
            </div>
        </div>
    </section> -->

    <?php wp_footer(); ?>

<?php
/**
 * After footer action.
 *
 * @hook
 */
$landing_style = get_field('landing_style');
if ($landing_style != 'gated') :
    do_action('shelf_after_footer_action'); 
endif; ?>
<script>

$( document ).ready(function() {

$(".sh-demo__row input[name='email']").blur(function(){

  var $email = this.value;

    if(validateEmail($email) == true){
        $(".sh-demo__row input[name='email']").addClass("error");
        $(".sh-demo__row input[name='email']").val('');
        if ($('#b_email').length === 0) {
            $(".sh-demo__row span .email").after('<label id="b_email" class="error" style="position: static;">Only company email address is allowed</label>');
        }

    }else{
        $("#b_email").remove();
    }

});
});

function validateEmail(email) {
   var blocked = ["gmail.com", "hotmail.com", "yahoo.com", "yahoo.co.in", "aol.com", "abc.com", "xyz.com", "pqr.com", "rediffmail.com", "live.com", "outlook.com", "me.com", "msn.com", "ymail.com", "fodiscomail.com"];
  for(var i = 0; i< blocked.length; i++) {
    if(email.indexOf(blocked[i]) != -1) {
       return true;
    }
  }
  return false;
}


function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function cleanUnwantedParam(value) {
    if (value.includes('not') == false && value.includes('none') == false) {
        return true;
    }
}

function explodeString(argument) {
    if (argument) {
        exploded_value = new Array();
        exploded_value = argument.split("=");

        const expr = exploded_value[0];
        switch (expr) {
            case 'utmccn':
                exploded_value[0] = 'utm_campaign';
                break;
            case 'utmcmd':
                if (cleanUnwantedParam(exploded_value[1]) == true) {
                    exploded_value[0] = 'utm_medium';
                }
                break;
            case 'utmctr':
                if (cleanUnwantedParam(exploded_value[1]) == true) {
                    exploded_value[0] = 'utm_term';
                }
                break;
            case 'utmcct':
                if (cleanUnwantedParam(exploded_value[1]) == true) {
                    exploded_value[0] = 'utm_content';
                }
                break;
            default:
                if (exploded_value[0].includes('utmcsr')) {
                    exploded_value[0] = 'utm_source';
                }
        }
    }
    return exploded_value;
}


var google_utmz;
google_utmz = getCookie('__utmz');

if (google_utmz) {
    utmz_clean = google_utmz.replace(/[()]/g, '');
    utmz_params = utmz_clean.split("|");
    build_utmz = new Array();
    utmz_params.forEach(
        (element) => {
            clean_array = explodeString(element);
            build_utmz[clean_array[0]] = clean_array[1];
        }
    );
}

function isEmpty(str) {
    return (!str || str.length === 0);
}

function getParam(p) {
    var match = RegExp('[?&]' + p + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}

function getExpiryRecord(value) {
    var expiryPeriod = 2 * 24 * 60 * 60 * 1000; // 180 day expiry in milliseconds
    var expiryDate = new Date().getTime() + expiryPeriod;
    return {
        value: value,
        expiryDate: expiryDate
    };
}

function getElementById(idname, value) {
    document.getElementById(idname).value = value;
}


function setLocalStorage(field_name) {

    var field_value = getParam(field_name);

    if (isEmpty(field_value)) {
        if (typeof build_utmz !== "undefined") {
            var current_field_data =  JSON.parse(localStorage.getItem(field_name));
            if(isEmpty(current_field_data)){
                field_value = build_utmz[field_name];
            }
        }
    }

    if (field_value) {
        getElementById(field_name, field_value);
        field_nameRecord = getExpiryRecord(field_value);
        localStorage.setItem(field_name, JSON.stringify(field_nameRecord));
    } else {
        var field_value = JSON.parse(localStorage.getItem(field_name));
        var isfield_nameValid = field_value && new Date().getTime() < field_value.expiryDate;
        if (isfield_nameValid) {
            getElementById(field_name, field_value.value);
        }
    }

}


function addOtherParam() {

    let params = ['fbclid', 'se_source', 'utm_source', 'utm_medium', 'utm_term', 'utm_content', 'utm_campaign'];

    params.forEach(function(e) {
        setLocalStorage(e);
    });

}

function addGclid() {
    addOtherParam();
    var gclidParam = getParam('gclid');
    var gclidFormFields = ['gclid', 'foobar']; // all possible gclid form field ids here
    var gclidRecord = null;
    var currGclidFormField;
    var gclsrcParam = getParam('gclsrc');
    var isGclsrcValid = !gclsrcParam || gclsrcParam.indexOf('aw') !== -1;
    gclidFormFields.forEach(function(field) {
        if (document.getElementById(field)) {
            currGclidFormField = document.getElementById(field);
        }
    });
    if (gclidParam && isGclsrcValid) {
        gclidRecord = getExpiryRecord(gclidParam);
        localStorage.setItem('gclid', JSON.stringify(gclidRecord));
    }
    var gclid = gclidRecord || JSON.parse(localStorage.getItem('gclid'));
    var isGclidValid = gclid && new Date().getTime() < gclid.expiryDate;
    if (currGclidFormField && isGclidValid) {

        currGclidFormField.value = gclid.value;
    }
}
window.addEventListener('load', addGclid);

</script>
    </body>

</html>
