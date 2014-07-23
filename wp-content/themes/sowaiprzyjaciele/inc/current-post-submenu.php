<?php

/**
 * Returns an array containing all the objects ("nav_menu_item" type posts)
 * belonging to the same submenu as the passed $post object.
 * If the $post's menu item is at the root of the menu, the returned items array
 * will contain the $post's menu item and its children
 * (or only the $post's menu item if it's childless).
 * If the $post's menu item is a child of some other menu item, the array
 * will contain that item and all the soblings of the $post's item (including itself).
 * 
 * If the $menu_location_name doesn't exist or the $post's menu item
 * could not be found in the menu, the function returns false.
 * 
 * @param string $menu_location_name - to samo co w argumencie 'theme_location' funkcji wp_nav_menu()
 * @param WP_Post $post - obiekt bieżącego postu 
 * @return array/bool(false)
 */
function sip_get_current_post_submenu($menu_location_name, $post) {
    $locations = get_nav_menu_locations();
    if(!isset($locations[$menu_location_name])) {
        return false;
    }
    
    $menu = wp_get_nav_menu_object($locations[$menu_location_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $current_item = null;
    foreach($menu_items as $item) {
        if($item->object_id == $post->ID) {
            $current_item = $item;
        }
    }
    if(empty($current_item)) {
        return false;
    }
    $submenu_items = array();
    
    if(empty($current_item->menu_item_parent)) {
        $submenu_items[] = $current_item;
        //current post's item is a parent of zero or more menu items, collect its children
        foreach($menu_items as $item) {
            if($item->menu_item_parent == $current_item->ID) {
                $submenu_items[] = $item;
            }
        }
    } else {
        //current post's item is a child of some other menu item, collect its parent and siblings (including itself)
        foreach($menu_items as $item) {
            if($item->ID == $current_item->menu_item_parent) {
                $submenu_items[] = $item;
            } else if($item->menu_item_parent == $current_item->menu_item_parent) {
                $submenu_items[] = $item;
            }
        }
    }
    
    return array(
        'items' => $submenu_items,
        'current_item' => $current_item,
        'items_count' => count($submenu_items)
    );
}



function sip_render_current_post_submenu(array $submenu) {
    if(!isset($submenu['items']) || !isset($submenu['current_item'])) {
        return false;
    }
    ?>
        <ul class="current-post-submenu">
            <?php foreach($submenu['items'] as $item) : ?>
                <li class="current-post-submenu-item <?php echo ($item == $submenu['current_item']) ? 'active' : '' ?>">
                    <a href="<?php echo $item->url ?>"><?php echo $item->title ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php
    return true;
}