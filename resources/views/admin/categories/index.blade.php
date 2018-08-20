@extends('admin.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Список категорий блюд
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Листинг сущности</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{ route('categories.create') }}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th>Описание</th>
                  <th>Изображение</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            {{--<span>{{ $category->image ? $category->image->path : null }}</span>--}}

                            <img src="{{ asset(
                                $category->image
                                    ? $category->image->path
                                    : App\Services\ImageUploader\ImageUpload::DEFAULT_MO_IMAGE_PATH
                                    ) }}"
                                 alt="" class="img-responsive" width="150">
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="fa fa-pencil"></a>
                            {!! Form::open(['route' => ['categories.destroy', $category->id],
                                'method' => 'delete']) !!}
                            <button type="submit" class="delete-task"
                                    onclick="return confirm('Are you sure?')">
                                <a class="fa fa-remove"></a>
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection