<?php

namespace SpongeAdmin\View\Helper;

use Cake\View\Helper;
use Cake\Routing\Router;
use Cake\Cache\Cache;

/**
 * Helper for creating an unordered list items of links
 * for the main admin navigation menu.
 */
class AdminMenuHelper extends Helper
{
    /**
     * Use Html helper
     * @var array
     */
    public $helpers = ['Html'];

    /**
     * Navigation menu for the admin layout, including svg icons for each link.
     * @param  array   $allpages    array of links to be in the menu.
     * @param  string  $url         URL of current page.
     * @return string               HTML — list items for the menu.
     */
    public function adminNav($allpages, $url, $user)
    {
        $items = '';
        foreach ($allpages as $page) {

            if(isset($page['svg'])) {
                $svg = '<svg class="icon icon-' .
                $page['svg'] . '"><use xlink:href="/img/admin/icons.svg#icon-' . $page['svg'] .
                '"></use></svg>';
            } else {
                $svg = '';
            }
            $adminAccess = in_array($user->role, $page['adminRoles']);
            if($user->is_superuser || $adminAccess) {
                $pageUrl = Router::url([
                    'plugin' => $page['plugin'],
                        'controller' => $page['controller'],
                        'action' => $page['action']
                    ]);

                if ($pageUrl == $url) {
                    $items .= '<li class="primary-item active '. $page['liClass'] . '">' .
                    $svg . '<span>' . $page['linkTitle'] . '</span></li>' . "\n";
                } else {
                    if (!isset($page['query'])) $page['query'] = null;
                    $items .= '<li class="primary-item ' . $page['liClass'] . '">' .
                    $this->Html->link($svg . '<span>' . $page['linkTitle'] . '</span>', [
                        'plugin' => $page['plugin'],
                        'controller' => $page['controller'],
                        'action' => $page['action'],
                        '?' => $page['query']
                    ], ['escape' => false]) . '</li>' . "\n";
                }
            }
        }
        return $items;
    }
}
