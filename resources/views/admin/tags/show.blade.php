@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-3  ">{{ $tag->title }} </h1>
                        <a href="{{route('admin.tags.edit',$tag->id)}}" class="text-success"> <i class="fas fa-pencil-alt"></i></a>
                        <form action="{{route('admin.tags.destroy', $tag->id)}}"
                              method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-0 bg-transparent ml-2"><i class="fas fa-trash text-danger"></i></button>
                        </form>

                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">Главная</a></li>
                            <li class="breadcrumb-item "><a href="{{route('admin.tags.index')}}">Категории</a></li>
                            <li class="breadcrumb-item active">{{ $tag->id }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-6 mt-3">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">

                                    <tbody>

                                        <tr>
                                            <td>ID</td>
                                            <td>{{ $tag->id }}</td>
                                        </tr>
                                        <tr>

                                            <td>Название</td>
                                            <td>{{ $tag->title }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
