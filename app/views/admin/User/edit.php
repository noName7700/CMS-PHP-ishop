<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование пользователя</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
              <li class="breadcrumb-item"><a href="<?=ADMIN;?>/user">Список пользователей</a></li>
              <li class="breadcrumb-item active">Редактирование пользователя</li>
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
                    <form action="<?=ADMIN;?>/user/edit" method="POST" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Логин</label>
                                <input type="text" class="form-control" name="login" id="login" value="<?=h($user->login);?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="password">Пароль</label>
                                <input type="text" class="form-control" name="password" id="password" value="Введите пароль, если хотите его изменить"> 
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?=h($user->name);?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?=h($user->email);?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="address">Адрес</label>
                                <input type="text" class="form-control" name="address" id="address" value="<?=h($user->address);?>" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="role">Роль</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="user" <?php if ($user->role == "user") echo " selected";?>>Пользователь</option>
                                    <option value="admin"  <?php if ($user->role == "admin") echo " selected";?>>Администратор</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="<?=$user->id;?>">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
                <h3>Заказы пользователя</h3>
                <div class="box box-body">
                    <?php if ($orders): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Статус</th>
                                        <th>Сумма</th>
                                        <th>Дата создания</th>
                                        <th>Дата изменения</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($orders as $order): ?>
                                    <?php $class = $order['status'] ? 'success' : "";?>
                                    <tr class="<?=$class;?>">
                                        <td><?=$order['id'];?></td>
                                        <td><?=$order['status'] ? "Завершен" : "Новый";?></td>
                                        <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                        <td><?=$order['date'];?></td>
                                        <td><?=$order['update_at'];?></td>
                                        <td>
                                            <a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="fas fa-fw fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="text-danger">Пользователь пока ничего не заказывал...</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->