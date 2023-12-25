<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Группы фильтров</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item active">Группы фильтров</li>
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
                            <a href="<?=ADMIN;?>/filter/group-add" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i>Добавить группу</a>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Наименование</th>
                                        <th>Действие</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($attrs_group as $item): ?>
                                    <tr>
                                        <td><?=$item->title;?></td>
                                        <td>
                                            <a href="<?=ADMIN;?>/filter/group-edit?id=<?=$item->id;?>"><i class="fas fa-fw fa-eye"></i></a>
                                            <a class="delete" href="<?=ADMIN;?>/filter/group-delete?id=<?=$item->id;?>"><i class="fas fa-fw fa-times text-danger"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
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