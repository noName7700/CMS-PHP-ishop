<?php

namespace app\controllers\admin;

use ishop\App;
use app\models\Category;
use app\models\AppModel;

class CategoryController extends AppController
{
    public function indexAction()
    {
        $this->setMeta("Список категорий");
    }

    public function deleteAction()
    {
        $id = $this->getRequestId();
        $children = \R::count("category", "parent_id = ?", [$id]);
        $errors = "";
        if ($children) {
            $errors .= "<li>Удаление невозможно. В категории имеются вложенные элементы</li>";
        }
        $products = \R::count("product", "category_id = ?", [$id]);
        if ($products) {
            $errors .= "<li>Удаление невозможно. В категории имеются товары</li>";
        }
        if ($errors) {
            $_SESSION['error']= "<ul>$errors</ul>";
            redirect();
        }
        $category = \R::load("category", $id);
        \R::trash($category);
        $_SESSION['success'] = "Категория удаления";
        redirect();
    }

    public function addAction()
    {
        if (!empty($_POST)) {
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if (!$category->validate($data)) {
                $category->getErrors();
                redirect();
            }
            if ($id = $category->save("category")) {
                $alias = AppModel::createAlias("category", "alias", $data['title'], $id);
                $cat = \R::load("category", $id);
                $cat->alias = $alias;
                \R::store($cat);
                $_SESSION['success'] = "Категория добавлена";
            }
            redirect();
        }
        $this->setMeta("Новая категория");
    }

    public function editAction()
    {
        if (!empty($_POST)) {
            $id = $this->getRequestId(false);
            $category = new Category();
            $data = $_POST;
            $category->load($data);
            if (!$category->validate($data)) {
                $category->getErrors();
                redirect();
            }
            if ($category->update("category", $id)) {
                $alias = AppModel::createAlias("category", "alias", $data['title'], $id);
                $category = \R::load("category", $id);
                $category->alias = $alias;
                \R::store($category);
                $_SESSION['success'] = "Изменения сохранены";
            }
            redirect();
        }
        $id = $this->getRequestId();
        $category = \R::load("category", $id);
        App::$app->setProperty("parent_id", $category->parent_id);
        $this->setMeta("Редактирование категории {$category->title}");
        $this->set(compact("category"));
    }
}