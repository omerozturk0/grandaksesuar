<?php

namespace App\Helpers;

use App\Repositories\CategoryRepository;

/**
 * Navigasyon bar listesi
 */
class NavigationBar
{
    public function __construct(CategoryRepository $catRepo)
    {
        $this->catRepo = $catRepo;
        $this->cats = $catRepo->all();
    }

    public function makeNavBar($parent_id = null)
    {
        echo $parent_id === null ? '<ul class="nav sf-menu">' : '<ul>';

        foreach ($this->cats->where('parent_id', $parent_id) as $key => $cat) {
            echo '<li><a href="'.url("cat/".$cat->slug).'">'.$cat->name.'</a>';
            if (count($this->cats->where('parent_id', $cat->id))) {
                $this->makeNavBar($cat->id);
            }
            echo '</li>';
        }

        echo '</ul>';
    }
}
