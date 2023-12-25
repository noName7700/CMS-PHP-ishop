<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Новый товар</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>/product">Список товаров</a></li>
              <li class="breadcrumb-item active">Новый товар</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="<?=ADMIN;?>/product/add" method="POST" data-toggle="validator" id="add">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Наименование товара</label>
                                <input type="text" name="title" class="form-control" id="title" value="<?php isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : null;?>" placeholder="Наименование товара" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Родительская категория</label>
                                <?php new \app\widgets\menu\Menu([
                                    "tpl" => WWW . "/menu/select.php",
                                    "container" => "select", 
                                    "cache" => 0,
                                    "cacheKey" => "admin_select",
                                    "class" => "form-control",
                                    "attrs" => [
                                        "name" => "category_id",
                                        "id" => "category_id",
                                    ],
                                    "prepend" => '<option>Выберите категорию</option>'
                                ]); ?>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="keywords" class="form-control" id="keywords" value="<?php isset($_SESSION['form_data']['keywords']) ? h($_SESSION['form_data']['keywords']) : null;?>" placeholder="Ключевые слова">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="description">Описание</label>
                                <input type="text" name="description" class="form-control" id="description" value="<?php isset($_SESSION['form_data']['description']) ? h($_SESSION['form_data']['description']) : null;?>" placeholder="Описание">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="description">Цена</label>
                                <input type="text" name="price" class="form-control" id="price" value="<?php isset($_SESSION['form_data']['price']) ? h($_SESSION['form_data']['price']) : null;?>" placeholder="Цена" pattern="^[0-9.]{1,}$" required data-error="Допускаются цифры и десятичная точка">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="description">Старая цена</label>
                                <input type="text" name="old_price" class="form-control" id="old_price" value="<?php isset($_SESSION['form_data']['old_price']) ? h($_SESSION['form_data']['old_price']) : null;?>" placeholder="Старая цена" pattern="^[0-9.]{1,}$" data-error="Допускаются цифры и десятичная точка">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="content">Контент</label>
                                <textarea name="content" id="editor1" cols="80" rows="10"><?php isset($_SESSION['form_data']['content']) ? $_SESSION['form_data']['content'] : null;?></textarea>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" checked> Статус
                                </label>                               
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="hit"> Хит
                                </label>                               
                            </div>
                            <div class="form-group">
                                <label for="related">Связанные товары</label>   
                                <select name="related[]" class="form-control select2" id="related" multiple="" style="width: 400px"></select>                            
                            </div>
                            <?php new \app\widgets\filter\Filter(null, WWW . "/filter/admin_filter_tpl.php"); ?>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="card card-danger card-solid">
                                        <div class="card-header">
                                            <h3 class="card-title">Базовое изображение</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="single" class="btn btn-success" data-url="product/add-image" data-name="single">
                                                Выбрать файл
                                            </div>
                                            <p><small>Рекомендуемые размеры: 125x200</small></p>
                                            <div class="single"></div>
                                        </div>
                                        <div class="overlay">
                                            <i class="fas fa-2x fa-sync-alt"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card card-primary card-solid">
                                        <div class="card-header">
                                            <h3 class="card-title">Картинки галереи</h3>
                                        </div>
                                        <div class="card-body">
                                            <div id="multi" class="btn btn-success" data-url="product/add-image" data-name="multi">
                                                Выбрать файл
                                            </div>
                                            <p><small>Рекомендуемые размеры: 700x1000</small></p>
                                            <div class="multi"></div>
                                        </div>
                                        <div class="overlay">
                                            <i class="fas fa-2x fa-sync-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>
                    <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->