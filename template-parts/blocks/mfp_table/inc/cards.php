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

  $html .= '<div class="mfp-casino-block-wrapper">';
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
  }
  // load more
  if( $card_load_more ){
    $html .= '<div class="card_load_more_wrapper"><span>LOAD MORE</span></div>';
  }
  // load more end
  $html .= '</div>';
  $html .= '</div>';
  if( $allow_flip ) :
     include 'cards/script.php';
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
