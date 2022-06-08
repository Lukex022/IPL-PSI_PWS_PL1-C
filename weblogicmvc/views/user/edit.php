<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="./?c=user&a=update&id=<?=$user->id?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?= $user->username ?>">
                                <?php
                                if(isset ($user->errors)) {
                                    if (is_array($user->errors->on('username'))) {
                                        $errors = $user->errors->on('username');
                                        foreach ($errors as $error) {
                                            echo $error . '<\br>';
                                        }
                                    } else {
                                        echo $user->errors->on('username');
                                    }
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="<?= $user->password ?>"><?php if(isset($user->errors)){ echo $user->errors->on('password');} ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $user->email ?>"><?php if(isset($user->errors)){ echo $user->errors->on('email');} ?>
                            </div>
                            <div class="form-group">
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $user->telefone ?>"><?php if(isset($user->errors)){ echo $user->errors->on('telefone');} ?>
                            </div>
                            <div class="form-group">
                                <label for="nif">Nif</label>
                                <input type="text" class="form-control" id="nif" name="nif" value="<?= $user->nif ?>"><?php if(isset($user->errors)){ echo $user->errors->on('nif');} ?>
                            </div>
                            <div class="form-group">
                                <label for="morada">Morada</label>
                                <input type="text" class="form-control" id="morada" name="morada" value="<?= $user->morada ?>"><?php if(isset($user->errors)){ echo $user->errors->on('morada');} ?>
                            </div>
                            <div class="form-group">
                                <label for="codigo_postal">Cod. Postal</label>
                                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="<?= $user->codigo_postal ?>"><?php if(isset($user->errors)){ echo $user->errors->on('codigo_postal');} ?>
                            </div>
                            <div class="form-group">
                                <label for="localidade">Localidade</label>
                                <input type="text" class="form-control" id="localidade" name="localidade" value="<?= $user->localidade ?>"><?php if(isset($user->errors)){ echo $user->errors->on('localidade');} ?>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input readonly type="text" class="form-control" id="role" name="role" value="<?= $user->role ?>"><?php if(isset($user->errors)){ echo $user->errors->on('role');} ?>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Editar</button> <a href="./?c=user&a=index" class="btn btn-primary float-right">Voltar</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>