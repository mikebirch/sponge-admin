<?php

namespace SpongeAdmin\View\Helper;

use Cake\View\Helper;
use Cake\Cache\Cache;

/**
 * Helper for creating unordered list items of links for navigation menus
 */
class MenuHelper extends Helper
{
    /**
     * Use Html helper
     * @var array
     */
    public $helpers = array('Html');

    /**
     * Creates list items for a navigation menu
     * @param  array   $allpages    array of links to be in the menu.
     * @param  string  $url         URL of current page.
     * @param  boolean $primary     primary navigation menu.
     * @param  boolean $loggedIn    User is logged in.
     * @param  integer $parent_slug slug of the parent record.
     * @param  boolean $button      add a class to the anchor for buttons.
     * @return string               HTML — list items for the menu.
     */
    function nav($allpages, $url, $primary = true, $loggedIn = false, $parent_slug = null, $settings = null ) {
        $link = '';

        $subNav = $settings['subNav'];

        foreach ($allpages as $page) {
            // home page has slug = ''
            if ($page['path'] == '/') {
                $liclass = 'home-nav primary-item';
            } else {
                $liclass = $page['slug'].'-nav';
                if($primary) {
                    $liclass .=  ' primary-item';
                } else {
                    $liclass .=  ' sub-nav-item';
                }
            }
            if($loggedIn || (!$loggedIn && $page['public'])) {
                if(isset($subNav[$page['path']])) {
                    $link .= '<li class="'.$liclass.'"><a href="'.$subNav[$page['path']]['path'].'" title="'.$subNav[$page['path']]['nav'].'">'.$subNav[$page['path']]['nav'].'</a></li>'."\n";
                }
                if ($page['path'] == $url) {
                    $link .= '<li class="active '.$liclass.'">'.$page['nav'].'</li>'."\n";   
                } else {
                    $link .= '<li class="'.$liclass.'"><a href="'.$page['path'].'" title="'.$page['nav'].'">'.$page['nav'].'</a></li>'."\n";
                }
            }
        }
        return $link;
    }   

    /**
     * Navigation menu for the admin layout, including svg icons for each link.
     * @param  array   $allpages    array of links to be in the menu.
     * @param  string  $url         URL of current page.
     * @return string               HTML — list items for the menu.
     */
    function adminNav($allpages, $url) {
        $link = '';
        foreach ($allpages as $page) {
                
            if(isset($page['svg'])) {
                $svg = '<svg class="icon icon-' . $page['svg'] . '"><use xlink:href="#icon-' . $page['svg'] . '"></use></svg>';
            } else {
                $svg = '';
            }

            if ($page['path'] == $url) {
                $link .= '<li class="primary-item active '. $page['liClass'] . '">' . $svg . '<span>' . $page['nav'] . '</span></li>' . "\n";   
            } else {
                $link .= '<li class="primary-item ' . $page['liClass'] . '"><a href="'.$page['path'] . 
                '" title="' . $page['nav'] . '">' . $svg . '<span>' . $page['nav'] . '</span>' . '</a></li>' . "\n";
            }
        }
        return $link;
    }
}