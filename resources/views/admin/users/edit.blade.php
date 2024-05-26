@extends('admin.layouts.main')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin')}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Пользователи</a></li>
                            <li class="breadcrumb-item active">Редактировать</li>
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
                        <form action="{{route('admin.users.update', $user->id)}}" method="post" class="mt-3">
                            @method('patch')
                            @csrf

                            <div class="form-group">
                                <label for="email">Имя пользователя</label>
                                <input type="text" class="form-control col-4" name="name" id="name"
                                       placeholder="Имя пользователя" value="{{ $user->name }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control col-4" id="email" name="email"
                                       value="{{ $user->email }}"
                                       placeholder="Имя пользователя">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group w-50">
                                <label>Выберите роль</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $id =>$role)
                                        <option value="{{ $id }}"
                                            {{ $id == $user->role ? 'selected' : '' }}
                                        >{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('role')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{ $user->id }}" >
                            </div>

                            <input type="submit" class="btn btn-primary" value="Обновить">

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
