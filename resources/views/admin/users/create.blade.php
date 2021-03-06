@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить пользователя
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            {!! Form::open(['route' => 'users.store', 'files' => true]) !!}
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем пользователя</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">

                            @include('admin.errors')

                            <div class="form-group">
                                <label for="exampleInputEmail1">Имя</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Пароль</label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Подтверждение Пароля</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Статус пользователя</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="role_id" value="1" checked>
                                        Editor
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="role_id" value="2">
                                        Admin
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Permission</label>
                                <div class="permissions-inline">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" value="1" checked>
                                            Manage Ingredients
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" value="2">
                                            Manage Categories
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" value="2">
                                            Manage Dishes
                                        </label>
                                    </div>
                                </div>
                                <div class="permissions-inline">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" value="2">
                                            See Users
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" value="2">
                                            Add Users
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" value="2">
                                            Edit Users
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="" value="2">
                                            Delete Users
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <label for="exampleInputFile">Загрузить аватар</label>
                                <input type="file" name="image" id="exampleInputFile">

                                <p class="help-block">Формат изображения: jpeg, jpg, bmp, png. Максимальный размер 1024 Мб</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button class="btn btn-success">Добавить</button>
                        <a href="{{ route('users.index')}}" class="btn btn-default">Назад</a>
                    </div>
                    <!-- /.box-footer-->
                </div>
                <!-- /.box -->
            {!! Form::close() !!}

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection