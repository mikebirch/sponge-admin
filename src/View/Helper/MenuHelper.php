<?php

namespace SpongeAdmin\View\Helper;

use Cake\View\Helper;

/**
 * Helper for creating unordered list items of links for navigation menus
 */
class MenuHelper extends Helper
{

    /**
     * Creates list items for a navigation menu
     * @param  array   $allpages    array of links to be in the menu.
     * @param  string  $url         URL of current page.
     * @param  boolean $primary     primary navigation menu.
     * @param  boolean $loggedIn    User is logged in.
     * @param  integer $parent_id   id of the parent record.
     * @param  boolean $button      add a class to the anchor for buttons.
     * @return string               HTML — list items for the menu.
     */
    public function nav($allpages, $url, $primary = true, 
        $loggedIn = false, $parent_id = null, $settings = null ) {
        
        $items = '';

        $subNavItems = $settings['subNav'][$parent_id];

        $last = count($allpages)-1;

        foreach ($allpages as $key => $page) {

            if(!empty($subNavItems)) {
                $lastItems = '';
                foreach($subNavItems as $subNav) {
                    if($loggedIn || (!$loggedIn && $subNav['public'])) {
                        if($key == $subNav['position']  ||
                            (($key === $last) && ($last < $subNav['position']))) {
                            $extra = $this->buildItem(
                                $subNav['slug'] . '-nav sub-nav-item',
                                $url, 
                                $subNav['path'], 
                                $subNav['nav']
                            );
                        }
                        if($key == $subNav['position']) {
                            $items .= $extra;
                        }
                        if(($key === $last)  && ($last < $subNav['position'])) {
                            $lastItems .= $extra;
                        }
                    }
                }
            }

            if($loggedIn || (!$loggedIn && $page['public'])) {
                // home page has slug = ''
                if ($page['path'] == '/') {
                    $liClass = 'home-nav primary-item';
                } else {
                    $liClass = $page['slug'].'-nav';
                    if($primary) {
                        $liClass .=  ' primary-item';
                    } else {
                        $liClass .=  ' sub-nav-item';
                    }
                }
                $items .= $this->buildItem($liClass, $url, $page['path'], $page['nav']);
            }

            if(isset($lastItems) && ($key === $last)) {
                $items .= $lastItems;
            }

        }
        return $items;
    }   

    /**
     * Build the HTML for a list item in the emnu
     * @param  string $liClass CSS class for the li tag
     * @param  string $url     URL of current page
     * @param  string $path    path of link
     * @param  string $nav     Name of the page in the menu
     * @return string          HTML of the list item
     */
    private function buildItem($liClass, $url, $path, $nav) {
        if($url == $path) {
            $item = '<li class="active ' . $liClass.'">'.$nav.'</li>' . "\n";   
        } else {
            $item = '<li class="'.$liClass.'"><a href="' . $path . '" title="'.$nav .'">' . 
            $nav.'</a></li>'."\n";
        }
        return $item;
    }
}
