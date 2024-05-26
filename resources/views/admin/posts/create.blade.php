@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление постов</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Посты</a></li>
                            <li class="breadcrumb-item active">Добавить</li>
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

                    <div class="col-12 mt-3">

                        <form action="{{route('admin.posts.store')}}" method="post" class="mt-3"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <input type="text" class="form-control w-50" name="title" placeholder="Заголовок поста"
                                       value="{{ old('title') }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <textarea id="summernote" name="content"> {{ old('content') }}</textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label for=main_image>Добавить превью изображения</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите
                                            изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group w-50">
                                <label for=main_image>Добавить главное изображение</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label" for=main_image>Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label>Выберите категорию</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id') ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group w-50">
                                <label>Теги</label>
                                <select class="select2 select2-hidden-accessible" name="tag_ids[]" multiple="multiple"
                                        data-placeholder="Выберите тег" style="width: 100%;" data-select2-id="7"
                                        tabindex="-1"
                                        aria-hidden="true">
                                    @foreach($tags as $tag)
                                        <option
                                            {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected="selected"' : '' }}
                                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>


                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                    </div>


                </div>
            </div>

            <!-- /.row -->

            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
