<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование категории <?=$category->title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>/category">Список категорий</a></li>
              <li class="breadcrumb-item active"><?=$category->title;?></li>
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
                    <form action="<?=ADMIN;?>/category/edit" method="POST" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Наименование категории</label>
                                <input value="<?=h($category->title);?>" type="text" name="title" class="form-control" id="title" placeholder="Наименование категории" required>
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
                                        "name" => "parent_id",
                                        "id" => "parent_id",
                                    ],
                                    "prepend" => '<option value="0">Самостоятельная категория</option>'
                                ]); ?>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input value="<?=h($category->keywords);?>" type="text" name="keywords" class="form-control" id="keywords" placeholder="Ключевые слова">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="description">Описание</label>
                                <input value="<?=h($category->description);?>" type="text" name="description" class="form-control" id="description" placeholder="Описание">
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?=$category->id;?>">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->