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

$categoryID = get_field('choose_category');
$cards_view = get_field('block_cards_view');
/**
 * if cards view equal to false it ask for table,
 *  if true for cards
 */

 if( $cards_view ) : // equal to true ask for cards
    include 'inc/cards.php';
 else:
  include 'inc/table.php';
 endif;
/// print_r($categoryID);

