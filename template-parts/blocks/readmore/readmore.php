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
.mfp-read-more-wrapper {
    max-width: 100%;
    width: 100%;
    height: auto;
}

.mfp-read-more-wrapper span.collapsible {
    display: flex;
    align-items: center;
}
.collapsible:after {
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
  content: url("data:image/svg+xml; utf8, <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24'><path d='M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z'/></svg>");
    display:block;
    width: 15px;
    height: 15px;
}

.active:after {
  content: url("data:image/svg+xml; utf8, <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24'><path d='M0 16.67l2.829 2.83 9.175-9.339 9.167 9.339 2.829-2.83-11.996-12.17z'/></svg>");
    display:block;
    width:22px;
}

.content {
 /*  padding: 0 18px; */
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  /* background-color: #f1f1f1; */
}
</style>


<!-- <div class="read-more-main-wrapper">
  <input type="checkbox" class="read-more-state" id="<?php echo esc_attr($id); ?>" />
  <div class="read-more-wrap">
    <ul class="read-more-target">
      <InnerBlocks />
    </ul>
  </div>
  <label for="<?php echo esc_attr($id); ?>" class="read-more-trigger"></label>
</div> -->
<div class="mfp-read-more-wrapper" id="mfp-read-more-wrapper">
 
    <div class="content" id="mfp-read-more-content">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <InnerBlocks />
    </div>

    <span class="collapsible" id="read-more-content">Read More</span>
    
</div>
<script>
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      if (this.innerText === 'Read More') {
        this.innerText = 'Read Less';
      } else {
        this.innerText = 'Read More';
        // window.scrollBy(0, -900);
        var co = document.getElementById('mfp-read-more-content');
        var c = co.scrollHeight;
        window.scrollBy(0, -c);
      }

      var content = this.previousElementSibling;
      console.log( content );
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      }

    });
  }
</script>