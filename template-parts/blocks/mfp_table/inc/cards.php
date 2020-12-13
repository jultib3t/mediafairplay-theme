<?php
$list = wp_remote_get("https://app.aff-wiz.com/wp-json/api/v1/get_site_table?website_id=4&geo_id=3&category_id={$categoryID}");
// var_dump($a['category_id'] );
if (is_wp_error($list)) {
  return false; // Bail early
}
$list = wp_remote_retrieve_body($list);
$datas = json_decode($list);
/// var_dump($datas->data);
$datas = $datas->data;
/* if (!empty($datas)) {
  $html = '';
  foreach ($datas as $data) {
    print_r($data->logo1);
  }
} */


$show_logo = get_field('show_logo');
$review_link = get_field('review_link');
$review_link_text = get_field('review_link_text');
$review_link_size = get_field('review_link_size');



if (!empty($datas)) {
  // $front_card_select = [];
  // Global Design
  /* if (have_rows('global_design')) :
    while (have_rows('global_design')) : the_row(); */
      // Get sub field values.
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
      $play_now_text_color = get_field('play_now_text_color');
      $play_now_background_color = get_field('play_now_background_color');
      $play_now_hover_background_color = get_field('play_now_hover_background_color');
      $bn_text_color = get_field('bn_text_color');
      

      // LOOP FRONT CARD
      if (have_rows('front_card')) :
        while (have_rows('front_card')) : the_row();

          // Get sub field values.
          $front_card_select[] = get_sub_field('front_card_select');
         // var_dump($front_card_select);
        // echo count($front_card_select);
        endwhile;
      endif;

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

  $html .= '<div class="mfp-casino-block-wrapper">';
  $html .= '<div class="mfp-casino-block scene scene--card">';
  foreach ($datas as $data) {
    $html .= '<div class="card_">';
    // FRONT CARD
    $html .= '<div class="card__face card__face--front">';
    $html .= '<div class="icon-info-wr">';
    if ($show_rank) :
      // show rank or not
      $html .= '<span class="number">' . $count . '</span>';
    endif;
    $html .= '<span class="__icon icon-info"></span>';
    $html .= '</div>';

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
          $html .= '<span>' . $data->rating . '</span><div class="Stars" style="--rating: '.$data->rating.';" aria-label="Rating of this product is 2.3 out of 5."></div>';
          break;
        case 'Description':
          $html .= '<span>' . $data->default_info . '</span>';
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
    // FRONT CARD END

    // BACK CARD //
    $html .= '<div class="card__face card__face--back">';

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
            $html .= '<span>' . $data->rating . '</span><img style="max-width: 100px; width: 100%;" src="https://upload.wikimedia.org/wikipedia/commons/a/ae/5_stars.svg">';
            break;
          case 'Description':
            $html .= '<span>' . $data->default_info . '</span>';
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
  $html .= '</div>';
  $html .= '</div>';
  include 'cards/script.php';
}
echo $html;
