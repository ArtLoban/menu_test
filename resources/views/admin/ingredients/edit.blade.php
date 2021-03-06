@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить ингредиент
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">

                {!! Form::open(['route' => ['ingredients.update', $ingredient->id],
                                'files' => true,
                                'method' => 'put']) !!}

                <div class="box-header with-border">
                    <h3 class="box-title">Меняем категорию</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">

                        @include('admin.errors')

                        <input type="hidden" name="updatedIngredientId" value="{{ $ingredient->id }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                   placeholder="" value="{{ $ingredient->name }}">
                        </div>
                        <div class="form-group">
                            <label>Описание категории</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Enter ..." value="">{{ $ingredient->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <img src="{{ asset(
                                $ingredient->image
                                    ? $ingredient->image->path
                                    : App\Services\ImageUploader\ImageUpload::DEFAULT_MO_IMAGE_PATH
                                    ) }}" alt="" class="img-responsive" width="150">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Загрузить изображение инргедиента</label>
                            <input type="file" name="image" id="exampleInputFile">

                            <p class="help-block">уведомление о форматах..</p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning">Изменить</button>
                    <button class="{{ route('ingredients.index')}}">Назад</button>
                </div>
                <!-- /.box-footer-->

                {!! Form::close() !!}

            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection