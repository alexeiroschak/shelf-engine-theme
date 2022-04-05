/* Init object fit polyfill */
/* To make it work, add 'font-family: 'object-fit: cover;';' to image */
if (window.objectFitImages) {
    window.objectFitImages();
}

gsap.registerPlugin(ScrollTrigger);

$(document).ready(() => {
    let navState = false;
    const $header = $('.page-header');
    let isObserver = true;
    let observer;

    if (
        !('IntersectionObserver' in window) ||
        !('IntersectionObserverEntry' in window) ||
        !('isIntersecting' in window.IntersectionObserverEntry.prototype)
    ) {
        isObserver = false;
        $('html').removeClass('is-observer');
    }

    if (isObserver) {
        observer = new IntersectionObserver(
            entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            },
            { rootMargin: '0px 0px -15% 0px' }
        );
    }

    function isTouchDevice() {
        const prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');
        const mq = query => {
            return window.matchMedia(query).matches;
        };

        if (
            'ontouchstart' in window ||
            // eslint-disable-next-line no-undef
            (window.DocumentTouch && document instanceof DocumentTouch)
        ) {
            return true;
        }

        // include the 'heartz' as a way to have a non matching MQ to help terminate the join
        // https://git.io/vznFH
        const query = [
            '(',
            prefixes.join('touch-enabled),('),
            'heartz',
            ')'
        ].join('');
        return mq(query);
    }

    if (isTouchDevice()) {
        $('html').addClass('is-touch');
    }

    function disableScrolling() {
        if ($(document).height() > $(window).height()) {
            const scrollTop = $('html').scrollTop()
                ? $('html').scrollTop()
                : $('body').scrollTop(); // Works for Chrome, Firefox, IE...
            $('html')
                .addClass('disable-scrolling')
                .css('top', -scrollTop);
        }
    }

    function enableScrolling() {
        const scrollTop = parseInt($('html').css('top'), 10);
        $('html').removeClass('disable-scrolling');
        $('html,body').scrollTop(-scrollTop);
    }

    function bindEvents() {
        const $popup = $('.popup');
        const $popupInner = $popup.children('.popup__inner');
        const $popupClose = $popupInner.children('.popup__close');
        const $supplierPopup = $('.popup-how-it-works');
        const $supplierInner = $supplierPopup.children('.popup__inner');
        const $supplierClose = $('.supplier__close');
        const $supplierLink = $('.become-a-supplier');

        $('.hamburger').on('click', () => {
            if (navState) {
                $header.removeClass('is-opened');
                enableScrolling();
            } else {
                $header.addClass('is-opened');
                disableScrolling();
            }

            navState = !navState;
        });

        $supplierLink.on('click', () => {
            $supplierPopup.addClass('is-active');
            // disableScrolling();
            $('.page-header').addClass('is-scrolling');
        });

        $('.js-popup').on('click', () => {
            $popup.addClass('is-active');
            // disableScrolling();
            $('.page-header').addClass('is-scrolling');
        });

        $popupClose.on('click', () => {
            $popup.removeClass('is-active');
            // enableScrolling();
            $('.page-header').addClass('is-scrolling');
        });

        $popupClose.on('click', () => {
            $popup.removeClass('is-active');
            // enableScrolling();
            $('.page-header').addClass('is-scrolling');
        });

        $supplierClose.on('click', () => {
            $supplierPopup.removeClass('is-active');
            $('.page-header').addClass('is-scrolling');
        });

        $popupInner.on('click', e => e.stopPropagation());

        // $(
        //   '.page-header__menu li:first-child() a, .page-footer__about li:first-child() a'
        // ).on('click', e => {
        //   e.preventDefault();
        //   $('html,body').animate({
        //     scrollTop: $(e.target.hash).offset().top
        //   });
        // });
    }

    function initHero() {
        const $carousel = $('.hero__carousel');

        if ($carousel.length) {
            const $items = $carousel.children();
            const $dots = $carousel.siblings('.hero__dots');
            const $dot = $dots.children();
            let interval;
            let cur = 0;
            const { length } = $items;

            $items.first().addClass('is-selected');
            $dot.first().addClass('is-active');

            const changeSlide = () => {
                $items.eq(cur).removeClass('is-selected');
                $dot.eq(cur).removeClass('is-active');

                cur += 1;
                if (cur >= length) {
                    cur = 0;
                }

                $items.eq(cur).addClass('is-selected');
                $dot.eq(cur).addClass('is-active');
            };

            // $carousel.flickity({
            //   fade: true,
            //   prevNextButtons: false,
            //   pageDots: true,
            //   autoPlay: 4000,
            //   wrapAround: true,
            //   draggable: false
            // });

            interval = setInterval(() => {
                changeSlide();
            }, 8000);

            $('.hero__carousel').on('click', () => {
                // $carousel.flickity('next', true);
                clearInterval(interval);
                changeSlide();

                interval = setInterval(() => {
                    changeSlide();
                }, 8000);
            });
            $('.hero__dots .dot').on('click', function() {
                clearInterval(interval);
                let old = $('.hero__dots .is-active').attr('data-index') - 1;
                cur = $(this).attr('data-index') - 1;

                $items.eq(old).removeClass('is-selected');
                $dot.eq(old).removeClass('is-active');

                $items.eq(cur).addClass('is-selected');
                $dot.eq(cur).addClass('is-active');
                interval = setInterval(() => {
                    changeSlide();
                }, 8000);
            });
        }
    }

    function initVideoBlock() {
        const $blocks = $('.video-block');

        if (!$blocks.length) return;
        $blocks.each((i, el) => {
            const $block = $(el);
            const $videoWrap = $block.find('.embed-container');
            const $iframe = $videoWrap.children('iframe');
            const src = $iframe.data('src');

            ScrollTrigger.create({
                trigger: $iframe[0],
                start: 'top bottom',
                end: 'bottom top',
                onToggle: self => {
                    if (self.isActive) {
                        $iframe.prop('src', src);
                    }
                },
                once: true
            });
        });
    }

    function initDotted() {
        const $circles = $('.dotted-circle');

        if (!$circles.length) return;

        $circles.each((i, el) => {
            const $circle = $(el);
            const reverse = $circle.hasClass('dotted-circle--reverse');

            const tl = gsap.timeline({
                repeat: -1,
                scrollTrigger: {
                    trigger: $circle[0],
                    start: 'top bottom',
                    end: 'bottom top',
                    toggleActions: 'play pause resume pause'
                }
            });

            for (let index = 0; index < 4; index += 1) {
                tl.to($circle[0], {
                    duration: 2.5,
                    ease: 'linear',
                    scale: 0.85
                });

                tl.to($circle[0], {
                    duration: 2.5,
                    ease: 'linear',
                    scale: 1
                });
            }

            tl.to(
                $circle[0],
                {
                    duration: 20,
                    ease: 'linear',
                    rotation: reverse ? -360 : 360
                },
                0
            );
        });
    }
    function initDottedInt() {
        let $circles_int = $('.dotted-circle-int');

        if (!$circles_int.length) return;

        $circles_int.each((i, el) => {
            let $circle_int = $(el);

            let tl = gsap.timeline({
                repeat: -1,
                scrollTrigger: {
                    trigger: $circle_int[0],
                    start: 'top bottom',
                    end: 'bottom top',
                    toggleActions: 'play pause resume pause'
                }
            });

            for (let index = 0; index < 4; index += 1) {
                tl.to($circle_int[0], {
                    duration: 2.5,
                    ease: 'linear',
                    scale: 0.9
                });

                tl.to($circle_int[0], {
                    duration: 2.5,
                    ease: 'linear',
                    scale: 1
                });
            }
        });
    }

    function initChart() {
        const $container = $('.chart');

        if (!$container.length) return;
        const $video = $container.find('video');

        ScrollTrigger.create({
            trigger: $video[0],
            start: 'top bottom',
            end: 'bottom top',
            onEnter: () => {
                $video[0].play();
            },
            onEnterBack: () => {
                $video[0].play();
            },
            onLeave: () => {
                $video[0].pause();
                $video[0].currentTime = 0;
            },
            onLeaveBack: () => {
                $video[0].pause();
                $video[0].currentTime = 0;
            }
        });
    }

    function updateHeader() {
        const st = $(window).scrollTop();

        if (st > 20) {
            $header.addClass('is-scrolling');
        } else {
            $header.removeClass('is-scrolling');
        }
    }

    function initHeroV2() {
        const $typing = $('.typing');

        if (!$typing.length) return;

        const typed = new Typed('.typing', {
            strings: [
                'broken CAO',
                'spreadsheet to wrangle',
                'confusing dashboard'
            ],
            typeSpeed: 50,
            loop: true,
            loopCount: Infinity,
            backSpeed: 50
        });
    }

    function initRotatingText() {
        if (!$('#rotate').length) return;

        const $typing = $('#rotate');

        if (!$typing.length) return;

        const typed = new Typed('#rotate', {
            strings: [
                'vendor managed inventory',
                ' scan based trade',
                'guaranteed sale'
            ],
            typeSpeed: 50,
            loop: true,
            loopCount: Infinity,
            backSpeed: 50
        });

        // let terms = ["vendor managed inventory", " scan based trade", "guaranteed sale"];

        // function rotateTerm(){
        //   let ct = $('#rotate').data("term") || 0;
        //   $('#rotate').data("term", ct == terms.length -1 ? 0 : ct + 1).text(terms[ct])
        //   .fadeIn().delay(2000).fadeOut(200, rotateTerm);
        // }
        // $(rotateTerm);
    }

    function initPricing() {
        const $price = $('.js-pricing-row');
        const $sticker = $('.js-pricing-sticker');

        if (!$price.length) return;

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: '.v3-pricing__table-wrap',
                start: 'top center',
                end: '500 center',
                toggleActions: 'play reverse play reverse'
            }
        });

        tl.to($price, {
            duration: 0.4,
            ease: 'linear',
            opacity: 1,
            stagger: 0.4
        });
        tl.to($sticker, {
            duration: 0.2,
            ease: 'linear',
            opacity: 1,
            scale: 1.2,
            rotation: 0
        });
        tl.to($sticker, {
            duration: 0.2,
            ease: 'linear',
            opacity: 1,
            scale: 1
        });
    }

    function initVendors() {
        const $logo = $('.v3-vendors__logo-logo');
        const $popup = $('.popup-how-it-works');

        if (!$logo.length) return;

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: '.v3-vendors__logo-wrap',
                start: 'top center',
                end: '600 center'
            }
        });

        tl.to($logo, {
            duration: 1,
            ease: 'power2.out',
            y: 1,
            opacity: 1,
            stagger: 0.25
        });
    }

    function initReporting() {
        const $tablet = $('#js-reporting-tablet');
        const $circle = $('.v3-reporting__circle-white');

        if (!$tablet.length) return;

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: '.v3-reporting__text-wrap',
                start: '10% center',
                end: 'bottom top',
                toggleActions: 'play reverse play reverse'
            }
        });
        tl.to($circle, {
            duration: 1.2,
            ease: 'power3.out',
            scale: 1,
            opacity: 1
        });
        tl.to($tablet, { duration: 1, ease: 'power2.out', x: 0 }, '-=1');
    }

    function initPeopleHero() {
        const $sections = $('.people-hero__overlay-section');

        if (!$sections.length) return;

        const tl = gsap.timeline({});
        tl.to($sections, {
            duration: 0.2,
            ease: 'linear',
            height: '0px',
            stagger: 0.1
        });
    }

    function initPeopleProfile() {
        const $profiles = $('.people-meet-the-team__profile-container');
        const $profileSection = $('.people-profile-details');
        const $circle = $('.people-profile-details__white-circle');
        const $closeBtn = $('.people-profile-details__close-btn');
        const $nameTwo = $('.name-two');

        if (!$profiles.length) return;

        // animates profiles in
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: $profiles,
                start: 'top bottom',
                end: 'bottom top'
            }
        });
        tl.to($profiles, {
            duration: 0.25,
            ease: 'linear',
            scale: 1,
            opacity: 1,
            stagger: 0.05
        });

        // opens profile details section
        const tlOpen = gsap.timeline({});

        if (location.hash == '#brian') {
            activateProfile($profiles[7]);
        }

        $profiles.click(function() {
            activateProfile(this);
        });

        function activateProfile(profile) {
            const $nameAndTitle = $(profile).children()[1];
            const $hidden = $(profile).children()[2];
            const $jobTitle = $($nameAndTitle).children()[0].innerHTML;
            const $name = $($nameAndTitle).children()[1].innerHTML;
            const $nameEl = $('.people-profile-details__name');
            const $jobTitleEl = $('.people-profile-details__job-title');
            const $image = $($hidden).children()[0];
            const $imageEl = $('.people-profile-details__name');
            const $description = $($hidden).children()[1].innerHTML;
            const $descriptionEl = $('.people-profile-details__description');
            const $linkedIn = $($hidden).children()[2].innerHTML;
            const $linkedInEl = $('.people-profile-details__social-link');

            $imageEl.attr('src', $($image).attr('src'));
            $linkedInEl.attr('href', $linkedIn);
            $jobTitleEl.html($jobTitle);
            $nameEl.html($name);
            $descriptionEl.html($description);
            $('html, body').animate(
                { scrollTop: $($profileSection).offset().top - 68 },
                500
            );
            $($profiles).removeClass('active');
            $(profile).addClass('active');
            tlOpen.to($profileSection, {
                duration: 0.75,
                ease: 'linear',
                height: 'auto'
            });
            tlOpen.to(
                $circle,
                { duration: 1.2, ease: 'power3.out', scale: 1, translateX: 1 },
                '-=0.75'
            );
        }

        // closes profile details section
        const tlClose = gsap.timeline({});
        $closeBtn.click(function() {
            $($profiles).removeClass('active');
            tlClose.to($profileSection, {
                duration: 0.75,
                ease: 'linear',
                height: '0'
            });
            tlClose.to(
                $circle,
                { duration: 0.75, ease: 'linear', scale: 0.75 },
                '-=0.75'
            );
        });
    }

    function initAboutPrinciples() {
        const $header = $('.about-principles-list__item h4');
        const $copy = $('.about-principles-list__item p');
        const $icons = $('.about-principles-list__item img');

        if (!$header.length) return;

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: $header,
                start: 'top bottom'
            }
        });

        tl.to($icons, {
            duration: 1,
            ease: 'power1.out',
            opacity: 1,
            y: 0,
            stagger: 0.6
        });
        tl.to(
            $header,
            {
                duration: 1,
                ease: 'power1.out',
                opacity: 1,
                y: 0,
                stagger: 0.6,
                dealy: 1
            },
            -0.01
        );
        tl.to(
            $copy,
            { duration: 1, ease: 'power1.out', opacity: 1, y: 0, stagger: 0.6 },
            -0.01
        );
    }

    function initTimeline() {
        const $icon = $('.about-story__timeline-icon');
        const $dottedLine = $('.about-story__timeline-dotted-line');
        const $header = $('.about-story__timeline-item h3');
        const $copy = $('.about-story__timeline-item p');
        const $lastIcon = $('.about-story__timeline-icon-last');

        if (!$icon.length) return;

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: $icon,
                start: 'top bottom'
            }
        });
        tl.to($icon, {
            duration: 0.4,
            ease: 'bounce.out',
            scale: 1,
            stagger: 0.4,
            opacity: 1
        });
        tl.to(
            $header,
            {
                duration: 0.4,
                ease: 'linear',
                opacity: 1,
                stagger: 0.4,
                delay: 1
            },
            -1
        );
        tl.to(
            $copy,
            {
                duration: 0.4,
                ease: 'linear',
                opacity: 1,
                stagger: 0.4,
                delay: 1
            },
            -1
        );
        tl.to(
            $dottedLine,
            {
                duration: 0.4,
                ease: 'linear',
                height: '90px',
                stagger: 0.4,
                delay: 0.4
            },
            -1
        );
        // tl.to($lastIcon, {duration: 0.5, opacity: 1})

        const tlFounders = gsap.timeline({
            scrollTrigger: {
                trigger: $('.about-story__white-circle'),
                start: 'top bottom',
                end: 'bottom top'
            }
        });

        tlFounders.to($('.about-story__white-circle'), {
            duration: 1,
            scale: 1,
            ease: 'power3.out'
        });
    }

    function initFooterCircle() {
        const $circle = $('.features_dotted-footer svg');

        if (!$circle.length) return;

        const tl = gsap.timeline({
            repeat: -1,
            scrollTrigger: {
                trigger: $circle,
                start: 'top bottom',
                end: 'bottom top',
                toggleActions: 'play pause resume pause'
            }
        });

        for (let index = 0; index < 4; index += 1) {
            tl.to($circle, { duration: 2.5, ease: 'linear', scale: 0.87 });
            tl.to($circle, { duration: 2.5, ease: 'linear', scale: 1 });
        }
        tl.to($circle, { duration: 20, ease: 'linear', rotation: 360 }, 0);
    }

    function initAnimateLeaf() {
        const $svgLeaf = $('#Layer_1 circle');
        const $svgLeafLine = $('#Layer_1 rect');
        const $bigCircles = [];
        const $mediumCircles = [];
        const $smallCircles = [];

        // $svgLeaf.each((i, el) => {
        //   if($(el).attr("r") == 21.6 || $(el).attr("r") == 21){
        //     $bigCircles.push(el)
        //   } else if ($(el).attr("r") == 14.5 || $(el).attr("r") == 14.8 ){
        //     $mediumCircles.push(el)
        //   }
        //   else { $smallCircles.push(el)}
        // });

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: $svgLeaf,
                start: '-200 70%',
                end: 'bottom top',
                toggleActions: 'play pause resume pause'
            }
        });

        tl.fromTo(
            $svgLeaf,
            { opacity: 0, attr: { r: '-=5' } },
            {
                duration: 0.8,
                opacity: 1,
                attr: { r: '+=5' },
                ease: 'none',
                stagger: 0.05
            }
        );
        tl.fromTo(
            $svgLeafLine,
            { opacity: 0, attr: { width: '-=5' } },
            {
                duration: 0.5,
                opacity: 1,
                attr: { width: '+=5' },
                ease: 'none',
                delay: 0.25,
                stagger: 0.04
            },
            0
        );

        // tl.to($bigCircles, {duration: 0.8, opacity: 1, attr: {r:  23}, ease: "none", repeat: -1, yoyo:true});
        // tl.to($mediumCircles, {duration: 0.8, opacity: 1, attr: {r:  16}, ease: "none", repeat: -1, yoyo:true}, 0);
        // tl.to($smallCircles, {duration: 0.8, opacity: 1, attr: {r:  13.8}, ease: "none", repeat: -1, yoyo:true}, 0);

        // tl.to($svgLeafLine, {duration: 0.3, opacity: 1, stagger: 0.0, attr: {width:  0}, ease: "none", stagger: 0.01, repeat: 1, yoyo:true});
    }

    /* FUNCTION CALLS */
    /* ============= */
    bindEvents();
    initHero();
    initVideoBlock();
    initDotted();
    initDottedInt();
    initChart();
    initHeroV2();
    initRotatingText();
    initVendors();
    initReporting();
    initPricing();
    initPeopleProfile();
    initPeopleHero();
    initTimeline();
    initAboutPrinciples();
    initFooterCircle();
    updateHeader();
    initAnimateLeaf();

    // console.log(location.hash);

    if (isObserver) {
        $('.js-visibility').each((i, el) => {
            observer.observe(el);
        });
        $('.legal .container>*').each((i, el) => {
            observer.observe(el);
        });
    }

    $(window).on('scroll', updateHeader);

    // Share links
    $('[data-share]').on('click', function(e) {
        e.preventDefault();

        const w = window;
        const url = $(this).attr('data-share');
        const title = '';
        const w_pop = 600;
        const h_pop = 600;
        const scren_left =
            w.screenLeft != undefined ? w.screenLeft : screen.left;
        const scren_top = w.screenTop != undefined ? w.screenTop : screen.top;
        const width = w.innerWidth;
        const height = w.innerHeight;
        const left = width / 2 - w_pop / 2 + scren_left;
        const top = height / 2 - h_pop / 2 + scren_top;
        const newWindow = w.open(
            url,
            title,
            `scrollbars=yes, width=${w_pop}, height=${h_pop}, top=${top}, left=${left}`
        );

        if (w.focus) {
            newWindow.focus();
        }

        return false;
    });

    // Demo form

    // $('.js-show-demo, .js-show-demo > a, .typeform-share').on('click', function(
    $('.js-show-demo, .js-show-demo > a').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('body, html').css('overflow', 'hidden');
        let demo = $('.sh-demo'),
            demo_overlay = $('.sh-demo-overlay');
        if (demo.hasClass('sh-demo_all-pages')) {
            demo.addClass('sh-demo--active');
            demo_overlay.addClass('active-overlay');
        }
        $("input[name='first_name']").focus();
    });
    $('a').on('click', function(e) {
        if ($(this).attr('href') == '#sh-demo') {
            e.preventDefault();
            e.stopPropagation();
            $('body, html').css('overflow', 'hidden');
            let demo = $('.sh-demo'),
                demo_overlay = $('.sh-demo-overlay');
            if (demo.hasClass('sh-demo_all-pages')) {
                demo.addClass('sh-demo--active');
                demo_overlay.addClass('active-overlay');
            }
            $("input[name='first_name']").focus();
        }
    });
    $('.sh-demo__close').on('click', function(e) {
        e.preventDefault();
        $('body, html').removeAttr('style');
        let demo = $('.sh-demo'),
            demo_overlay = $('.sh-demo-overlay');
        demo.removeClass('sh-demo--active');
        demo_overlay.removeClass('active-overlay');
    });

    $('.wpcf7-select').select2();

    $('.page-header__menu > li.menu-item-has-children > a').on(
        'click touchstart',
        function(e) {
            if (e.handled === false) return;
            e.stopPropagation();
            e.preventDefault();
            e.handled = true;
            if (window.matchMedia('(max-width: 992px)')) {
                let $parent = $(this).closest('.menu-item');
                $parent.toggleClass('active');
            }
        }
    );

    // close form on click outside
    $(document).on('click touchstart', function(e) {
        let demo = $('.sh-demo:not(.sh-demo_landing)'),
            demo_overlay = $('.sh-demo-overlay');

        if ($(e.target).closest(demo).length === 0) {
            $('body, html').removeAttr('style');
            demo.removeClass('sh-demo--active');
            demo_overlay.removeClass('active-overlay');
        }
    });

    // required fields validation
    $('.wpcf7-validates-as-required:not(select)').keyup(function() {
        var empty = false;
        $('.sh-demo')
            .find('.wpcf7-validates-as-required:not(select)')
            .each(function() {
                if ($(this).val() == '') {
                    empty = true;
                }
            });
        if (empty) {
            $('.btn--submit').attr('disabled', 'disabled');
        } else {
            $('.btn--submit').removeAttr('disabled');
        }
    });

    $('.wpcf7-text, .wpcf7-textarea ').each(function() {
        $(this).keyup(function() {
            if ($(this).val() == '') {
                $(this)
                    .closest('.form-control')
                    .removeClass('active');
            } else {
                $(this)
                    .closest('.form-control')
                    .addClass('active');
            }
        });
    });

    // Press
    let press_page_btn = $('.js-press-page-btn'),
        press_mentions = $('.js-press-mentions'),
        current_page = 1;

    press_page_btn.on('click', function() {
        let $this = $(this),
            data = {
                action: 'press_mentions',
                page: current_page,
                year: $this.data('year'),
                category: $this.data('category')
            },
            max_pages = $this.data('max-pages'),
            html = {};

        $this.text('Loading...');

        $.ajax({
            url: seng_object.ajax_url,
            data: data,
            type: 'POST',
            success: function(data) {
                if (data) {
                    $this.text('Load more');
                    html = JSON.parse(data);
                    $this.data('year', Number(html.year));

                    press_mentions.append(html.html);

                    current_page++;
                    if (Number(current_page) === Number(max_pages))
                        $this.remove();
                } else {
                    $this.remove();
                }
            }
        });
    });

    let press_page_menu = $('.js-press-page-menu');
    press_page_menu.select2({
        //placeholder: 'Latest',
        minimumResultsForSearch: -1,
        dropdownAutoWidth: true,
        width: false
    });

    press_page_menu.on('change', function(e) {
        document.location.href = $(this).val();
    });

    // Resources
    let resources_item = $('.js-resources-item');
    resources_item.on('click', function() {
        let link = $(this).find('a'),
            ajax_options = {
                action: 'link_click_counter',
                post_id: $(this).data('post-id')
            };

        $.post(seng_object.ajax_url, ajax_options, function() {
            window.open(link.attr('href'), '_blank');
        });
        // return false;
    });

    if (typeof $.fn.isotope !== 'undefined') {
        let resources_filter = $('.js-resources-filter'),
            resources_sort = $('.js-resources-sort'),
            resources_filter_select = $('.js-resources-filter-select');

        resources_sort.select2({
            placeholder: 'Sort by...',
            minimumResultsForSearch: -1,
            dropdownAutoWidth: true,
            width: false
        });
        resources_filter_select.select2({
            placeholder: 'All resources',
            minimumResultsForSearch: -1,
            dropdownAutoWidth: true,
            width: false
        });

        // init Isotope
        let $grid = $('.js-resources-grid').isotope({
            itemSelector: '.js-resources-item',
            layoutMode: 'fitRows',
            percentPosition: true,
            getSortData: {
                resourcesTitle: '.resources-title',
                date: function(itemElem) {
                    return Date.parse($(itemElem).data('time'));
                },
                dateAscending: function(itemElem) {
                    return Date.parse($(itemElem).data('time'));
                },
                popular: '[data-popular]'
            }
        });
        // filter
        resources_filter.on('click', 'button', function() {
            let filterValue = $(this).data('filter');
            $grid.isotope({ filter: filterValue });
        });

        resources_filter_select.on('change', function(e) {
            $grid.isotope({ filter: $(this).val() });
        });

        // bind sort button click
        resources_sort.on('change', function(e) {
            $grid.isotope({
                sortBy: $(this).val(),
                sortAscending: {
                    resourcesTitle: true,
                    date: true,
                    dateAscending: false,
                    popular: false
                }
            });
        });

        // change is-checked class on buttons
        resources_filter.each(function(i, buttonGroup) {
            let $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });

        function resources_item_height() {
            let num = [],
                i = 0,
                max_num = 0;

            resources_item.each(function() {
                let $this = $(this);
                num[i] = $this.height();
                i++;
            });

            max_num = Math.max.apply(Math, num);
            resources_item.height(max_num);

            $grid.isotope('layout');
        }

        resources_item_height();
        $(window).on('resize', resources_item_height);

        if ($('body').hasClass('post-type-archive-resources')) {
            $('.resource-filter-link a').on('click', function() {
                let href = $(this).attr('href');
                let filterValue = '.' + href.split('#')[1];
                $grid.isotope({ filter: filterValue });
            });
            let filterValue = window.location.hash.split('#')[1];
            if (!filterValue) return;
            $('.js-resources-filter .button-group').each(function() {
                $(this).removeClass('is-checked');
                if ($(this).attr('data-filter') == '.' + filterValue) {
                    $(this).addClass('is-checked');
                }
            });
            $grid.isotope({ filter: '.' + filterValue });
        }
    }
    // FAQ
    if (typeof $.fn.isotope !== 'undefined') {
        let faq_page_filter = $('.js-faq-page-filter'),
            faq_page_filter_select = $('.js-faq-page-filter-select');

        faq_page_filter_select.select2({
            placeholder: 'All',
            minimumResultsForSearch: -1,
            dropdownAutoWidth: true,
            width: false
        });

        // init Isotope
        let $grid_faq_page = $('.js-faq-page-grid').isotope({
            itemSelector: '.js-faq-page-item',
            layoutMode: 'vertical',
            percentPosition: true
        });

        // filter
        faq_page_filter.on('click', 'button', function() {
            let filterValue = $(this).data('filter');
            $grid_faq_page.isotope({ filter: filterValue });
        });

        faq_page_filter_select.on('change', function(e) {
            $grid_faq_page.isotope({ filter: $(this).val() });
        });

        // change is-checked class on buttons
        faq_page_filter.each(function(i, buttonGroup) {
            let $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $(this).addClass('is-checked');
            });
        });

        let faq_page_item = $('.js-faq-page-item');
        faq_page_item.each(function() {
            let $this = $(this),
                faq_page_item_header = $this.find('.sh-faq-page__item-header'),
                faq_page_item_content = $this.find(
                    '.sh-faq-page__item-content'
                );

            faq_page_item_header.on('click', function() {
                $this.toggleClass('active');
                faq_page_item_content.fadeToggle(0);
                $grid_faq_page.isotope('layout');
            });
        });
    }

    // Landing
    /*$('.js-landing-cta').on('click', function () {
        $(this).hide(300)
        $('.sh-landing-pages__banner-desc').hide(300)
        $('.sh-landing-pages__optional-cta').hide(300)
        $('.sh-landing-pages__banner-full-desc').show(300)
        $('body').addClass('landing-pages-cta')

        let demo = $('.sh-demo_landing')
        demo.addClass('sh-demo--active')
    })

    let demo_landing = $('.sh-demo_landing')
    demo_landing.find('.sh-demo__close').on('click', function (e) {
        e.preventDefault();

        demo_landing.removeClass('sh-demo--active')

        $('.js-landing-cta').show(300)
        $('.sh-landing-pages__banner-desc').show(300)
        $('.sh-landing-pages__optional-cta').show(300)
        $('.sh-landing-pages__banner-full-desc').hide(300)
        $('body').removeClass('landing-pages-cta')
    });

    $('.js-landing-container').each(function () {
        let $this = $(this),
            item = $this.find('.js-landing-item'),
            margin = (document.documentElement.clientWidth - $this.outerWidth()) / 2,
            margin_internal  = ($this.width() - item.outerWidth()) / 2

        $this.css({
            'margin-left': margin + 'px',
            'margin-right': margin + 'px'
        })
        item.css({
            'margin-left': margin_internal + 'px',
            'margin-right': margin_internal + 'px'
        })

        $(window).on('resize', function () {
            $this.css({
                'margin-left': margin + 'px',
                'margin-right': margin + 'px'
            })
            item.css({
                'margin-left': margin_internal + 'px',
                'margin-right': margin_internal + 'px'
            })
        })
    })*/
    $('.js-landing-cta').on('click', function() {
        let $demo = $('.sh-demo_landing');
        $demo.addClass('sh-demo--active');
    });

    $('.sh-demo_landing .sh-demo__close').on('click', function(e) {
        e.preventDefault();
        $('.sh-demo_landing').removeClass('sh-demo--active');
    });

    // Focus input on gated landing page
    if ($('.sh-demo_landing').length) {
        $(".sh-demo_landing input[name='first_name']").focus();
    }

    // Blog
    let blog_cat = $('.js-blog-cat');
    blog_cat.select2({
        placeholder: 'Latest',
        minimumResultsForSearch: -1,
        dropdownAutoWidth: true,
        width: false
    });

    blog_cat.on('change', function(e) {
        document.location.href = $(this).val();
    });

    function stickyBlogImage() {
        let height = $('.sh-blog__sticky-wrapper').outerHeight();
        $('.sh-blog__sticky-img').css({
            width: height + 'px',
            height: height + 'px'
        });
    }
    stickyBlogImage();
    $(window).on('resize', function() {
        if ($('body').hasClass('blog')) {
            stickyBlogImage();
        }
    });
    // Numeric only control handler
    jQuery.fn.ForceNumericOnly = function() {
        return this.each(function() {
            $(this).keydown(function(e) {
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return (
                    key == 8 ||
                    key == 9 ||
                    key == 13 ||
                    key == 46 ||
                    key == 110 ||
                    key == 190 ||
                    (key >= 35 && key <= 40) ||
                    (key >= 48 && key <= 57) ||
                    (key >= 96 && key <= 105)
                );
            });
        });
    };
    $('input[type="tel"]').ForceNumericOnly();
    // $('.sh-resources__item').on('click', function(e) {
    //     e.preventDefault();
    //     e.stopPropagation();
    //     console.log($(this).attr('data-link'));
    //     return false;
    // });
    /* ------------ Deleting placeholder focus ------------ */
    /*let inputPlaceholder = $('input, textarea');
    inputPlaceholder.on('focus', function () {
        $(this).data('placeholder', $(this).attr('placeholder'));
        $(this).attr('placeholder', '')
    });

    inputPlaceholder.on('blur', function () {
        $(this).attr('placeholder', $(this).data('placeholder'))
    });*/
    /* ---------- End Deleting placeholder focus ---------- */
});
