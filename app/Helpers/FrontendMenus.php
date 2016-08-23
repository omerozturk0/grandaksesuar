<?php

namespace App\Helpers;

use App\Repositories\MenuRepository;

/**
 * Navigasyon bar listesi
 */
class FrontendMenus
{
    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepo = $menuRepo;
        $this->menus = $menuRepo->all();
    }

    public function makeNavBar($area = "top")
    {
        echo $area == "top" ? '<ul class="list-inline">' : '<ul>';

        foreach ($this->menus->where('area', $area) as $key => $menu) {
            if ($menu->special_url === null and count($menu->page)) {
                echo '<li><a href="'.url($menu->page->slug).'">'.$menu->title.'</a></li>';
            } elseif ($menu->special_url !== null) {
                if (strstr($menu->special_url, url('/'))) {
                    echo '<li><a href="'.$menu->special_url.'">'.$menu->title.'</a></li>';
                } else {
                    echo '<li><a href="'.$menu->special_url.'" target="_blank">'.$menu->title.'</a></li>';
                }
            } else {
                echo '<li><a href="#">'.$menu->title.'</a></li>';
            }
        }

        echo '</ul>';
    }
}
