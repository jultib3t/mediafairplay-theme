<?php

/**
 * Read More Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


// Create id attribute allowing for custom "anchor" value.
$id = 'read-more-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'read-more';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
$align_class = $block['align'] ? ' align' . $block['align'] : '';

// Load values and assign defaults.
$text = get_field('read_more');
// var_dump($text);


?>
<style>

    .read-more-wrapper .read-more-state {
        display: none !important;
    }

    .read-more-wrapper .read-more-target {
        opacity: 0 !important;
        max-height: 0 !important;
        font-size: 0 !important;
        transition: .25s ease !important;
    }

    .read-more-wrapper .read-more-state:checked~.read-more-wrap .read-more-target {
        opacity: 1 !important;
        font-size: inherit !important;
        max-height: 999em !important;
    }

    .read-more-wrapper .read-more-state~.label-wrapper .read-more-trigger:before {
        content: 'Show more' !important;
    }

    .read-more-wrapper .read-more-state:checked~.label-wrapper .read-more-trigger:before {
        content: 'Show less' !important;
    }

    .read-more-trigger {
        cursor: pointer !important;
        display: inline-block !important;
        padding: 0 .5em !important;
        color: #666 !important;
        font-size: .9em !important;
        line-height: 2 !important;
        border: 1px solid #ddd !important;
        border-radius: .25em !important;
    }
    
</style>
<div class="read-more-wrapper <?php echo $block['className'] . $align_class; ?>">
    <div>
        <input type="checkbox" class="read-more-state" id="post-2" />
        <div class="read-more-wrap">
            <span class="read-more-target">
                <?php
                if ($text) {
                    echo $text;
                } else {
                    echo 'false false false false
                    false false false false
                    false false false false
                    false false false false
                    false false false false
                    false false false false
                    false false false false
                    false false false false
                    false false false false
                    false false false false
                    false false false false
                    false false false false
                    false false false false';
                }
                ?>
            </span>

        </div>
        <div class="label-wrapper" style="text-align: center;">
            <label for="post-2" class="read-more-trigger"></label>
        </div>
    </div>
</div>