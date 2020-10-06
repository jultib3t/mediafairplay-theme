<?php

  // By location.
  $menu_name = 'Header';
  $locations = get_nav_menu_locations();
  $menu_id   = $locations[$menu_name];
  function wp_get_menu_array($menu_id)
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

  function custom_header_menu($menu_id)
  {
    $items = wp_get_menu_array($menu_id);
    $html = '<ul class="main-menu clearfix">';
    foreach ($items as $item) {
      if (!empty($item['children'])) {
        $subs = $item['children'];

        $string = str_replace(' ', '', $item['title']);
        // print_r($subs);
        $html .= '<li>
                      <a class="menu-item" href="' . $item['url'] . '">' . __($item['title'], 'mediafairplay') . ' <span class="caret"></span>
                        <label class="caret" for="' . $string . '" title=""></label></a>
                      <input id="' . $string . '" type="checkbox" />
                      <ul class="sub-menu">';
        foreach ($subs as $sub) {
          if (!empty($sub['children'])) {
            $string = str_replace(' ', '', $sub['title']);
            $grand_subs = $sub['children'];
            $html .= ' 
                            <li>
                                    <a class="menu-item" href="' . $sub['url'] . '">' . __($sub['title'], 'mediafairplay') . ' <span class="caret"></span>
                                      <label class="caret" for="' . $string . '" title=""></label></a>
                                    <input id="' . $string . '" type="checkbox" />
                                    <ul class="sub-menu">';
            foreach ($grand_subs as $grand) {
              if (!empty($grand['children'])) {
                $html .= '<li>
                                        <a class="menu-item" href="' . $grand['url'] . '">' . $grand['title'] . ' <span class="caret"></span><label class="caret" for="Test2" title=""></label></a><input id="Test2" type="checkbox" />
                                        <ul class="sub-menu">
                                          <li>
                                            <a href="#">A</a>
                                          </li>
                                          <li>
                                            <a href="#">B</a>
                                          </li>
                                        </ul>
                                      </li>';
              } else {
                $html .= '<li>
                                              <a class="menu-item" href="' . $grand['url'] . '">' . $grand['title'] . '</a>
                                            </li>';
              }
            }
            $html .= '</ul>
                          </li>';
          } else {
            $html .= ' 
                          <li>
                                <a class="menu-item" href="' . $sub['url'] . '">' . $sub['title'] . '</a>
                      </li>';
          }
        }
        $html .=  '</ul>
                      </li>';
      } else {
        $html .= '<li>
                <a class="menu-item" href="' . $item['url'] . '">' . $item['title'] . '</a>
              </li>';
      }
    }
    $html .= '</ul>';
    return $html;
  }