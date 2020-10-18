<?php

/**
 * Read More Block Template.
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

$id = 'read-more-' . $block['id'];


// Load custom field values.
// $start_date = get_field('start_date');
// $end_date = get_field('end_date');

// Restrict block output (front-end only).
/* if( !$is_preview ) {
    $now = time();
    if( $start_date && strtotime($start_date) > $now ) {
        echo sprintf( '<p>Content restricted until %s. Please check back later.</p>', $start_date );
        return;
    }
    if( $end_date && strtotime($end_date) < $now ) {
        echo sprintf( '<p>Content expired on %s.</p>', $end_date );
        return;
    }
} */
?>
<style>
  .read-more-state {
    display: none !important;
  }

  .read-more-target {
    opacity: 0;
    max-height: 0;
    font-size: 0;
    transition: .25s ease;
  }

  .read-more-state:checked~.read-more-wrap .read-more-target {
    opacity: 1;
    font-size: inherit;
    max-height: 999em;
    padding-inline-start: 0;
  }

  .read-more-state~.read-more-trigger:before {
    content: 'Show more';
  }

  .read-more-state:checked~.read-more-trigger:before {
    content: 'Show less';
  }

  .read-more-trigger {
    cursor: pointer;
    display: inline-block;
    padding: 0 .5em;
    color: #666;
    font-size: .9em;
    line-height: 2;
    border: 1px solid #ddd;
    border-radius: .25em;
    position: relative;
    z-index: 9999;
  }
  .read-more-main-wrapper{
    position: relative;
  }
</style>


<div class="read-more-main-wrapper">
        <input type="checkbox" class="read-more-state" id="<?php echo esc_attr($id); ?>" />
        <div class="read-more-wrap">
          <ul class="read-more-target">
            <InnerBlocks/>
        </ul>
        </div>
        <label for="<?php echo esc_attr($id); ?>" class="read-more-trigger"></label>
      </div>