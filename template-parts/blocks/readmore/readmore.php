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

$display_on_mobile = get_field("display_on_mobile");
$display_on_desktop = get_field("display_on_desktop");
$rm_font_size = get_field('rm_font_size');
if( empty($rm_font_size )){
  $rm_font_size = 15;
}
$rm_color = get_field('rm_color');
if( empty($rm_color )){
  $rm_color = '#000';
}
$read_more_text = get_field('read_more_text');
if( empty($read_more_text )){
  $read_more_text = 'Read More';
}
$read_less_text = get_field('read_less_text');
if( empty($read_less_text )){
  $read_less_text = 'Read Less';
}
// var_dump($display_on_mobile);
// var_dump($display_on_desktop);
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
    font-size: <?php echo $rm_font_size;?>px;
    color: <?php echo $rm_color;?>;
  }

  .collapsible:after {
    color: white;
    font-weight: bold;
    float: right;
    margin-left: 5px;
    content: url("data:image/svg+xml; utf8, <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24'><path d='M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z'/></svg>");
    display: block;
    width: <?php echo $rm_font_size;?>px;
    height: <?php echo $rm_font_size;?>px;
  }

  .active:after {
    content: url("data:image/svg+xml; utf8, <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24'><path d='M0 16.67l2.829 2.83 9.175-9.339 9.167 9.339 2.829-2.83-11.996-12.17z'/></svg>");
    display: block;
    width: 22px;
  }

  .content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
  }
  <?php
  // hide readmore on desktop and show on mobile
  if ( !$display_on_desktop && $display_on_mobile ) : ?>
  
    .mfp-read-more-wrapper span.collapsible {
        display: none;
    }

    div#mfp-read-more-content {
        max-height: initial;
    }

  @media(max-width: 1000px){
        div#mfp-read-more-content {
            max-height: 0;
        }

        .mfp-read-more-wrapper span.collapsible {
            display: flex;
        }
  }

  <?php endif; ?>

  <?php
  // hide readmore on Mobile and Hide on Desktop
  if ( $display_on_desktop && !$display_on_mobile ) : ?>
  
  @media(max-width:1000px){
        .mfp-read-more-wrapper span.collapsible {
            display: none;
        }

        div#mfp-read-more-content {
            max-height: initial;
        }
    }

  <?php endif; ?>

  <?php if ( !$display_on_desktop && !$display_on_mobile ) : ?>
    span#read-more-content {
    display: none;
    }

    div#mfp-read-more-content {
        max-height: initial;
    }
  <?php endif; ?>

</style>
<div class="mfp-read-more-wrapper" id="mfp-read-more-wrapper">
  <div class="content" id="mfp-read-more-content">
    <InnerBlocks />
  </div>
  <span class="collapsible" id="read-more-content"><?php echo $read_more_text;?></span>
</div>
<script>
  var coll = document.getElementsByClassName("collapsible");
  var i;

  for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
      this.classList.toggle("active");
      if (this.innerText === '<?php echo $read_more_text;?>') {
        this.innerText = '<?php echo $read_less_text;?>';
      } else {
        this.innerText = '<?php echo $read_more_text;?>';
        // window.scrollBy(0, -900);
        var co = document.getElementById('mfp-read-more-content');
        var c = co.scrollHeight;
        window.scrollBy(0, -c);
      }

      var content = this.previousElementSibling;
      console.log(content);
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
      }

    });
  }
</script>