<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Очистка кэша</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item active">Очистка кэша</li>
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
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Описание</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Кэш категорий</td>
                                        <td>Меню категорий на сайте. Кэшируются на 1 час</td>
                                        <td>
                                          <a class="delete" href="<?=ADMIN;?>/cache/delete?key=category"><i class="fas fa-fw fa-times text-danger"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Кэш фильтров</td>
                                        <td>Кэш фильтров на сайте. Кэшируются на 1 час</td>
                                        <td>
                                          <a class="delete" href="<?=ADMIN;?>/cache/delete?key=filter"><i class="fas fa-fw fa-times text-danger"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->