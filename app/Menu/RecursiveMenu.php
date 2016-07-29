<?php
/**
 * Created by PhpStorm.
 * User: Omer
 * Date: 13.7.2015
 * Time: 01:08
 */

namespace App\Menu;


class RecursiveMenu
{

    public function getMenu()
    {
        $menus = \App\Menu::roots()->get();

        echo '<ul>';
        foreach ($menus as $menu) $this->renderNode($menu);
        echo '</ul>';
    }

    public function renderNode($node)
    {
        echo '<li>';
        echo $node->name;

        if ($node->children->count()){
            echo '<ul>';
                foreach ($node->children()->get() as $child) $this->renderNode($child);
            echo '</ul>';
        }

        echo '</li>';
    }

}