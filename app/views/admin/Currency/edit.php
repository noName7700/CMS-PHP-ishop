<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование валюты <?=$currency->title;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>/currency">Список валют</a></li>
              <li class="breadcrumb-item active">Редактирование валюты</li>
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
                    <form action="<?=ADMIN;?>/currency/edit" method="POST" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Наименование валюты</label>
                                <input value="<?=h($currency->title);?>" type="text" name="title" class="form-control" id="title" placeholder="Наименование валюты" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="code">Код валюты</label>
                                <input value="<?=h($currency->code);?>" type="text" name="code" class="form-control" id="code" placeholder="Код валюты" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="symbol_left">Символ слева</label>
                                <input value="<?=h($currency->symbol_left);?>" type="text" name="symbol_left" class="form-control" id="symbol_left" placeholder="Символ слева">
                            </div>
                            <div class="form-group">
                                <label for="symbol_right">Символ справа</label>
                                <input value="<?=h($currency->symbol_right);?>" type="text" name="symbol_right" class="form-control" id="symbol_right" placeholder="Символ справа">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="code">Значение</label>
                                <input value="<?=h($currency->value);?>" type="text" name="value" class="form-control" id="value" placeholder="Значение" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="base" <?php if ($currency->base) echo " checked"; ?>>
                                    Базовая валюта
                                </label>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?=$currency->id;?>">
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