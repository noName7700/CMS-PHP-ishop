<?php 

namespace app\models;

class Product extends AppModel
{
    public function setRecentlyViewed($id)
    {
        $recenltyViewed = $this->getAllRecentlyViewed();
        if (!$recenltyViewed) {
            setcookie("recentlyViewed", $id, time() + 3600, "/");
        }
        else {
            $recenltyViewed = explode(".", $recenltyViewed);
            if (!in_array($id, $recenltyViewed)) {
                $recenltyViewed[] = $id;
                $recenltyViewed = implode(".", $recenltyViewed);
                setcookie("recentlyViewed", $recenltyViewed, time() + 3600, "/");
            }
            //реализовать добавление id в конец
        }
    }

    public function getRecentlyViewed()
    {
        if (!empty($_COOKIE['recentlyViewed'])) {
            $recenltyViewed = $_COOKIE['recentlyViewed'];
            $recenltyViewed = explode(".", $recenltyViewed);
            return array_slice($recenltyViewed, -3);
        }
        return false;
    }

    public function getAllRecentlyViewed()
    {
        if (!empty($_COOKIE['recentlyViewed'])) {
            return $_COOKIE['recentlyViewed'];
        }
        return false;
    }
}