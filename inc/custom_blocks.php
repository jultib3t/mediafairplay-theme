<?php
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a testimonial block.
        acf_register_block_type(array(
            'name' => 'MFP FAQ',
            'title' => __('MFP FAQ'),
            'description' => __('A custom testimonial block.'),
            'align'                => 'wide',
            'render_callback' => 'my_acf_faq_block_render_callback',
            //'render_template' => 'template-parts/blocks/faq/faq.php',
            // 'enqueue_style' => get_template_directory_uri() . '/template-parts/blocks/faq/faq.css',
            // 'enqueue_script' => get_template_directory_uri() . '/template-parts/blocks/faq/faq.js',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => array('faq', 'quote'),
            'multiple' => false,
        ));

        // Register a restricted block.
        acf_register_block_type( array(
            'title'			=> __( 'Read More', 'mediafairplay' ),
            'name'			=> 'Read More',
            'render_template'	=> 'template-parts/blocks/readmore/readmore.php',
            'mode'			=> 'preview',
            'supports'		=> [
                'align'			=> true,
                'anchor'		=> true,
                'customClassName'	=> true,
                'jsx' 			=> true,
            ],
            'multiple' => false
        ));
    }
}

function my_acf_faq_block_render_callback($block)
{
    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path("/template-parts/blocks/faq/faq.php"))) {
        include(get_theme_file_path("/template-parts/blocks/faq/faq.php"));
    }
}

function ldJson()
{
    global $post;
    $blocks = parse_blocks($post->post_content);
    $objects = json_decode(json_encode($blocks));
    $array = array();
    foreach ($objects as $object) {
        if ($object->blockName == 'acf/mfp-faq') {
            $var = $object->attrs->data;
            $array_var = json_decode(json_encode($var, true), true);
            $array[] = $array_var;
        }
    }
    $mainArray = $array[0];
    $count = 0;
    $questions_array = array();
    $answers_array = array();
    foreach ($mainArray as $key => &$value) {
        // echo $key . '<br>';
        if ($key == 'faq_0_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_1_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_2_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_3_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_4_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_5_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_6_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_7_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_8_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_9_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_9_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_10_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_11_question') {
            $questions_array[] = $value;
        }
        if ($key == 'faq_12_question') {
            $questions_array[] = $value;
        }

        // answers
        if ($key == 'faq_0_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_1_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_2_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_3_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_4_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_5_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_6_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_7_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_8_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_9_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_10_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_11_answer') {
            $answers_array[] = $value;
        }
        if ($key == 'faq_12_answer') {
            $answers_array[] = $value;
        }
        $count++;
    }
    $total_questions = count($questions_array);
    $last_total = $total_questions - 1;

    $html = '';
    $html .= '<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [';
    for ($i = 0; $i < $total_questions; $i++) {
        $html .= '{
            "@type": "Question",
            "name": "' . $questions_array[$i] . '",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "' . $answers_array[$i] . '"
            }}';
        if ($i == $last_total) {
            $html .= '';
        } else {
            $html .= ',';
        }
    }

    $html .= ']
    }
    </script>';

    return $html;
}
