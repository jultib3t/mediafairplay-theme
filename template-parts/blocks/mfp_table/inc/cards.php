<?php
$siteID = get_theme_mod('connect_your_site_to_aff_wiz');
$geoID = get_theme_mod('connect_your_site_to_aff_wiz_id');
$list = wp_remote_get("https://app.aff-wiz.com/wp-json/api/v1/get_site_table?website_id={$siteID}&geo_id={$geoID}&category_id={$categoryID}");
// var_dump($a['category_id'] );
if (is_wp_error($list)) {
  return false; // Bail early
}
$list = wp_remote_retrieve_body($list);
$datas = json_decode($list);
/// var_dump($datas->data);
$datas = $datas->data;

uasort($datas, function ($item1, $item2) {
  return $item1->readingOrder <=> $item2->readingOrder;
});

$withstring = [];
foreach ($datas as $value) {
  if( is_string($value->readingOrder) ){
    $withstring[] = $value;
  }
}
$nostring = [];
foreach ($datas as $value) {
  if( !is_string($value->readingOrder) ){
    $nostring[] = $value;
  }
}
$datas = array_merge($withstring,$nostring);
 // print_r($datas);


$show_logo = get_field('show_logo');
$review_link = get_field('review_link');
$review_link_text = get_field('review_link_text');
$review_link_size = get_field('review_link_size');
$card_drop_shadow = get_field('card_drop_shadow');
$allow_flip = get_field('allow_flip');
$t_n_c_apply = get_field('card_t_c_apply');
$card_rank_flip_color = get_field('card_rank_flip_color');
$card_rank_flip_hover_color = get_field('card_rank_flip_hover_color');
$front_card_align_items = get_field('front_card_align_items');
$back_card_align_items = get_field('back_card_align_items');
$card_logo_space_top = get_field('card_logo_space_top');
$card_logo_space_bottom = get_field('card_logo_space_bottom');
$card_bonus_space_top = get_field('card_bonus_space_top');
$card_bonus_space_bottom = get_field('card_bonus_space_bottom');
$fs_text_color = get_field('fs_text_color');
$card_fs_space_top = get_field('card_fs_space_top');
$card_fs_space_bottom = get_field('card_fs_space_bottom');
$rating_style_select = get_field('rating_style_select');
$rating_text_color = get_field('rating_text_color');
$card_rating_space_top = get_field('card_rating_space_top');
$card_rating_space_bottom = get_field('card_rating_space_bottom');
$dd_font_size = get_field('dd_font_size');
$dd_font_weight = get_field('dd_font_weight');
$card_dd_space_top = get_field('card_dd_space_top');
$card_dd_space_bottom = get_field('card_dd_space_bottom');
$dd_text_color = get_field('dd_text_color');
$play_now_button_width = get_field('play_now_button_width');
$play_now_button_height = get_field('play_now_button_height');
$play_now_button_radius = get_field('play_now_button_radius');
$play_now_button_drop_shadow = get_field('play_now_button_drop_shadow');
$card_play_now_space_top = get_field('card_play_now_space_top');
$card_play_now_space_bottom = get_field('card_play_now_space_bottom');
$review_link_custom_text = get_field('review_link_custom_text');

$review_link_font_size = get_field('review_link_font_size');
$review_link_text_color = get_field('review_link_text_color');
$card_review_link_space_top = get_field('card_review_link_space_top');
$card_review_link_space_bottom = get_field('card_review_link_space_bottom');

$special_flag_text_color = get_field('special_flag_text_color');
$special_flag_background_color = get_field('special_flag_background_color');

$card_load_more = get_field('card_load_more');

$cards_bg_wrapper  = get_field('card_block_background_color_copy');

