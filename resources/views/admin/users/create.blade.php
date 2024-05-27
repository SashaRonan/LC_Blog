@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.categories.index')}}">Пользователи</a>
                            </li>
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
                        <form action="{{ route('admin.users.store') }}" method="post" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label for="name">Ваше имя</label>
                                <input type="text" class="form-control col-4" id="name" name="name"
                                       placeholder="Имя пользователя">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control col-4" id="email" name="email"
                                       placeholder="Ваша почта">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="password">Пароль</label>--}}
{{--                                <input type="password" class="form-control col-4" id="password" name="password"--}}
{{--                                       placeholder="Имя пользователя">--}}
{{--                                @error('password')--}}
{{--                                <div class="text-danger">{{ $message }}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label>Выберите роль</label>
                                <select name="role" class="form-control col-4">
                                    @foreach($roles as $id =>$role)
                                        <option value="{{ $id }}"
                                            {{ $id == old('role_id') ? 'selected' : '' }}
                                        >{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <input type="submit" class="btn btn-primary" value="Добавить">

                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
