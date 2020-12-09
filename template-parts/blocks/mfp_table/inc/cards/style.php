<?php

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
        max-width: '.$card_width.'px;
        height: ' .$card_hight. 'px;
        margin-bottom: 10px;
        margin-right: '.$space_between_cards.'px;
        margin-left: '.$space_between_cards.'px;
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
        background: ' .$card_background_color. ';
        box-shadow:
            ' . get_theme_mod("mfp_cards_shadows_x", "0") . 'px ' . get_theme_mod("mfp_cards_shadows_y", "1") . 'px ' . get_theme_mod("mfp_cards_shadows_blur", "2") . 'px ' . get_theme_mod("mfp_cards_shadows_Spread", "0") . 'px ' . get_theme_mod("mfp_cards_shadow_color", "rgba(0,0,0,.3)") . ';
        border-width: '.$card_stroke.'px;
        border-color: '.$card_border_color.';
        border-style: solid;
        border-radius: '.$card_radius.'px;
        padding-bottom: 10px;
    }

    .card__face--back {
        transform: rotateY(180deg);
        color: #888;
    }

    .icon-info-wr {
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
        background-color:'.$play_now_background_color.';
        color: ' .$play_now_text_color. ';
        box-shadow: 0 1px 0 0 #c7c7c7, 0 4px 8px 0 rgba(0, 0, 0, .1);
        width: 100%;
        display: inline-block;
        line-height: 46px;
        cursor: pointer;
        margin-top: 10px;
        text-decoration: none;
        font-size: ' .$play_now_font_size.'px;
        font-weight: 400;
        border-radius: 10px;
        max-width: 190px;
    }

    a.cards_play_now:hover {
        background: ' .$play_now_hover_background_color. ';
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

    span.card__free_spins {
        font-size: '.$fs_font_size.'px;
        font-weight: '.$fs_font_weight.';
        display: block;
        color: #3f3f3f;
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
        color: #cacaca;
    }

    .icon-info-wr span.__icon:hover,
    .icon-info-wr span.number:hover {
        color:#f00;
        transition: all .2s ease;
    }

    .icon-info-wr span.number {
        font-size: '.$rank_size.'px;
        color: #cacaca;
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

    .icon-info-wr {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 5px;
    }

    .icon-info-wr.back {
        justify-content: flex-end;
    }

    span.card_value_description {
        font-size:15px;
        font-weight:700;
        color:#888;
    }
    .cards__wrapper figure img {
        width: '.$logo_size_desktop.'px;
        max-width:'.$logo_size_desktop.'px;
        height: 79px;
    }
    span.card_bonus{
        font-size: '.$bn_font_size.'px;
        font-weight: '.$bn_font_weight.';
        color: '.$bn_text_color.';
    }
    @media(max-width: 1000px) {
        .cards__wrapper figure img {
            width: '.$logo_size_tablet.'px;
            max-width:'.$logo_size_tablet.'px;
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
            width: '.$logo_size_mobile.'px;
            max-width:'.$logo_size_mobile.'px;
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