if (!empty($datas)) {
  // $front_card_select = [];
  // Global Design
  /* if (have_rows('global_design')) :
    while (have_rows('global_design')) : the_row(); */
      // Get sub field values.
      $card_number_of_cards = get_field('card_number_of_cards');
      if( empty($card_number_of_cards)){
        $card_number_of_cards = 4;
      }
      // var_dump($card_number_of_cards);
      $show_rank = get_field('gl_show_rank');
      $rank_size = get_field('rank_size');
      $review_link_text = get_field('review_link_text');
      $card_background_color = get_field('card_background_color');
      $card_border_color = get_field('card_border_color');
      
  /*   endwhile;
  endif; */
  // Card Design

 /*  if (have_rows('card_design')) :
    while (have_rows('card_design')) : the_row(); */
      // Get sub field values.
      $card_width = get_field('card_width');
      // var_dump($card_width);
      $card_hight = get_field('card_hight');
      $card_radius = get_field('card_radius');
      $card_stroke = get_field('card_stroke');
      $space_between_cards = get_field('space_between_cards');
      $logo_size_desktop = get_field('logo_size_desktop');
      $logo_size_tablet = get_field('logo_size_tablet');
      $logo_size_mobile = get_field('logo_size_mobile');
      $fs_font_size = get_field('fs_font_size');
      $fs_font_weight = get_field('fs_font_weight');
      $bn_font_size = get_field('bn_font_size');
      $bn_font_weight = get_field('bn_font_weight');
      $play_now_text = get_field('play_now_text');
      $play_now_font_size = get_field('play_now_font_size');

      $play_now_font_weight = get_field('play_now_font_weight');

      $play_now_text_color = get_field('play_now_text_color');
      $play_now_background_color = get_field('play_now_background_color');
      $play_now_hover_background_color = get_field('play_now_hover_background_color');
      $bn_text_color = get_field('bn_text_color');
      $card_show_special_flag = get_field('card_show_special_flag');

      $special_flag_font_size = get_field('special_flag_font_size');
      $special_flag_font_weight = get_field('special_flag_font_weight');
     
      // LOOP FRONT CARD
      
      if (have_rows('front_card')) :
        while (have_rows('front_card')) : the_row();
          // var_dump(get_sub_field('front_card_select'));
          // Get sub field values.
          $front_card_select[] = get_sub_field('front_card_select');
          // var_dump($front_card_select);
        // echo count($front_card_select);
        endwhile;
      endif;
     // var_dump( $front_card_select );
      // LOOP Back CARD
      if (have_rows('back_card')) :
        while (have_rows('back_card')) : the_row();
          // Get sub field values.
          $back_card_select[] = get_sub_field('back_card_select');
        // var_dump($front_card_select);
        // echo count($front_card_select);
        endwhile;
      endif;

  /*   endwhile;
  endif; */


  $count = 1;
  // var_dump($in_row);
  $html = '';
  // get styles
  include 'cards/style.php';
  if ($card_drop_shadow) {
    $y = get_field('card_drop_shadow_y');
    $x = get_field('card_drop_shadow_x');
    $blur = get_field('card_drop_shadow_blur');
    $spread = get_field('card_drop_shadow_spread');
    $color = get_field('card_drop_shadow_color');
    $card_drop_shadow = 'box-shadow: '.$x.'px '.$y.'px '.$blur.'px '.$spread.'px '.$color.';';
} else {
    $card_drop_shadow = 'box-shadow: none;';
}
if ($allow_flip) {
    $allow_flip = 'cursor: pointer;';
}
if( $play_now_button_drop_shadow ){
    $y = get_field('play_now_button_drop_shadow_y');
    $x = get_field('play_now_button_drop_shadow_x');
    $blur = get_field('play_now_button_drop_shadow_blur');
    $spread = get_field('play_now_button_drop_shadow_spread');
    $color = get_field('play_now_button_drop_shadow_color');
    $play_now_button_drop_shadow = 'box-shadow: '.$x.'px '.$y.'px '.$blur.'px '.$spread.'px '.$color.';';
}else{
    $play_now_button_drop_shadow = 'box-shadow: none;';
}

$className = 'table-cards';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$html .= '<style type="text/css">
@charset "UTF-8";
:root {
  --star-size: 30px;
  --star-color: #000;
  --star-background: '.$rating_text_color.';
}
#'.$block['id'].'{
  width: 100%;
  max-width: 100%;
}
#'.$block['id'].' .Stars {
  --percent: calc(var(--rating) / 5 * 100%);
  display: inline-block;
  font-size: var(--star-size);
  font-family: Times;
  line-height: 1;
}
#'.$block['id'].' .Stars::before {
  content: "★★★★★";
  letter-spacing: 3px;
  background: linear-gradient(90deg, var(--star-background) var(--percent), var(--star-color) var(--percent));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
