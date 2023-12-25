<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование товара <?=$product->title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>/product">Список товаров</a></li>
              <li class="breadcrumb-item active">Редактирование</li>
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
                    <form action="<?=ADMIN;?>/product/edit" method="POST" data-toggle="validator" id="add">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Наименование товара</label>
                                <input type="text" name="title" class="form-control" id="title" value="<?=h($product->title);?>" placeholder="Наименование товара" required>
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
                                ]); ?>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="keywords" class="form-control" id="keywords" value="<?=h($product->keywords);?>" placeholder="Ключевые слова">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="description">Описание</label>
                                <input type="text" name="description" class="form-control" id="description" value="<?=$product->description;?>" placeholder="Описание">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="description">Цена</label>
                                <input type="text" name="price" class="form-control" id="price" value="<?=$product->price;?>" placeholder="Цена" pattern="^[0-9.]{1,}$" required data-error="Допускаются цифры и десятичная точка">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="description">Старая цена</label>
                                <input type="text" name="old_price" class="form-control" id="old_price" value="<?=$product->old_price;?>" placeholder="Старая цена" pattern="^[0-9.]{1,}$" data-error="Допускаются цифры и десятичная точка">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="content">Контент</label>
                                <textarea name="content" id="editor1" cols="80" rows="10"><?=$product->content;?></textarea>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" <?=$product->status ? " checked" : null;?>> Статус
                                </label>                               
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="hit" <?=$product->hit ? " checked" : null;?>> Хит
                                </label>                               
                            </div>
                            <div class="form-group">
                                <label for="related">Связанные товары</label>   
                                <select name="related[]" class="form-control select2" id="related" multiple="" style="width: 400px">
                                    <?php if (!empty($related_product)): ?>
                                        <?php foreach ($related_product as $item): ?>
                                            <option value="<?=$item['related_id'];?>" selected><?=$item['title'];?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>                            
                            </div>
                            <?php new \app\widgets\filter\Filter($filter, WWW . "/filter/admin_filter_tpl.php"); ?>
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
                                            <div class="single">
                                                <img src="/images/<?=$product->img;?>" alt="" style="max-height: 150px">
                                            </div>
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
                                            <div class="multi">
                                                <?php if (!empty($gallery)): ?>
                                                    <?php foreach ($gallery as $item): ?>
                                                        <img src="/images/<?=$item;?>" alt="" style="max-height: 150px; cursor: pointer" data-id="<?=$product->id;?>" data-src="<?=$item;?>" class="del-item">
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="overlay">
                                            <i class="fas fa-2x fa-sync-alt"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?=$product->id;?>">
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