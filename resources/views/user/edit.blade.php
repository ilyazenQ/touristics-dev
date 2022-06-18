@extends('layouts.main')
@section('content')
    <div class="app-container">
        @include('components.main.header')
        <div class="container">
            @if ($errors->all())
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
                        </div>
                    </div>
                </div>
            @endif
                @if (Session::has('success'))
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (Session::has('password-error'))
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="alert alert-warning">
                                    {{Session::get('password-error')}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            <h1>
                Редактирование профиля
            </h1>
            <div class="card mb-2 shadow">

                <form method="post" action="{{ route('userUpdate', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">

                    <div class="d-flex justify-content-left align-items-center">

                        <img class="rounded-circle" width="150px"
                             src="{{ asset("storage/{$user->image}") }}">

                        <div class="form-group d-flex flex-column">
                            <label for="exampleFormControlFile1">Выберите новое изображение профиля</label>
                            <input type="file"
                                   name="image"
                                   class="form-control-file"
                                   id="exampleFormControlFile1">
                        </div>

                    </div>

                    </div>

                    <div class="form-group m-2">
                        <label for="name">Имя</label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name"
                               name="name"
                               value="{{ $user->name }}"
                               placeholder="{{ $user->name }}">
                    </div>

                    <div class="form-group m-2">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="exampleInputEmail1"
                               name="email"
                               value="{{ $user->email  }}"

                               aria-describedby="emailHelp" placeholder="{{ $user->email }}">
                    </div>


                    <button type="submit" class="btn btn-primary m-2">Изменить</button>
                </form>


        </div>
            <div class="card shadow">
            <h2>Изменить пароль </h2>
                <form method="post" action="{{ route('userPasswordUpdate', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group m-2">
                        <label for="passwordOld">Старый пароль</label>
                        <input type="password"
                               class="form-control"
                               id="password"
                               name="passwordOld"
                               placeholder="Старый пароль">
                    </div>

                    <div class="form-group m-2">
                        <label for="passwordNew">Новый пароль</label>
                        <input type="password"
                               class="form-control"
                               id="passwordNew"
                               name="passwordNew"
                               aria-describedby="emailHelp" placeholder="Новый пароль">
                    </div>


                    <button type="submit" class="btn btn-primary m-2">Изменить</button>
                </form>


            </div>

        </div>
        </div>


    </div>


@endsection


