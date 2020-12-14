<?php
if ($card_drop_shadow) {
    $card_drop_shadow = 'box-shadow: 0px 1px 2px 1px rgba(0,0,0,.3);';
} else {
    $card_drop_shadow = '';
}
if ($allow_flip) {
    $allow_flip = 'cursor: pointer;';
}
if( $play_now_button_drop_shadow ){
    $play_now_button_drop_shadow = 'box-shadow: 0 1px 0 0 #c7c7c7, 0 4px 8px 0 rgba(0, 0, 0, .1);';
}else{
    $play_now_button_drop_shadow = 'box-shadow: none;';
}
$html .= '<style>
@charset "UTF-8";
:root {
  --star-size: 30px;
  --star-color: #000;
  --star-background: '.$rating_text_color.';
}

.Stars {
  --percent: calc(var(--rating) / 5 * 100%);
  display: inline-block;
  font-size: var(--star-size);
  font-family: Times;
  line-height: 1;
}
.Stars::before {
  content: "★★★★★";
  letter-spacing: 3px;
  background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
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
        max-width: ' . $card_width . 'px;
        height: ' . $card_hight . 'px;
        margin-bottom: 10px;
        margin-right: ' . $space_between_cards . 'px;
        margin-left: ' . $space_between_cards . 'px;
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
        background: ' . $card_background_color . ';
       ' . $card_drop_shadow . '
        border-width: ' . $card_stroke . 'px;
        border-color: ' . $card_border_color . ';
        border-style: solid;
        border-radius: ' . $card_radius . 'px;
        padding-bottom: 10px;
        padding-top: 10px;
    }

    .card__face--back {
        transform: rotateY(180deg);
        color: #888;
    }

    .icon-info-wr {
        text-align: right;
        padding-right: 5px;
        ' . $allow_flip . '
        margin-right: -10px;
        margin-left: -10px;
        margin-bottom: -10px;
        
    }

    .card_ figure {
        margin: 0;
        line-height: 0;
        margin-top: '.$card_logo_space_top.'px;
        margin-bottom: '.$card_logo_space_bottom.'px;
    }
    .card_description{
        color: '.$dd_text_color.';
        font-size: '.$dd_font_size.'px;
        font-weight: '.$dd_font_weight.';
        margin-top: '.$card_dd_space_top.'px;
        margin-bottom: '.$card_dd_space_bottom.'px;
    }
    .play__now__wrapper {
        text-align: center;
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: center;
        margin-top: '.$card_play_now_space_top.'px;
        margin-bottom: '.$card_play_now_space_bottom.'px;
    }
    a.cards_play_now {
        background-color:' . $play_now_background_color . ';
        color: ' . $play_now_text_color . ';
        '.$play_now_button_drop_shadow.'
        width: 100%;
        line-height: 46px;
        cursor: pointer;
        text-decoration: none;
        font-size: ' . $play_now_font_size . 'px;
        font-weight: 400;
        border-radius: '.$play_now_button_radius.'px;
        max-width: '.$play_now_button_width.'px;
        min-height: '.$play_now_button_height.'px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    a.cards_play_now:hover {
        background: ' . $play_now_hover_background_color . ';
    }

  
    span.review_link_wrapper a {
        font-size: '.$review_link_font_size.'px;
        color: '.$review_link_text_color.';
        margin-top: '.$card_review_link_space_top.'px;
        margin-bottom: '.$card_review_link_space_bottom.'px;
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
    }
    .card__face.card__face--front .cards__wrapper{
        justify-content: '.$front_card_align_items.';
    }
    .card__face.card__face--back .cards__wrapper{
        justify-content: '.$back_card_align_items.';
    }

    span.card__free_spins {
        font-size: ' . $fs_font_size . 'px;
        font-weight: ' . $fs_font_weight . ';
        display: block;
        color: '.$fs_text_color.';
        margin-top: '.$card_fs_space_top.'px;
        margin-bottom: '.$card_fs_space_bottom.'px;
    }
    .rating-wrapper {
        margin-top: '.$card_rating_space_top.'px;
        margin-bottom: '.$card_rating_space_bottom.'px;
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
        font-size: 16px;
        font-weight: bold;
        text-decoration: none;
        color:#267aba;
    }

    @font-face {
        font-family: "icomoon";
        src: url("' . get_template_directory_uri() . '/fonts/icomoon.eot?uew2");
        src: url("' . get_template_directory_uri() . '/fonts/icomoon.eot?uew2#iefix") format("embedded-opentype"),
            url("' . get_template_directory_uri() . '/fonts/icomoon.ttf?uew2") format("truetype"),
            url("' . get_template_directory_uri() . '/fonts/icomoon.woff?uew2") format("woff"),
            url("' . get_template_directory_uri() . '/fonts/icomoon.svg?uew2#icomoon") format("svg");
        font-weight: normal;
        font-style: normal;
        font-display: block;
    }

    [class^="icon-"],
    [class*=" icon-"] {
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
        color: ' . $card_rank_flip_color . ';
        font-size: ' . $rank_size . 'px;
    }

    .icon-info-wr span.__icon:hover,
    .icon-info-wr span.number:hover {
        color:' . $card_rank_flip_hover_color . ';
        transition: all .2s ease;
    }

    .icon-info-wr span.number {
        float: left;
        font-size: 11px;
        font-size: ' . $rank_size . 'px;
        color: ' . $card_rank_flip_color . ';
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 5px;
    }
    
    .icon-info-wr {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0px;
    }

    .icon-info-wr.back {
        justify-content: flex-end;
    }
    .icon-info-wr.special {
        background: '.$special_flag_background_color.';
        margin-right: -15px;
        margin-left: -15px;
        margin-top: -10px;
        padding-top: 6px;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        display: block;
        align-items: center;
        color: '.$special_flag_text_color.';
    }
    
    .special_flag_wrapper {
        font-size: 21px;
        display: block;
        justify-content: center;
        align-items: center;
        height: 100%;
        text-align: center;
    }
    span.card_value_description {
        font-size:15px;
        font-weight:700;
        color:#888;
    }
    .cards__wrapper figure img {
        width: ' . $logo_size_desktop . 'px;
        max-width:' . $logo_size_desktop . 'px;
        height: 79px;
    }
    span.card_bonus{
        font-size: ' . $bn_font_size . 'px;
        font-weight: ' . $bn_font_weight . ';
        color: ' . $bn_text_color . ';
        margin-top:'.$card_bonus_space_top.'px;
        margin-bottom:'.$card_bonus_space_bottom.'px;;
    }
    .card__face.special {
        border-color: '.$special_flag_background_color.';
    }
    @media(max-width: 1000px) {
        .cards__wrapper figure img {
            width: ' . $logo_size_tablet . 'px;
            max-width:' . $logo_size_tablet . 'px;
        }

        .mfp-casino-block-wrapper {
            width: unset;
            max-width: unset;
            margin-right: -0.83em;
            margin-left: -0.83em;
        }
    }
    @media(max-width: 550px) {
        .cards__wrapper figure img {
            width: ' . $logo_size_mobile . 'px;
            max-width:' . $logo_size_mobile . 'px;
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
