<?php

header('Cache-Control: no-store, no-cache, must-revalidate');
require_once("../../../wp-load.php");
global $wpdb;
 // var_dump($_GET['visit_url']);
$visit_url = str_replace('/','',$_GET['visit_url']);
$siteID = get_theme_mod('connect_your_site_to_aff_wiz');
$geoID = get_theme_mod('connect_your_site_to_aff_wiz_id');
 // var_dump( $visit_url );
// $visit_url =   sanitize_text_field($_GET['visit_url']);
 // var_dump($visit_url);
$website_id =   28; // TODO: Gal, you have to take it from DB
// echo '<img src="http://i.stack.imgur.com/SBv4T.gif" alt="this slowpoke moves"  width=250/>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow" /> 
    <style>
    
    .wrapper {
    max-width: 1200px;
    width: 100%;
    margin: 0 auto;
    text-align: center;
    /* min-height: 100%; */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 600px;
    top: 20%;
    flex-direction: column;
}

.wrapper img {
    max-width: 350px;
    width: 100%;
    height: auto;
}

    </style>
</head>
<body>

<?php
if(!empty($visit_url)) {
    // $base_url   =   'https://dev.theoffersjunction.com/wp-json/api/v1/getVisitURL?visit_url='.$visit_url.'&website_id='.$website_id;
    // https://app.aff-wiz.com/wp-json/api/v1/getVisitURL?visit_url=all-slots-casino&website_id=4
    
    // $base_url = 'https://dev.theoffersjunction.com/wp-json/api/v1/getVisitURL?visit_url='.$visit_url.'&website_id=28';
    $base_url = "https://app.aff-wiz.com/wp-json/api/v1/getVisitURL?visit_url={$visit_url}&website_id={$siteID}";
    // var_dump( $base_url );
    $response = wp_remote_get($base_url);
   // echo '<img src="http://i.stack.imgur.com/SBv4T.gif" alt="this slowpoke moves"  width=250/>';
    if(!empty($response)) {
     //   echo '<img src="http://i.stack.imgur.com/SBv4T.gif" alt="this slowpoke moves"  width=250/>';
        $response   =   json_decode(wp_remote_retrieve_body($response));
        if($response->status) { //  var_dump($response->tracker_url);  ?>

<div class="wrapper">
<img src="<?php echo esc_url( get_theme_mod( 'visit_php_image' ) ); ?>" alt="">
<h2>Taking you to <?php $test = str_replace("/", " ", $_GET['visit_url']); echo str_replace("-", " ",$test);?></h2>
    <!-- <img src="<?php echo get_template_directory_uri();?>/images/pokies-online-gif.gif" alt="this slowpoke moves"  width=250/> -->
    <img src="https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif" alt="">
    
</div>
            <script>
            window.setTimeout(function () {
                window.location.replace("<?php echo $response->tracker_url;?>");
            }, 3000);
        </script>
            
        <?php
        } else {
            // TODO: Gal, you should handle this case
          echo '<img src="http://i.stack.imgur.com/SBv4T.gif" alt="this slowpoke moves"  width=250/>';
        }
    }
}


?>

    
</body>
</html>