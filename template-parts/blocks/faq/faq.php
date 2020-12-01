<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Load values and assign defaults.


// Check rows exists.
if (have_rows('faq')) :
  // create align class ("alignwide") from block setting ("wide")
  $align_class = $block['align'] ? ' align' . $block['align'] : '';
?>
  <style>
    .main-content {
      width: 100%;
      margin: 0 auto;
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    .main-content .description-title {
      background-color: <?php echo get_theme_mod('mfp_faq_question_background_color', ' #fff'); ?>;
      color: <?php echo get_theme_mod('mfp_faq_question_color', ' #3C4043'); ?>;
      font-size: <?php echo get_theme_mod('faq_question_font_size', '15'); ?>px;
      padding-left: 10px;
      line-height: 55px;
      transition: 0.2s;
      display: flex;
      align-items: flex-end;
      line-height: 25px;
      padding-top: 15px;
      padding-bottom: 15px;
      justify-content: space-between;
    }

    .main-content .description-title:hover {
      background-color: <?php echo get_theme_mod('mfp_faq_question_hover_background_color', 'rgba(0,0,0,0.1)'); ?>;
      cursor: pointer;
    }

    .main-content .expand-collapse {
      float: right;
      margin-right: 8px;
    }

    .main-content .description {

      font-size: <?php echo get_theme_mod('faq_answer_font_size', '14'); ?>px;
      color: <?php echo get_theme_mod('mfp_faq_answer_color', '#35353f'); ?>;
      max-height: 0;
      overflow: hidden;
      margin-left: 0px;
      padding-left: 10px;
      transition: max-height 0.15s ease-out;
      background-color: <?php echo get_theme_mod('mfp_faq_answer_background_color', '#f8f8f8'); ?>;
      border-bottom: 1px solid #DFE1E5;
    }

    .main-content .description p {
      margin-top: 4px;
    }

    .main-content .description div {
      padding-top: 10px;
    }

    .main-content .expand-collapse svg {
      position: relative;
      top: 7px;
      fill: <?php echo get_theme_mod('mfp_faq_question_color', ' #3C4043'); ?>;
    }

    dd {
      margin-bottom: 0;
    }

    /*
* FOR FAQ - MOVE IT TO FAQ BLOCK CSS
*/
    .main-content.mfp_faq_block {
      margin-block-start: 0.83em;
      margin-block-end: 0.83em;
    }

    @media(max-width: 1000px) {
      .main-faq--wrap {
        padding-right: 0;
        padding-left: 0;
      }

      .main-content .description-title {
        font-size: 15px;
        display: flex;
        align-items: flex-end;
        line-height: 25px;
        padding-top: 15px;
        padding-bottom: 15px;
        justify-content: space-between;
      }

    }

    /*
* END FOR FAQ - MOVE IT TO FAQ BLOCK CSS
*/
  </style>

  <div class="main-faq--wrap">
    <div class="main-content mfp_faq_block <?php echo $block['className'] . $align_class; ?>">
      <?php
      // Loop through rows.
      while (have_rows('faq')) : the_row();
        // Load sub field value.
        $question = get_sub_field('question') ?: 'Question';
        $answer = get_sub_field('answer') ?: 'Answer';
        // Do something...
      ?>
        <dt class="description-title"><?php echo $question; ?> <span class="expand-collapse">
            <svg width="24px" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path>
            </svg>
          </span></dt>
        <dd class="description">
          <div>
            <p><?php echo $answer; ?></p>
          </div>
        </dd>

      <?php
      // End loop.
      endwhile;
      ?>
    </div>
  </div>
  <script>
    if (document.readyState !== 'loading') {
      // console.log("ready!");
      ready();
    } else {
      document.addEventListener('DOMContentLoaded', ready);
    }

    function ready() {
      var accordion = document.getElementsByTagName("dt");

      for (var i = 0; i < accordion.length; i++) {
        accordion[i].addEventListener('click', function() {
          accordionClick(event);

        });
      }
    }

    var accordionClick = (eventHappened) => {
      // console.log(eventHappened);
      var targetClicked = event.target;
      // console.log(targetClicked);
      var classClicked = targetClicked.classList;
      // console.log("target clicked: " + targetClicked);
      // console.log(classClicked[0]);
      while ((classClicked[0] != "description-title")) {
        // console.log("parent element: " + targetClicked.parentElement);
        targetClicked = targetClicked.parentElement;
        classClicked = targetClicked.classList;
        // console.log("target clicked while in loop:" + targetClicked);
        // console.log("class clicked while in loop: " + classClicked);
      }
      var description = targetClicked.nextElementSibling;
      // console.log(description);
      var expander = targetClicked.children[0];
      if (description.style.maxHeight) {
        description.style.maxHeight = null;
        expander.innerHTML = '<svg width="24px" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg>'

      } else {
        var allDescriptions = document.getElementsByTagName("dd");
        for (var i = 0; i < allDescriptions.length; i++) {
          // console.log("current description: " + allDescriptions[i]);
          if (allDescriptions[i].style.maxHeight) {
            // console.log("there is a description already open");
            allDescriptions[i].style.maxHeight = null;
            allDescriptions[i].previousElementSibling.children[0].innerHTML = '<svg width="24px" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg>'
          }
        }
        description.style.maxHeight = description.scrollHeight + "px";

        expander.innerHTML = '<svg width="24px" focusable="false" style="transform:rotate(180deg)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7.41 8.59L12 13.17l4.59-4.58L18 10l-6 6-6-6 1.41-1.41z"></path></svg>';

      }
    }
  </script>
<?php
// No value.
else :
// Do something...
endif;
