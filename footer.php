<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mediafairplay
 */

?>

<footer>
    <?php $last_modifited_toggle = get_theme_mod('mfp_header_Last_Modifited_toggle', 0); ?>
    <?php if ($last_modifited_toggle) : ?>
        <style>
            .last-update {
                background: <?php echo get_theme_mod('last_mod_bg', '#000'); ?>;
                max-width: 1200px;
                margin: 0 auto;
                padding-right: 0.83em;
                padding-left: 0.83em;
                padding-top: 0.83em;
                padding-bottom: 0.83em;
                margin-bottom: 10px;
                color: <?php echo get_theme_mod('last_mod_txt_color', '#fff'); ?>;
                font-size: <?php echo get_theme_mod('last_mod_font_size', '15'); ?>px;
            }
        </style>
        <section class="last-update-wrapper">
            <div class="last-update">
                <?php echo '<span> Last Modified: </span>'; ?>
                <?php echo '<time>' . get_the_modified_date() . '</time>'; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php
    /* if (!is_active_sidebar('mfp-footer-1')) {
    return;
}
if (!is_active_sidebar('mfp-footer-2')) {
    return;
}
if (!is_active_sidebar('mfp-footer-3')) {
    return;
} */
    // check if any of the widgets is active, even if one is active - show
    if (is_active_sidebar('mfp-footer-1')  || is_active_sidebar('mfp-footer-2') || is_active_sidebar('mfp-footer-3')) { ?>
        <style>
            section#wrapper-widget-footer {
                background-color: <?php echo get_theme_mod('mfp_footer_bg_color', '#728d9e'); ?>;
                color: <?php echo get_theme_mod('mfp_footer_text_color', '#fff') ?>;
            }

            section#wrapper-widget-footer h1,
            section#wrapper-widget-footer h2,
            section#wrapper-widget-footer h3,
            section#wrapper-widget-footer h4,
            section#wrapper-widget-footer h5,
            section#wrapper-widget-footer h6 {
                color: <?php echo get_theme_mod('mfp_footer_titles_color', '#728d9e'); ?>;
                font-size: <?php echo get_theme_mod('mfp_footer_titles_font_size', '25'); ?>px;
            }

            section#wrapper-widget-footer a {
                color: <?php echo get_theme_mod('mfp_footer_link_color', '#fff'); ?>;
            }

            section#wrapper-widget-footer a:hover {
                color: <?php echo get_theme_mod('mfp_footer_link_h_color', 'blue'); ?>;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside {
                <?php
                $footer_footer_width = get_theme_mod('footer_container_width', 'default');
                if ($footer_footer_width == 'default') :  ?>max-width: <?php echo get_theme_mod('site_content_width', '1200'); ?>px;
                <?php elseif ($footer_footer_width == 'container') : ?>max-width: <?php echo get_theme_mod('footer_container_container_width', '1200'); ?>px;
                <?php elseif ($footer_footer_width == 'full_width') : ?>max-width: 100%;
                <?php endif; ?>width: 100%;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                padding: 25px 0;
                padding-right: 0.83em;
                padding-left: 0.83em;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside li {
                list-style: none;
                margin: 0;
            }

            .footer-widget-wrapper-inside li h2 {
                margin-top: 0;
                margin-bottom: 0;
            }

            .footer-widget-wrapper-inside li ul {
                padding-inline-start: 0;
                margin-left: 0;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside div {
                max-width: 100%;
                width: 100%;
                color: #fff;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside li a {
                text-decoration: none;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside li .menu-footer-container ul#menu-footer {
                padding-inline-start: 0;
            }

            @media(max-width: 1000px) {
                section#wrapper-widget-footer .footer-widget-wrapper-inside {
                    flex-direction: column;
                    padding-right: 10px;
                    padding-left: 10px;
                }

                section#wrapper-widget-footer .footer-widget-wrapper-inside .third-footer-widget-wrapper {
                    text-align: left;
                }

            }
        </style>
        <section id="wrapper-widget-footer" class="wrapper-widget-footer">
            <div class="footer-widget-wrapper-inside">
                <?php if (is_active_sidebar('mfp-footer-1')) : ?>
                    <div class="first-footer-widget-wrapper">
                        <?php dynamic_sidebar('mfp-footer-1'); ?>
                    </div>
                <?php endif;    ?>
                <?php if (is_active_sidebar('mfp-footer-2')) : ?>
                    <div class="second-footer-widget-wrapper">
                        <?php dynamic_sidebar('mfp-footer-2'); ?>
                    </div>
                <?php endif;    ?>
                <?php if (is_active_sidebar('mfp-footer-3')) : ?>
                    <div class="third-footer-widget-wrapper">
                        <?php dynamic_sidebar('mfp-footer-3'); ?>
                    </div>
                <?php endif;    ?>
            </div>


        </section>

    <?php } ?>

    <?php if (is_active_sidebar('mfp-copyrights-footer')  || is_active_sidebar('mfp-copyrights-footer-2')) : ?>


        <style>
            .footer-copyrights-wrapper {
                background: <?php echo get_theme_mod('mfp_footer_bar_bg_color', '#000'); ?>;
                padding: 30px 5px;
            }

            .footer-copyrights {
                <?php
                $footer_width = get_theme_mod('footer_bar_container_width', 'default');

                if ($footer_width == 'default') :  ?>max-width: <?php echo get_theme_mod('site_content_width', '1200'); ?>px;
                <?php elseif ($footer_width == 'container') : ?>max-width: <?php echo get_theme_mod('footer_bar_container_container_width', '1200'); ?>px;
                <?php elseif ($footer_width == 'full_width') : ?>max-width: 100%;
                <?php endif; ?>margin: 0 auto;
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                padding-right: 0.83em;
                padding-left: 0.83em;
                color: <?php echo get_theme_mod('mfp_footer_bar_text_color', '#fff'); ?>;
            }

            .footer-copyrights h1,
            .footer-copyrights h2,
            .footer-copyrights h3,
            .footer-copyrights h4,
            .footer-copyrights h5,
            .footer-copyrights h6 {
                color: <?php echo get_theme_mod('mfp_footer_bar_title_color', '#fff'); ?>;
                font-size: <?php echo get_theme_mod('mfp_footer_bar_title_font_size', '25'); ?>px;
            }

            .footer-copyrights a {
                color: <?php echo get_theme_mod('mfp_footer_bar_link_color', '#fff'); ?>
            }

            .footer-copyrights a:hover {
                color: <?php echo get_theme_mod('mfp_footer_bar_h_link_color', 'blue'); ?>
            }

            .footer-copyrights li {
                list-style: none;
                margin: 0 5px;
                max-width: 100%;
                width: 100%;
            }

            .footer-copyrights li p {
                margin: 0;
            }

            .first-footer-wrapper {
                background-color: #b71c1c;
            }

            .footer-copyrights-wrapper .footer-copyrights li ul {
                padding-inline-start: 0;
                padding-inline-end: 0;
                margin-left: 0;
            }

            .first-footer-wrapper .first-footer {
                width: 100%;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .first-footer-wrapper .first-footer ul {
                list-style: none;
            }

            <?php $footer_first_inner = get_theme_mod('mfp_footer_bar_column_width', 70); ?>.footer-copyrights .footer-copyrights-inner.first {
                width: <?php echo $footer_first_inner; ?>%;
                max-width: <?php echo $footer_first_inner; ?>%;
                height: auto;
                margin-right: 15px;
            }

            <?php
            $final_inner_width = 100;
            $final_inner_width -= $footer_first_inner;
            ?>.footer-copyrights-inner.sec {
                margin-left: 15px;
                width: <?php echo $final_inner_width; ?>%;
                max-width: <?php echo $final_inner_width; ?>%;
            }
        
            @media(max-width: <?php echo get_theme_mod('site_content_width', '1200'); ?>px) {
                .footer-copyrights {
                    flex-direction: column;
                }

                .footer-copyrights .footer-copyrights-inner.first,
                .footer-copyrights .footer-copyrights-inner.sec {
                    max-width: 100%;
                    width: 100%;
                    margin: 0;
                }

                .footer-copyrights>li:last-child {
                    align-items: baseline;
                }
            }
        </style>

        <div class="footer-copyrights-wrapper">
            <div class="footer-copyrights">
                <?php if (is_active_sidebar('mfp-copyrights-footer')) : ?>
                    <div class="footer-copyrights-inner first">
                        <?php dynamic_sidebar('mfp-copyrights-footer'); ?>
                    </div>
                <?php endif;  ?>
                <?php if (is_active_sidebar('mfp-copyrights-footer-2')) : ?>
                    <div class="footer-copyrights-inner sec">
                        <?php dynamic_sidebar('mfp-copyrights-footer-2'); ?>
                    </div>
                <?php endif;  ?>

            </div>

        </div>

    <?php endif; ?>
</footer>

<!-- Footer End -->
</div>
<!-- Page End -->
<?php if (get_theme_mod('display_indicator', 1)) : ?>
    <style>
        html .indicator,
        body .indicator {
            position: fixed;
            display: block;
            background-color: <?php echo get_theme_mod('indicator_bg', '#d6d35d') ?>;
            height: 5px;
            top: 0;
            z-index: 99;
        }
    </style>
    <div class="indicator"></div>
    <script>
        var body = document.body;
        var html = document.documentElement;

        var height = 0;
        var h = 0;

        var initiateHeights = function() {
            height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
            h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
            // console.log("heights were initialised:", height, h);
        }

        initiateHeights();

        var resize = function(e) {
            var scrolled = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
            height > 0 ? e[0].style.width = scrolled / (height - h) * 100 + "%" : e.style.width = 0 + "%";
        }

        document.onscroll = function() {
            resize(document.getElementsByClassName("indicator"));
        };

        window.onresize = function() {
            initiateHeights();
        }
    </script>
<?php endif; ?>
<?php
// $blocks = parse_blocks( $post->post_content );
// print_r($blocks);
// Use || instead
// this code check if the MFP TABLE Short code is exist. we need to change the block from shortcode to mfp tables block etc. do it after you developed the code
$default_info_show_ = get_theme_mod('mfp_cards_default_info_toggle', 1);
if ( $default_info_show_ ): 
if (has_block('core/shortcode')) : ?>
    <script>
        const cards = document.querySelectorAll(".icon-info-wr");

        function flipCard() {
            this.parentElement.parentElement.classList.toggle("is-flipped");
        }
        cards.forEach((card) => card.addEventListener("click", flipCard));
    </script>
<?php endif; ?>
<?php endif; ?>
<?php wp_footer(); ?>

<?php if (get_theme_mod('mfp_enable_back_to_top')) : ?>
    <!-- begin Back to Top button -->
    <style>
        /* begin begin Back to Top button  */

        .back_to_top {
            position: fixed;
            bottom: <?php echo get_theme_mod('back_to_top_position_bottom', '80') ?>px;
            <?php echo get_theme_mod('back_to_top_position', 'right'); ?>: <?php echo get_theme_mod('back_to_top_position_sides', '40') ?>px;
            z-index: 9999;
            width: <?php echo get_theme_mod('back_to_top_width', '40') ?>px;
            height: <?php echo get_theme_mod('back_to_top_height', '40') ?>px;
            text-align: center;
            line-height: <?php echo get_theme_mod('back_to_top_height', '30') ?>px;
            background-color: <?php echo get_theme_mod('mfp_back_to_top_background_color', '#000000') ?>;
            color: <?php echo get_theme_mod('mfp_back_to_top_text_color', '#ffffff') ?>;
            cursor: pointer;
            border-radius: <?php echo get_theme_mod('mfp_back_to_top_radius', '2') ?>px;
            display: none;
        }

        .back_to_top:hover {
            background-color: <?php echo get_theme_mod('mfp_back_to_top_hover_background_color', '#111111') ?>;
            color: <?php echo get_theme_mod('mfp_back_to_top_text_color', '#ffffff') ?>;
        }

        .back_to_top-show {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <a class="back_to_top" title="Back To Top">&#8593;</a>
    <!-- end Back to Top button -->

    <!-- START Back To Top script-->
    <?php
    // back to top speed
    $speed = get_theme_mod('back_to_top_speed', '35');
    ?>
    <script>
        /* begin begin Back to Top button  */
        (function() {
            'use strict';

            function trackScroll() {
                var scrolled = window.pageYOffset;
                var coords = document.documentElement.clientHeight;

                if (scrolled > coords) {
                    goTopBtn.classList.add('back_to_top-show');
                }
                if (scrolled < coords) {
                    goTopBtn.classList.remove('back_to_top-show');
                }
            }

            function backToTop() {
                if (window.pageYOffset > 0) {
                    window.scrollBy(0, -<?php echo $speed; ?>);
                    setTimeout(backToTop, 0);
                }
            }

            var goTopBtn = document.querySelector('.back_to_top');

            window.addEventListener('scroll', trackScroll);
            goTopBtn.addEventListener('click', backToTop);
        })();
        /* end begin Back to Top button  */
    </script>
    <!-- END Back To Top script-->
<?php endif; ?>

<!-- <style>

          #news-signup{
              position: fixed;
              width: 100%;
              visibility: hidden;
              z-index: 10002;
              top: 100px;
              opacity: 0;
              -webkit-transform: scale(0.5);
              transform: scale(0.5);
              -webkit-transition: -webkit-transform 0.2s, opacity 0.2s, visibility 0s 0.2s;
              transition: transform 0.2s, opacity 0.2s, visibility 0s 0.2s;
          }
          #news-signup .wrapper {
              /*background: #252b33;*/
              background: #948E99; 
              background: -webkit-linear-gradient(to left, #252b33 , #2E1437);
              background: linear-gradient(to left, #252b33 , #2E1437);
              position: relative;
              margin: 0 auto;
              text-align: center;
              -moz-border-radius: 3px;
              box-shadow: 0px 1px 10px rgba(0,0,0,0.5);
              width: 98%
          }
          #news-signup_bg {
               visibility: hidden;
               position: fixed;
               top: 0;
               left: 0;
               width: 100%;
               height: 100%;
               background-color: #ffffff;
               opacity: 0.4;
               z-index: 10001;
           }
          #news-signup_close {
              position: absolute;
              left: 100%;
              margin: 7px 0 0 -30px;
              width: 20px;
              height: 20px;
              color: #fff;
              opacity:0.3;
              cursor: pointer;
          }

          #news-signup_close::before {
              content: "×";
              font: 400 26px/1em 'Roboto Slab', serif;
          }

          #news-signup_close:hover {
              opacity:0.8;
          }

          #news-signup .newsletter-content {
              padding: 100px 3px;
              margin: 0 auto
          }
          #news-signup .newsletter-content h2 {
               font: 300 24px/1em 'Roboto Slab', serif;
              color: #fff;
              text-align: center;
              margin: 0 auto 15px
          }
          #news-signup .newsletter-content p {
              margin: 0 auto 25px;
              font: 300 16px/1em 'Roboto Slab', serif;
              color: #7e8890
          }
          #news-signup .newsletter-content form {
              margin: 0;
              padding: 0;
              width: 90%;
          }

          #news-signup .newsletter-content form p {
              margin: 0 auto 10px
          }

          #news-signup .newsletter-content form p:not(.button) {
              float: none;
              width: 100%;
          }

          #news-signup .newsletter-content form p:not(.button) input {
              width: 100%;
              margin: 0;
              padding: 12px 15px !important;
              border-color: #d0d5d8
          }

          #news-signup .newsletter-content form .button {
              float: none;
              width: 100%
          }

          #news-signup .newsletter-content form .button input {
              width: 100%;
              padding: 20px 25px 18px !important;
              font-size: 12px
          }

          #news-signup .newsletter-content p.footnote {
              filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=50);
              opacity: 0.8;
              font: 100 11px 'Roboto Slab', serif;
              color: #abb0b7;
              margin-bottom: 0
          }

          @media screen and (min-width: 800px){
              #news-signup .wrapper {
                  width: 800px;
                  margin: 7% auto;
              }
          }


</style>
 
  <div id="news-signup">
    <div class="wrapper">
      <div id="news-signup_close"></div>
      <div class="newsletter-content" id="phplistsubscriberesult">
        <h3>We Have A special offer for you</h3>

        <h2> 200 pokies in Jackpot City !</h2>
        <p class="footnote">Give it a try. It only takes a click to unsubscribe.</p>
      </div>
    </div>
  </div>
 

 <script>
 window.bioEp = {
  // Private variables
  bgEl: {},
  popupEl: {},
  closeBtnEl: {},
  shown: false,
  overflowDefault: "visible",

  // Popup options
  html: "",
  css: "",
  fonts: [],
  delay: 2,
  showOnDelay: false,
  cookieExp: 30,

  // Object for handling cookies, taken from QuirksMode
  // https://www.quirksmode.org/js/cookies.html
  cookieManager: {
    // Create a cookie
    create: function(name, value, days) {
      var expires = "";

      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
      }

      document.cookie = name + "=" + value + expires + "; path=/";
    },

    // Get the value of a cookie
    get: function(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(";");

      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
      }

      return null;
    },

    // Delete a cookie
    erase: function(name) {
      this.create(name, "", -1);
    }
  },

  // Handle the bioep_shown cookie
  // If present and true, return true
  // If not present or false, create and return false
  checkCookie: function() {
    // Handle cookie reset
    if (this.cookieExp <= 0) {
      this.cookieManager.erase("bioep_shown");
      return false;
    }

    // If cookie is set to true
    if (this.cookieManager.get("bioep_shown") == "true")
      return true;

    // Otherwise, create the cookie and return false
    this.cookieManager.create("bioep_shown", "true", this.cookieExp);

    return false;
  },

  // Add font stylesheets and CSS for the popup
  addCSS: function() {
    // Add font stylesheets
    for (var i = 0; i < this.fonts.length; i++) {
      var font = document.createElement("link");
      font.href = this.fonts[i];
      font.type = "text/css";
      font.rel = "stylesheet";
      font.rel = "stylesheet";
      document.head.appendChild(font);
    }

  },

  // Add the popup to the page
  addPopup: function() {
    // Add the background div
    this.bgEl = document.createElement("div");
    this.bgEl.id = "news-signup_bg";
    document.body.appendChild(this.bgEl);

    // Add the popup
    if (document.getElementById("news-signup"))
      this.popupEl = document.getElementById("news-signup");
    else {
      this.popupEl = document.createElement("div");
      this.popupEl.id = "news-signup";
      this.popupEl.innerHTML = this.html;
      document.body.appendChild(this.popupEl);
    }
  },

  // Show the popup
  showPopup: function() {
    if (this.shown) return;

    this.bgEl.style.visibility = "visible";
    this.popupEl.style.visibility = "visible";
    this.popupEl.style.opacity = "1";
    this.popupEl.style.transform = "scale(1)";
    this.popupEl.style.webkitTransform = "scale(1)";
    this.popupEl.style.transition = "0.4s, opacity 0.4s";
    this.popupEl.style.webkitTransform = "0.4s, opacity 0.4s";
    
    // Save body overflow value and hide scrollbars
    this.overflowDefault = document.body.style.overflow;
    document.body.style.overflow = "hidden";

    this.shown = true;
  },

  // Hide the popup
  hidePopup: function() {
    this.bgEl.style.visibility = "hidden";
    this.popupEl.style.visibility = "hidden";
    this.popupEl.style.opacity = "0";
    this.popupEl.style.transform = "scale(0.5)";
    this.popupEl.style.webkitTransform = "scale(0.5)";
    this.popupEl.style.transition = "0.2s, opacity 0.2s, visibility 0s 0.2s";
    this.popupEl.style.webkitTransform = "0.2s, opacity 0.2s, visibility 0s 0.2s";
    document.body.style.overflow = this.overflowDefault;
  },

  // Event listener initialisation for all browsers
  addEvent: function(obj, event, callback) {
    if (obj.addEventListener)
      obj.addEventListener(event, callback, false);
    else if (obj.attachEvent)
      obj.attachEvent("on" + event, callback);
  },

  // Load event listeners for the popup
  loadEvents: function() {
    // Track mouseout event on document
    this.addEvent(document, "mouseout", function(e) {
      e = e ? e : window.event;
      var from = e.relatedTarget || e.toElement;

      // Reliable, works on mouse exiting window and user switching active program
      if (!from || from.nodeName === "HTML")
        bioEp.showPopup();
    });

    // Handle the popup close button
    this.closebtn = document.getElementById("news-signup_close");
    this.addEvent(this.closebtn, "click", function() {
      bioEp.hidePopup();
    });
  },

  // Set user defined options for the popup
  setOptions: function(opts) {
    this.html = (typeof opts.html === 'undefined') ? this.html : opts.html;
    this.css = (typeof opts.css === 'undefined') ? this.css : opts.css;
    this.fonts = (typeof opts.fonts === 'undefined') ? this.fonts : opts.fonts;
    this.delay = (typeof opts.delay === 'undefined') ? this.delay : opts.delay;
    this.showOnDelay = (typeof opts.showOnDelay === 'undefined') ? this.showOnDelay : opts.showOnDelay;
    this.cookieExp = (typeof opts.cookieExp === 'undefined') ? this.cookieExp : opts.cookieExp;
  },

  // Ensure the DOM has loaded
  domReady: function(callback) {
    (document.readyState === "interactive" || document.readyState === "complete") ? callback(): this.addEvent(document, "DOMContentLoaded", callback);
  },

  // Initialize
  init: function(opts) {
    // Handle options
    if (typeof opts !== 'undefined')
      this.setOptions(opts);

    // Add CSS here to make sure user HTML is hidden regardless of cookie
    // this.addCSS();

    // Once the DOM has fully loaded
    this.domReady(function() {
      // Handle the cookie
      if (bioEp.checkCookie()) return;

      // Add the popup
      bioEp.addPopup();

      // Load events
      setTimeout(function() {
        bioEp.loadEvents();

        if (bioEp.showOnDelay)
          bioEp.showPopup();
      }, bioEp.delay * 1000);
    });
  }
}

window.onload = function() {
  document.getElementById("news_signup_email").focus();
};

bioEp.init({
              //fonts: ['https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300'],
              cookieExp: 0
          });

</script> -->
<!-- <a href="#" id="get_it">Click me </a>
<script>
const b = document.querySelector("#get_it");
b.onclick = fire;
console.log( b );
function fire(e){
    e.preventDefault();
    fetch( 'https://dev.theoffersjunction.com/wp-json/api/v1/category?api_cat_id=31' )
        .then(response => {
            return response.json();
        })
        .then( users => {
            console.log(users);
        })
} -->

<!--  window.addEventListener('load', function (e) {
    e.preventDefault();
    fetch( 'https://dev.theoffersjunction.com/wp-json/api/v1/category?api_cat_id=31' )
        .then(response => {
            return response.json();
        })
        .then( users => {
            console.log(users);
        })
}); 
    
</script> -->
</body>

</html>