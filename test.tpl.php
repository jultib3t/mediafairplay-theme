<link rel="stylesheet" href="https://cdn.rawgit.com/balzss/luxbar/ae5835e2/build/luxbar.min.css">
<?php
/**
 * Template Name: test
 */
// By location.
$menu_name = 'Header';
$locations = get_nav_menu_locations();
$menu_id   = $locations[$menu_name];

/* function wp_get_menu_array($menu_id)
 {
     //$logo = the_custom_logo();
     $array_menu = wp_get_nav_menu_items($menu_id);
     $menu = array();
     foreach ($array_menu as $father) {
         if (empty($father->menu_item_parent)) {
             $menu[$father->ID] = array();
             $menu[$father->ID]['ID']             =   $father->ID;
             $menu[$father->ID]['title']          =   $father->title;
             $menu[$father->ID]['url']            =   $father->url;
             $menu[$father->ID]['children']       =   array();
             $childMenu = array();
             foreach ($array_menu as $child) {
                 if ($child->menu_item_parent == $father->ID) {
                     $childMenu[$child->ID] = array();
                     $childMenu[$child->ID]['ID']          =   $child->ID;
                     $childMenu[$child->ID]['title']       =   $child->title;
                     $childMenu[$child->ID]['url']         =   $child->url;
                     $childMenu[$child->ID]['children']       =   array();
                     $grandChildMenu = array();
                     foreach ($array_menu as $grandfather) {
                         if ($grandfather->menu_item_parent == $child->ID) {
                             $grandChildMenu[$grandfather->ID] = array();
                             $grandChildMenu[$grandfather->ID]['ID']          =   $grandfather->ID;
                             $grandChildMenu[$grandfather->ID]['title']       =   $grandfather->title;
                             $grandChildMenu[$grandfather->ID]['url']         =   $grandfather->url;
                             $childMenu[$grandfather->menu_item_parent]['children'][$grandfather->ID] = $grandChildMenu[$grandfather->ID];
                         }
                     }
                     $menu[$child->menu_item_parent]['children'][$child->ID] = $childMenu[$child->ID];
                 }
             }
         }
     }
     return $menu;
 }

 function mfp_menu_generate($menu_id)
 {

     //var_dump( $image );
     $x = wp_get_menu_array($menu_id);
     $html = '';
     foreach ($x as $key) {
         $html .= '<li class="luxbar-item  dropdown"><a class="nav-link" href="' . $key['url'] . '">' . $key['title'] . '</a>';

         if (!empty($key['children'])) {
             $html .= '<ul class="dropdown-menu">';

             foreach ($key['children'] as $new) {
                 $html .= '<li class="luxbar-item dropdown">';
                 $html .= '<a class="nav-link dropdown-toggle" href="' . $new['url'] . '">' . $new['title'] . '</a>';
                 if (!empty($new['children'])) {
                     $html .= '<ul>';
                     foreach ($new['children'] as $newnew) {
                         $html .= '<li class="luxbar-item dropdown"><a class="nav-link dropdown-toggle" href="' . $newnew['url'] . '">' . $newnew['title'] . '</a></li>';
                     }
                     $html .= '</ul>';
                 }

                 $html .= '</li>';
             }

             $html .= '</ul>';
         }
         $html .= '</li>';
     }

     return $html;
 } */
// echo mfp_menu_generate($menu_id);
// echo mfp_menu_generate( $menu_name);
?>


<?php
// casino canuck

/* 
function wp_get_menu_array($current_menu)
{

    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = array();
    foreach ($array_menu as $father) {
        if (empty($father->menu_item_parent)) {
            $menu[$father->ID] = array();
            $menu[$father->ID]['ID']             =   $father->ID;
            $menu[$father->ID]['title']          =   $father->title;
            $menu[$father->ID]['url']            =   $father->url;
            $menu[$father->ID]['children']       =   array();
            $childMenu = array();
            foreach ($array_menu as $child) {
                if ($child->menu_item_parent == $father->ID) {
                    $childMenu[$child->ID] = array();
                    $childMenu[$child->ID]['ID']          =   $child->ID;
                    $childMenu[$child->ID]['title']       =   $child->title;
                    $childMenu[$child->ID]['url']         =   $child->url;
                    $childMenu[$child->ID]['children']       =   array();
                    $grandChildMenu = array();
                    foreach ($array_menu as $grandfather) {
                        if ($grandfather->menu_item_parent == $child->ID) {
                            $grandChildMenu[$grandfather->ID] = array();
                            $grandChildMenu[$grandfather->ID]['ID']          =   $grandfather->ID;
                            $grandChildMenu[$grandfather->ID]['title']       =   $grandfather->title;
                            $grandChildMenu[$grandfather->ID]['url']         =   $grandfather->url;
                            $childMenu[$grandfather->menu_item_parent]['children'][$grandfather->ID] = $grandChildMenu[$grandfather->ID];
                        }
                    }
                    $menu[$child->menu_item_parent]['children'][$child->ID] = $childMenu[$child->ID];
                }
            }
        }
    }
    return $menu;
}
function cc_menu_generate($current_menu)
{
    $x = wp_get_menu_array($current_menu);
    $html           =   '<ul class="navbar-nav">';
    foreach ($x as $key) {
        $html .= '<li class="nav-item"><a class="nav-link" href="' . $key['url'] . '">' . $key['title'] . '</a>';

        if (!empty($key['children'])) {
            $html .= '<ul class="dropdown-menu">';

            foreach ($key['children'] as $new) {
                $html .= '<li class="nav-item dropdown">';
                $html .= '<a class="nav-link dropdown-toggle" href="' . $new['url'] . '">' . $new['title'] . '</a>';
                if (!empty($new['children'])) {
                    $html .= '<ul>';
                    foreach ($new['children'] as $newnew) {
                        $html .= '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="' . $newnew['url'] . '">' . $newnew['title'] . '</a></li>';
                    }
                    $html .= '</ul>';
                }


                $html .= '</li>';
            }


            $html .= '</ul>';
        }
        $html .= '</li>';
    }
    $html .= '</ul>';

    return $html;
}

 echo cc_menu_generate($menu_id); */
?>
<section class="table-generator">
    <div class="thead_tr">
        <span>Rank</span>
        <span>Casino</span>
        <span>Bonus</span>
        <span>Visit</span>
        <span>Info</span>
        <span>Review</span>
    </div>
    <div class="tbody">
        <div class="tbody_tr">
            <span>1</span>
            <span><img src="https://www.reputableonlinecasinos.ca/wp-content/uploads/2020/06/Jackpot-City-162x79-1.png"></span>
            <span>$1600</span>
            <span><a href="#">Play Now</a></span>
            <span>The best online casino in Canada keeps rewarding players with a huge welcome bonus and fabulous gaming</span>
            <span>4.5 / 5</span>
        </div>
    </div>
</section>