#'.$block['id'].' .scene {
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

    #'.$block['id'].' .mfp-casino-block.scene.scene--card .card_ {
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

    #'.$block['id'].' .card_.is-flipped {
        transform: rotateY(180deg);
    }

    #'.$block['id'].' .card__face {
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

    #'.$block['id'].' .card__face--back {
        transform: rotateY(180deg);
        color: #888;
    }

    #'.$block['id'].' .icon-info-wr {
        text-align: right;
        padding-right: 5px;
        ' . $allow_flip . '
        margin-right: -10px;
        margin-left: -10px;
        margin-bottom: -10px;
        
    }

    #'.$block['id'].' .card_ figure {
        margin: 0;
        line-height: 0;
        margin-top: '.$card_logo_space_top.'px;
        margin-bottom: '.$card_logo_space_bottom.'px;
    }
    #'.$block['id'].' .card_description{
        color: '.$dd_text_color.';
        font-size: '.$dd_font_size.'px;
        font-weight: '.$dd_font_weight.';
        margin-top: '.$card_dd_space_top.'px;
        margin-bottom: '.$card_dd_space_bottom.'px;
    }
    #'.$block['id'].' .play__now__wrapper {
        text-align: center;
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: center;
        margin-top: '.$card_play_now_space_top.'px;
        margin-bottom: '.$card_play_now_space_bottom.'px;
    }
    #'.$block['id'].' a.cards_play_now {
        background-color:' . $play_now_background_color . ';
        color: ' . $play_now_text_color . ';
        '.$play_now_button_drop_shadow.'
        width: 100%;
        line-height: 46px;
        cursor: pointer;
        text-decoration: none;
        font-size: ' . $play_now_font_size . 'px;
        font-weight: '.$play_now_font_weight.';
        border-radius: '.$play_now_button_radius.'px;
        max-width: '.$play_now_button_width.'px;
        height: '.$play_now_button_height.'px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #'.$block['id'].' a.cards_play_now:hover {
        background: ' . $play_now_hover_background_color . ';
    }

  
    #'.$block['id'].' span.review_link_wrapper a {
        font-size: '.$review_link_font_size.'px;
        color: '.$review_link_text_color.';
        margin-top: '.$card_review_link_space_top.'px;
        margin-bottom: '.$card_review_link_space_bottom.'px;
        display: block;
    }

    #'.$block['id'].' .mfp-casino-block.scene.scene--card {
        max-width: ' . $width . ';
        margin: 0 auto;
        width: 100%;
    }

    #'.$block['id'].' .mfp-casino-block-wrapper {
        background: ' . $cards_bg_wrapper . ';
        max-width: 100%;
        width: 100%;
        padding-block-start: 0.83em;
        padding-block-end: 0.83em;
        margin-block-start: 0.83em;
        margin-block-end: 0.83em;
    }

    #'.$block['id'].' .card__details .review-link-a {
        font-size: ' . get_theme_mod("mfp_cards_brand_name_font_size", "16") . 'px;
        color: ' . get_theme_mod("mfp_cards_brand_name_color", "#267aba") . ';
        font-weight: ' . get_theme_mod("mfp_cards_brand_name_font_weight", "700") . ';
        text-decoration: none;
    }

    #'.$block['id'].' .card__value {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 0px;
        line-height: 27px;
    }

    #'.$block['id'].' span.t_c_apply {
        font-size: ' . get_theme_mod("mfp_casino_cards_t_c_apply_font_size", "12") . 'px;
        font-weight: ' . get_theme_mod("mfp_casino_cards_t_c_apply_font_weight", "300") . ';
        display: block;
        padding-top: 5px;
        color: ' . get_theme_mod("mfp_casino_cards_t_c_apply_color", "#888") . ';
    }

    #'.$block['id'].' .cards__wrapper {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    #'.$block['id'].' .card__face.card__face--front .cards__wrapper{
        justify-content: '.$front_card_align_items.';
    }
    #'.$block['id'].' .card__face.card__face--back .cards__wrapper{
        justify-content: '.$back_card_align_items.';
    }

    #'.$block['id'].' span.card__free_spins {
        font-size: ' . $fs_font_size . 'px;
        font-weight: ' . $fs_font_weight . ';
        display: block;
        color: '.$fs_text_color.';
        margin-top: '.$card_fs_space_top.'px;
        margin-bottom: '.$card_fs_space_bottom.'px;
    }
    #'.$block['id'].' .rating-wrapper {
        margin-top: '.$card_rating_space_top.'px;
        margin-bottom: '.$card_rating_space_bottom.'px;
    }
    #'.$block['id'].' .card__details {
        line-height: initial;
    }
    #'.$block['id'].' .card__face.card__face--back .card__value {
        line-height: inherit;
        font-size: 14px;
        font-weight: bold;
        padding-right: 5px;
        padding-left: 5px;
    }
    #'.$block['id'].' .card__face.card__face--back .card__value {
        margin-top: 0;
    }
    #'.$block['id'].' a.cards_read_reviews {
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

    #'.$block['id'].' .icon-info:before {
        content: "\ea0c";
    }

    #'.$block['id'].' .icon-cancel-circle:before {
        content: "\ea0d";
    }

    #'.$block['id'].' .icon-info-wr span {
        color: ' . $card_rank_flip_color . ';
        font-size: ' . $rank_size . 'px;
    }

    #'.$block['id'].' .icon-info-wr span.__icon:hover,
    #'.$block['id'].' .icon-info-wr span.number:hover {
        color:' . $card_rank_flip_hover_color . ';
        transition: all .2s ease;
    }

    #'.$block['id'].' .icon-info-wr span.number {
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
    
    #'.$block['id'].' .icon-info-wr {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0px;
    }

    #'.$block['id'].' .icon-info-wr.back {
        justify-content: flex-end;
    }
    #'.$block['id'].' .icon-info-wr.special {
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
    
    #'.$block['id'].' .special_flag_wrapper {
        font-size: '.$special_flag_font_size.'px;
        font-weight: '.$special_flag_font_weight.';
        display: block;
        justify-content: center;
        align-items: center;
        height: 100%;
        text-align: center;
    }
    #'.$block['id'].' span.card_value_description {
        font-size:15px;
        font-weight:700;
        color:#888;
    }
    #'.$block['id'].' .cards__wrapper figure img {
        width: ' . $logo_size_desktop . 'px;
        max-width:' . $logo_size_desktop . 'px;
        height: 79px;
    }
    #'.$block['id'].' span.card_bonus{
        font-size: ' . $bn_font_size . 'px;
        font-weight: ' . $bn_font_weight . ';
        color: ' . $bn_text_color . ';
        margin-top:'.$card_bonus_space_top.'px;
        margin-bottom:'.$card_bonus_space_bottom.'px;;
    }
    #'.$block['id'].' .card__face.special {
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
           /* margin-right: -0.83em;
            margin-left: -0.83em; */
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
$html .= '<div id="'.$block['id'].'" class="'.$className.'">';
  $html .= '<div class="mfp-casino-block-wrapper" class="'.$className.'">';
  $html .= '<div class="mfp-casino-block scene scene--card">';
  // limit the foreach by number that chosed
  foreach (array_slice($datas, 0, $card_number_of_cards) as $data) {
    if( $data->hide == 0 ){

    
    
    $html .= '<div class="card_">';
    // FRONT CARD
    if( $data->special_flag !== '-' && $card_show_special_flag ){
      $html .= '<div class="card__face special card__face--front">';
      $html .= '<div class="icon-info-wr special">';
      $html .= '<span class="number">' . $count . '</span>';
      $html .= '<div class="special_flag_wrapper">'.$data->special_flag.'</div>';
      // $html .= '<span class="__icon icon-info"></span>';
      $html .= '</div>';
    }else{
      $html .= '<div class="card__face card__face--front">';
   
      $html .= '<div class="icon-info-wr">';
   
    if ($show_rank) :
      $html .= '<span class="number">' . $count . '</span>';
    endif;

    if(  $allow_flip ){
      $html .= '<span class="__icon icon-info"></span>';
    }
    $html .= '</div>';
    }
    


    $html .= '<div class="cards__wrapper">';
 
    foreach ($front_card_select as  $value) {
      // print_r($value);
      switch ($value) {
        case 'Logo':
          $html .= '<figure><img width="162" height="79" src="' . $data->logo1 . '"/></figure>';
          break;
        case 'Bonus':
          if ($data->bonus !== '-') {
            $html .= '<span class="card_bonus">' . $data->bonus . '</span>';
          }
          break;
        case 'Free Spins':
          if ($data->free_spins !== '-') {
            $html .= '<span class="card__free_spins">' . $data->free_spins . ' Free Spins</span>';
          }
          break;
        case 'Rating':
          switch ($rating_style_select) {
            case 'stars':
              $html .= '<div class="rating-wrapper"><div class="Stars" style="--rating: '.$data->rating.';" aria-label="Rating of this product is 2.3 out of 5."></div></div>';
              break;
              case 'Number + Stars':
                $html .= '<div class="rating-wrapper"><span>' . $data->rating . '</span><div class="Stars" style="--rating: '.$data->rating.';" aria-label="Rating of this product is 2.3 out of 5."></div></div>';
                break;
            default:
            $html .= '<div class="rating-wrapper"><div class="Stars" style="--rating: '.$data->rating.';" aria-label="Rating of this product is 2.3 out of 5."></div></div>';
              break;
          }
          break;
        case 'Description':
          $html .= '<span class="card_description">' . $data->default_info . '</span>';
          break;
          case 'Review Link':
            $html .= '<span class="review_link_wrapper"><a href="' . $data->review_url . '">'.$review_link_custom_text.'</a></span>';
            break;
        case 'Play Now':
          $html .= '<div class="play__now__wrapper">
          <a target="_blank" rel="nofollow" href="' . get_site_url() . '/visit/' . $data->visit_url . '/" class="cards_play_now">' . $play_now_text . '</a>
           </div>';
          break;
      }
    }
    if( $t_n_c_apply){
      $html .= '<span class="t_c_apply">T&amp;C Apply</span>';
    }
    $html .= '</div>';
    $html .= '</div>';
    // FRONT CARD END

    // BACK CARD //
    if( $data->special_flag !== '-' && $card_show_special_flag ){
      $html .= '<div class="card__face special card__face--back">';
    }else{
      $html .= '<div class="card__face card__face--back">';  
    }
    

        $html .= '<div class="icon-info-wr back">';
          $html .= '<span class="__icon icon-cancel-circle"></span>';
        $html .= '</div>';

      $html .= '<div class="cards__wrapper">';
      foreach ($back_card_select as  $value) {
        switch ($value) {
          case 'Logo':
            $html .= '<figure><img width="162" height="79" src="' . $data->logo1 . '"/></figure>';
            break;
          case 'Bonus':
            if ($data->bonus !== '-') {
              $html .= '<span class="card_bonus">' . $data->bonus . '</span>';
            }
            break;
          case 'Free Spins':
            if ($data->free_spins !== '-') {
              $html .= '<span class="card__free_spins">' . $data->free_spins . ' Free Spins</span>';
            }
            break;
          case 'Rating':
            switch ($rating_style_select) {
              case 'stars':
                $html .= '<div class="rating-wrapper"><div class="Stars" style="--rating: '.$data->rating.';" aria-label="Rating of this product is 2.3 out of 5."></div></div>';
                break;
                case 'Number + Stars':
                  $html .= '<div class="rating-wrapper"><span>' . $data->rating . '</span><div class="Stars" style="--rating: '.$data->rating.';" aria-label="Rating of this product is 2.3 out of 5."></div></div>';
                  break;
              default:
              $html .= '<div class="rating-wrapper"><div class="Stars" style="--rating: '.$data->rating.';" aria-label="Rating of this product is 2.3 out of 5."></div></div>';
                break;
            }
            break;
          case 'Description':
            $html .= '<span class="card_description">' . $data->default_info . '</span>';
            break;
            case 'Review Link':
              $html .= '<span class="review_link_wrapper"><a href="' . $data->review_url . '">'.$review_link_custom_text.'</a></span>';
              break;
          case 'Play Now':
            $html .= '<div class="play__now__wrapper">
            <a target="_blank" rel="nofollow" href="' . get_site_url() . '/visit/' . $data->visit_url . '/" class="cards_play_now">' . $play_now_text . '</a>
             </div>';
            break;
        }
      }

      $html .= '</div>';

    $html .= '</div>';

    $html .= '</div>';
    $count++;
  }
  }
  // load more
  if( $card_load_more ){
   // $html .= '<div class="card_load_more_wrapper"><span>LOAD MORE</span></div>';
  }
  // load more end
  $html .= '</div>';
  $html .= '</div>';
  
  if( $allow_flip ) :
     // include 'cards/script.php';
  endif;
}else{
  $html .= '<div style="width: 100%; max-width: 700px;margin: 0 auto; text-align: center;">
  <h2>Sorry your API is empty, pls contact your King Developer</h2>
  <h4>What you can do?</h4>
  <ol>
    <li>Check your Site Identety in customizer->site identety</li>
    <li>Contact your king developer</li>
  </ol>
  <img style="width: 100%; max-width: 700px; height: auto;" src="https://media.giphy.com/media/3owzW8XucitRFDXKNO/giphy.gif"/></div>';
}
echo $html;
