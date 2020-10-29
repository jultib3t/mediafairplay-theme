<?php

// [mfp-table category_id="1" display="10"]
// [ mfp-table category_id="1" display="10" read-more="yes" style="table/cards"]
// [mfp-table category_id="25" display="10" read_more="yes" in_row="4" style="cards"]
function mfp_tables_block($atts)
{
    $a = shortcode_atts(array(
        'category_id' => null,
        'display' => null,
        'read_more' => null,
        'in_row' => null,
        'style'     => null
      ), $atts);
    ?>
<!-- <div class="test">hopa !! </div>
<script>
 window.addEventListener('load', function (e) {
    e.preventDefault();
    fetch( 'https://dev.theoffersjunction.com/wp-json/api/v1/category?api_cat_id=31' )
        .then(response => {
            return response.json();
        })
        .then( cards => {
            console.log(cards);
        })
}); 
</script> -->
<?php
}
add_shortcode('mfp-table', 'mfp_tables_block');
