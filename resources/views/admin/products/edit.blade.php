@extends('admin.layouts.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактировать товар</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Редактировать товар</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @METHOD('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{ $product->title }}">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="description">Описание товара</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ $product->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="brand">Бренд</label>
                                <select class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand">
                                    <option>{{ $product->brand }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="size">Размер</label>
                                <select class="form-control @error('size') is-invalid @enderror" id="brand" name="size">
                                    <option>{{ $product->size }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="color">Цвет</label>
                                <select class="form-control @error('color') is-invalid @enderror" id="brand" name="color">
                                    <option>{{ $product->color }}</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tags">Теги</label>
                                    <select name="tags[]" id="tags" class="select2" multiple="multiple" data-placeholder="Выбор тегов" style="width: 100%;">
                                        @foreach($tags as $k => $v)
                                            <option value="{{ $k }}" @if(in_array($k, $product->tags->pluck('id')->all())) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        @foreach($categories as $k => $v)
                                            <option value="{{ $k }}" @if($k == $product->category_id) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" value="{{ $product->price }}">
                                </div>

                                <div class="form-group">
                                    <div>{{ $product->thumnbail }}</div>
                                    <label for="thumbnail">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
                                            <label class="custom-file-label" for="thumbnail">Выберите файл</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                        </form>

                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->

@endsection
