<?php

/**
 * MFP Table Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$classes = '';
if (!empty($block['className'])) {
  $classes .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
  $classes .= sprintf(' align%s', $block['align']);
}


// [mfp-table category_id="1" display="10"]
// [ mfp-table category_id="1" display="10" read-more="yes" style="table/cards"]
// [mfp-table category_id="25" display="10" read_more="yes" in_row="4" style="cards"]



  $response = wp_remote_get('https://dev.theoffersjunction.com/wp-json/api/v1/category?api_cat_id=33');
  // var_dump($a['category_id'] );
  if (is_wp_error($response)) {
    return false; // Bail early
  }
  $body = wp_remote_retrieve_body($response);
  $datas = json_decode($body);
  // var_dump( $datas );
  if (!empty($datas)) {
    $in_row = get_field('number_of_cards');
    switch ($in_row) {
        case '2':
          $in_row_width = '400';
          break;
        case '3':
          $in_row_width = '350';
          break;
        case '4':
          $in_row_width = '250';
          break;
        case '5':
          $in_row_width = '210';
          break;
        case '6':
          $in_row_width = '170';
          break;
        case '7':
          $in_row_width = '140';
          break;
        case '8':
          $in_row_width = '120';
          break;
        default:
        $in_row_width = '250';
        break;
      }
   
    // var_dump($in_row);
    $html = '';
    
      $html .= '<style>
                            .scene {
                                height: 260px;
                                margin: 40px 0;
                                perspective: unset;
                                display: flex;
                                width: 100%;
                                flex-wrap: wrap;
                                max-width: 100%;
                                width: 100%;
                                height: 100%;
                                display: flex;
                                flex-direction: row;
                                justify-content: center;
                            }
                            
                            .mfp-casino-block.scene.scene--card .card_ {
                                transition: transform 0.6s;
                                transform-style: preserve-3d;
                                position: relative;
                                width: 100%;
                                max-width: ' . $in_row_width . 'px;
                                margin-right: 10px;
                                height: ' . get_theme_mod("mfp_cards_global_height", "330") . 'px;
                                margin-bottom: 10px;
                                margin-left: 10px;
                                flex-direction: column;
                            }
                            
                            .card_.is-flipped {
                                transform: rotateY(180deg);
                            }
                            
                            .card__face {
                                position: absolute;
                                width: 100%;
                                height: 100%;
                                color: #888;
                                text-align: center;
                                font-size: 14px;
                                -webkit-backface-visibility: hidden;
                                backface-visibility: hidden;
                                padding-right: 15px;
                                padding-left: 15px;
                                display: flex;
                                flex-direction: column;
                                background: ' . get_theme_mod("mfp_casino_cards_global_bg_color", "#ebebeb") . ';
                                box-shadow:
                                ' . get_theme_mod("mfp_cards_shadows_x", "0") . 'px
                                ' . get_theme_mod("mfp_cards_shadows_y", "1") . 'px
                                ' . get_theme_mod("mfp_cards_shadows_blur", "2") . 'px
                                ' . get_theme_mod("mfp_cards_shadows_Spread", "0") . 'px
                                ' . get_theme_mod("mfp_cards_shadow_color", "rgba(0,0,0,.3)") . ';
                                border-width: ' . get_theme_mod("mfp_cards_border_width", "1") . 'px;
                                border-color: ' . get_theme_mod("mfp_cards_border_color", "rgba(0,0,0,0.1)") . ';
                                border-style: solid;
                                border-radius: ' . get_theme_mod("mfp_cards_border_radius", "20") . 'px;
                            }
                            .card__face--back {
                                transform: rotateY(180deg);
                                color: #888;
                            }
                            .icon-info-wr{
                                text-align: right;
                                padding-right: 5px;
                                padding-top: 10px;
                                cursor: pointer;
                                margin-right: -10px;
                                margin-left: -10px;
                                margin-bottom: -10px;
                            }
                            .card_ figure {
                                margin: 0;
                                line-height: 0;
                            }
                            a.cards_play_now {
                                background-color: ' . get_theme_mod("mfp_casino_cards_button_bg_color", "#267aba") . ';
                                color: ' . get_theme_mod("mfp_casino_cards_button_text_color", "#f8f8f8") . ';
                                box-shadow: 0 1px 0 0 #c7c7c7, 0 4px 8px 0 rgba(0,0,0,.1);
                                width: 100%;
                                display: inline-block;
                                line-height: 46px;
                                cursor: pointer;
                                margin-top: 10px;
                                text-decoration: none;
                                font-size: ' . get_theme_mod("mfp_casino_cards_button_font_size", "26") . 'px;
                                font-weight: 400;
                                border-radius: 10px;
                                max-width: 190px;
                            }
                            a.cards_play_now:hover {
                                background: ' . get_theme_mod("mfp_casino_cards_button_bg_color_hover", "#65b6fa") . ';
                            }
                            span.number {
                                float: left;
                                border: 1px solid;
                                border-radius: 50%;
                                padding: 0px 7px;
                                margin-left: 5px;
                                border-color: #000;
                                font-size: 11px;
                            }
                            .mfp-casino-block.scene.scene--card {
                                max-width: ' . $width . ';
                                margin: 0 auto;
                                width: 100%;
                            }
                            
                            .mfp-casino-block-wrapper {
                                background: ' . $cards_bg_wrapper . ';
                                max-width: 100%;
                                width: 100%;
                                padding-block-start: 0.83em;
                                padding-block-end: 0.83em;
                                margin-block-start: 0.83em;
                                margin-block-end: 0.83em;
                            }
                            .card__details .review-link-a {
                            font-size: ' . get_theme_mod("mfp_cards_brand_name_font_size", "16") . 'px;
                            color: ' . get_theme_mod("mfp_cards_brand_name_color", "#267aba") . ';
                            font-weight: ' . get_theme_mod("mfp_cards_brand_name_font_weight", "700") . ';
                            text-decoration: none;
                            }
                            .card__value {
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                margin-top: 10px;
                                margin-bottom: 0px;
                                line-height: 27px;
                            }
                            .card__value span.card_bonus {
                            font-size: ' . get_theme_mod("mfp_cards_bonus_font_size", "36") . 'px;
                            font-weight: ' . get_theme_mod("mfp_cards_bonus_font_weight", "700") . ';
                            color: ' . get_theme_mod("mfp_cards_bonus_color", "#3f3f3f") . ';
                            }
                            span.t_c_apply {
                            font-size: ' . get_theme_mod("mfp_casino_cards_t_c_apply_font_size", "12") . 'px;
                            font-weight: ' . get_theme_mod("mfp_casino_cards_t_c_apply_font_weight", "300") . ';
                            display: block;
                            padding-top: 5px;
                            color: ' . get_theme_mod("mfp_casino_cards_t_c_apply_color", "#888") . ';
                            }
                            .cards__wrapper {
                            height: 100%;
                            display: flex;
                            flex-direction: column;
                            justify-content: space-between;
                            }
                            .play__now__wrapper {
                                padding-bottom: 15px;
                            }
                            span.card__free_spins{
                            font-size: ' . get_theme_mod("mfp_cards_free_spins_font_size", "16") . 'px;
                            font-weight: ' . get_theme_mod("mfp_cards_free_spins_font_weight", "700") . ';
                            display: block;
                            padding-top: 5px;
                            color: ' . get_theme_mod("mfp_cards_free_spins_color", "#3f3f3f") . ';
                            }
                            .card__details {
                                line-height: initial;
                            }
                            .card__face.card__face--back .card__value {
                            line-height: inherit;
                            font-size: 14px;
                            font-weight: bold;
                            padding-right: 5px;
                            padding-left: 5px;
                            }
                            .card__face.card__face--back .card__value {
                            margin-top: 0;
                            }
                            a.cards_read_reviews {
                            display: block;
                            font-size: ' . get_theme_mod("mfp_cards_review_link_font_size", "16") . 'px;
                            font-weight: bold;
                            text-decoration: none;
                            color:  ' . get_theme_mod("mfp_cards_review_link_color", "#267aba") . ';
                            }
                            @font-face {
                            font-family: "icomoon";
                            src:  url("' . get_template_directory_uri() . '/fonts/icomoon.eot?uew2");
                            src:  url("' . get_template_directory_uri() . '/fonts/icomoon.eot?uew2#iefix") format("embedded-opentype"),
                                url("' . get_template_directory_uri() . '/fonts/icomoon.ttf?uew2") format("truetype"),
                                url("' . get_template_directory_uri() . '/fonts/icomoon.woff?uew2") format("woff"),
                                url("' . get_template_directory_uri() . '/fonts/icomoon.svg?uew2#icomoon") format("svg");
                                font-weight: normal;
                                font-style: normal;
                                font-display: block;
                            }
                            [class^="icon-"], [class*=" icon-"] {
                            /* use !important to prevent issues with browser extensions that change fonts */
                            font-family: "icomoon" !important;
                            speak: never;
                            font-style: normal;
                            font-weight: normal;
                            font-variant: normal;
                            text-transform: none;

                            /* Better Font Rendering =========== */
                            -webkit-font-smoothing: antialiased;
                            -moz-osx-font-smoothing: grayscale;
                            }
                            .icon-info:before {
                            content: "\ea0c";
                            }
                            .icon-cancel-circle:before {
                            content: "\ea0d";
                            }
                            .icon-info-wr span {
                            color: ' . get_theme_mod("mfp_casino_rank_color", "#cacaca") . ';
                            }
                            .icon-info-wr span.__icon:hover, .icon-info-wr span.number:hover {
                            color: ' . get_theme_mod("mfp_casino_rank_color_hover", "#f00") . ';
                            transition: all .2s ease;
                            }
                            .icon-info-wr span.number {
                            font-size: 12px;
                            color:' . get_theme_mod("mfp_casino_rank_color", "#cacaca") . ';
                            font-weight: bold;
                            border: 3px solid;
                            padding: 0 5px;
                            height: 25px;
                            width: 25px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            }
                            .icon-info-wr span.__icon {
                            font-size: 23px;
                            }
                            .icon-info-wr {display: flex;align-items: center;justify-content: space-between;padding-top: 5px;}
                            .icon-info-wr.back {
                            justify-content: flex-end;
                            }
                            span.card_value_description {
                            font-size: ' . get_theme_mod("mfp_cards_default_info_font_size", "15") . 'px;
                            font-weight: ' . get_theme_mod("mfp_cards_default_info_font_weight", "700") . ';
                            color: ' . get_theme_mod("mfp_cards_default_info_color", "#888") . ';
                            }
                            .card__details figure img {
                            width: ' . get_theme_mod("mfp_cards_logo_desktop", "167") . 'px;
                            max-width: ' . get_theme_mod("mfp_cards_logo_desktop", "167") . 'px;
                            height: 79px;
                            }
                            @media(max-width: 1000px){
                                .card__details figure img {
                                width: ' . get_theme_mod("mfp_cards_logo_tablet", "167") . 'px;
                                max-width: ' . get_theme_mod("mfp_cards_logo_tablet", "167") . 'px;
                            }
                            .mfp-casino-block-wrapper {
                                width: unset;
                                max-width: unset;
                                margin-right: -0.83em;
                                margin-left: -0.83em;
                            }
                            }
                            @media(max-width: 550px){
                            .card__details figure img {
                                width: ' . get_theme_mod("mfp_cards_logo_mobile", "167") . 'px;
                                max-width: ' . get_theme_mod("mfp_cards_logo_mobile", "167") . 'px;
                            }
                            .mfp-casino-block.scene.scene--card .card_ {
                            max-width: 43%;
                        }
                        
                        .mfp-casino-block.scene.scene--card .card_ img {
                            max-width: 100%;
                            height: auto;
                        }
                        
                        a.cards_play_now {
                            font-size: 22px;
                        }
                        
                        .cards__wrapper {
                            padding-top: 15px;
                        }
                            }
            </style>';


      $html .= '
      <div class="mfp-casino-block-wrapper">
         <div class="mfp-casino-block scene scene--card">';
      foreach (array_slice($datas, 0, $display)  as $data) {
        $html .= '
            <div class="card_">
                <div class="card__face card__face--front">';
                $html .= '<div class="icon-info-wr">
                            <span class="number">' . $count . '</span>';
                $html .= '<span class="__icon icon-info"></span>';
                $html .= '</div>';
                
        $html .= '
        <div class="cards__wrapper">
          <div class="card__details">';
        // check if image is logo 1 or 2 from the customizer
            $html .= '
                <figure>
                <img width="' . get_theme_mod("mfp_cards_logo_mobile", "162") . '" height="79"
                          src="https://www.reputableonlinecasinos.ca/wp-content/uploads/2020/06/Jackpot-City-162x79-1.png"
                          />
              </figure>';
          $html .= '<span class="review-link-a">' . $data->name . '</span>';
        $html .= '</div>
                      <div class="card__value">';
            $html .= '<span class="card_bonus">$' . $data->bonus . '</span>';
                $html .= '<span class="card__free_spins">' . $data->free_spins . ' Free Spins</span>';
        $html .= '</div>
                      <div class="play__now__wrapper">
                        <a target="_blank" rel="nofollow" href="' . get_site_url() . '/visit/' . $data->visit_url . '/" class="cards_play_now">' . get_theme_mod('play_now_button_text', 'Play Now') . '</a>
                        <span class="t_c_apply">T&Cs Apply</span>
                      </div>
                   </div>
                </div>';
      
          $html .= ' <div class="card__face card__face--back">
                 <div class="icon-info-wr back">
                   <span class="__icon icon-cancel-circle"></span>
                 </div>
                 <div class="cards__wrapper">
                     <div class="card__details">';
                    $html .= '
                          <figure>
                          <img height="79" width="' . get_theme_mod("mfp_cards_logo_mobile", "162") . '" 
                          src="https://www.reputableonlinecasinos.ca/wp-content/uploads/2020/06/Jackpot-City-162x79-1.png"
                          />
                        </figure>';
                    $html .= '
                     </div>
                     <div class="card__value">
                         <span class="card_value_description">' . $data->default_info . '</span>
                     </div>
                     <div class="play__now__wrapper">
                       <img style="max-width: 100px; width: 100%;" src="https://upload.wikimedia.org/wikipedia/commons/a/ae/5_stars.svg">';
                    $html .= '<a href="' . $data->review_url . '" class="cards_read_reviews">' . get_theme_mod('mfp_cards_review_link_text', 'Read Review') . '</a>';
                    $html .= '</div>
                        </div>
                    </div>';
       
        $html .= '</div>';
       
      }
      $html .= '</div></div>
      
      <script>
        const cards = document.querySelectorAll(".icon-info-wr");

        function flipCard() {
            this.parentElement.parentElement.classList.toggle("is-flipped");
        }
        cards.forEach((card) => card.addEventListener("click", flipCard));
    </script>';
    } 
    echo $html;