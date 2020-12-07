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
  $front_card_select = [];
  // Global Design
  if (have_rows('global_design')) :
    while (have_rows('global_design')) : the_row();
      // Get sub field values.
      $show_rank = get_sub_field('gl_show_rank');
      $rank_size = get_sub_field('rank_size');
      $review_link_text = get_sub_field('review_link_text');
    endwhile;
  endif;
  // Card Design

  if (have_rows('card_design')) :
    while (have_rows('card_design')) : the_row();
      // Get sub field values.
      $card_width = get_sub_field('card_width');
      $card_hight = get_sub_field('card_hight');
      $card_radius = get_sub_field('card_radius');
      // LOOP FRONT CARD
      if (have_rows('front_card')) :
        while (have_rows('front_card')) : the_row();

          // Get sub field values.
          $front_card_select[] = get_sub_field('front_card_select');
        // var_dump($front_card_select);
        // echo count($front_card_select);
        endwhile;
      endif;

    endwhile;
  endif;


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
      print_r($value);
      switch ($value) {
        case 'Logo':
          $html .= '<figure><img width="162" height="79" src="' . $data->logo1 . '"/></figure>';
          break;
        case 'Bonus':
          $html .= '<span class="card_bonus">' . $data->bonus . '</span>';
          break;
        case 'Free Spins':
          $html .= '<span class="card__free_spins">' . $data->free_spins . ' Free Spins</span>';
          break;
        case 'Play Now':
          $html .= '<div class="play__now__wrapper">
          <a target="_blank" rel="nofollow" href="' . get_site_url() . '/visit/' . $data->visit_url . '/" class="cards_play_now">' . get_theme_mod('play_now_button_text', 'Play Now') . '</a>
      </div>';
          break;
      }
    }
    // $html .= '<div class="card__details">';
    // $html .= '<figure>';
    // $html .= '<img width="' . get_theme_mod("mfp_cards_logo_mobile", "162") . '" height="79" src="' . $data->logo1 . '"/>';
    // $html .= '</figure>';
    // $html .= '<span class="review-link-a">' . $data->name . '</span>';
    // $html .= '</div>';
    // $html .= '<div class="card__value">';
    // $html .= '<span class="card_bonus">' . $data->bonus . '</span>';
    // $html .= '<span class="card__free_spins">' . $data->free_spins . ' Free Spins</span>';
    // $html .= '</div>';
    // $html .= '<div class="play__now__wrapper">
    //                     <a target="_blank" rel="nofollow" href="' . get_site_url() . '/visit/' . $data->visit_url . '/" class="cards_play_now">' . get_theme_mod('play_now_button_text', 'Play Now') . '</a>
    //                     <span class="t_c_apply">T&Cs Apply</span>';
    // $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    // FRONT CARD END
    // BACK CARD //
    $html .= '<div class="card__face card__face--back">';
    $html .= '<div class="icon-info-wr back">';
    $html .= '<span class="__icon icon-cancel-circle"></span>
                 </div>
                 <div class="cards__wrapper">
                     <div class="card__details">';
    $html .= '<figure>
                          <img height="79" width="' . get_theme_mod("mfp_cards_logo_mobile", "162") . '" 
                          src="' . $data->logo1 . '"
                          />
                        </figure>';
    $html .= '</div>';
    $html .= '<div class="card__value">
                         <span class="card_value_description">' . $data->default_info . '</span>
                     </div>
                     <div class="play__now__wrapper">
                       <img style="max-width: 100px; width: 100%;" src="https://upload.wikimedia.org/wikipedia/commons/a/ae/5_stars.svg">';
    $html .= '<a href="' . $data->review_url . '" class="cards_read_reviews">' . $review_link_text . '</a>';
    $html .= '</div>
                        </div>
                    </div>';

    $html .= '</div>';
    $count++;
  }
  $html .= '</div>';
  $html .= '</div>';
  include 'cards/script.php';
}
echo $html;
