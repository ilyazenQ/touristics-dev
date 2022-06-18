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

            <h1>
                Редактирование размещения: {{ $room->title }}
            </h1>
            <div class="card mb-2 shadow">

                <form method="post" action="{{ route('roomUpdate',$room->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h2>Шапка размещения</h2>
                    <div class="form-group m-2">
                        <label for="title">Название размещения</label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ $room->title }}"
                               required
                        >
                    </div>

                    <div class="form-group m-2">
                        <label for="type_id">Тип размещения</label>
                        <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id" required>

                            @foreach($types as $k => $v)
                                <option value="{{ $v->id }}"
                                        @if($v->id == $room->type_id) selected @endif
                                >{{ $v->title }}</option>
                            @endforeach

                        </select>
                    </div>


                    <div class="form-group m-2">
                        <label for="name">Количество кроватей</label>
                        <input type="text"
                               class="form-control"
                               id="beds"
                               name="beds"
                               value="{{ $room->userFill->beds }}"
                               required
                        >
                    </div>
                    <div class="form-group m-2">
                        <label for="area">Площадь номера</label>
                        <input type="text"
                               class="form-control @error('area') is-invalid @enderror"
                               id="area"
                               name="area"
                               value="{{$room->userFill->area}}"
                               required
                        >
                    </div>

                    <hr>
                    <h2> Вкладка общее </h2>

                    <div class="form-group m-2">
                        <label for="about_place"> Общее о размещении </label>
                        <select id="about_place"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 1)
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $room->abouts->pluck('id')->all())) selected @endif>
                                        {{ $v->title }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="bill">Вместимость номера</label>
                        <select class="form-control" id="bill" name="about_place[]">

                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 2)
                                    <option value="{{ $v->id }}" @if(in_array($v->id, $room->abouts->pluck('id')->all())) selected @endif>{{ $v->title }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group m-2">


                        <label for="view_on"> Вид на </label>
                        <select id="view_on"
                                class="form-control"
                                name="about_place[]"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 3)
                                    <option value="{{ $v->id }}" @if(in_array($v->id, $room->abouts->pluck('id')->all())) selected @endif>{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="bath_loc"> Расположение ванной </label>
                        <select id="bath_loc"
                                class="form-control"
                                name="about_place[]"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 4)
                                    <option value="{{ $v->id }}" @if(in_array($v->id, $room->abouts->pluck('id')->all())) selected @endif>{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="toilet_loc"> Расположение туалета </label>
                        <select id="toilet_loc"
                                class="form-control"
                                name="about_place[]"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 5)
                                    <option value="{{ $v->id }}" @if(in_array($v->id, $room->abouts->pluck('id')->all())) selected @endif>{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>



                    <hr>
                    <h2>Удобства в номере</h2>

                    <div class="form-group m-2">
                        <label for="for_child"> Инфраструктура на территории: </label>
                        <select id="for_child"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 6)
                                    <option value="{{ $v->id }}" @if(in_array($v->id, $room->abouts->pluck('id')->all())) selected @endif>{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="for_special"> Мебель </label>
                        <select id="for_special"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 7)
                                    <option value="{{ $v->id }}" @if(in_array($v->id, $room->abouts->pluck('id')->all())) selected @endif>{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="season"> Кухня </label>
                        <select id="season"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 8)
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $room->abouts->pluck('id')->all())) selected @endif>{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="services"> Ванная комната </label>
                        <select id="services"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 9)
                                    <option value="{{ $v->id }}" @if(in_array($v->id, $room->abouts->pluck('id')->all())) selected @endif>{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="smoking"> Курение </label>
                        <select id="smoking"
                                class="form-control"
                                name="about_place[]"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 10)
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $room->abouts->pluck('id')->all())) selected @endif>{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <hr>
                    <h2> Доступные месяцы и цена </h2>

                    @foreach($months as $month)
                        <div class="form-check m-2 d-flex flex-row align-items-center justify-content-around">
                            <div class="d-flex flex-row align-items-center">

                                <input class="form-check-input m-1" type="checkbox" value="{{ $month->id }}"
                                       name='months[{{$month->title}}][id]' id="{{ $month->title }}"
                                       @if(in_array($month->id, $room->months->pluck('month_id')->all())) checked @endif
                                >
                                <label class="form-check-label m-1" for="{{ $month->title }}">
                                    {{ $month->title }}
                                </label>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <label class="form-check-label" for="{{ $month->title }}-price">
                                    Цена
                                </label>
                                <input class="form-control w-50" type="number"

                                       @if(in_array($month->id, $room->months->pluck('month_id')->all()))
                                           value="{{ $room->months->where('month_id', $month->id)->pluck('price')[0] }}"
                                       @else
                                           value=""
                                       @endif
                                       name='months[{{$month->title }}][price]'
                                       id="{{ $month->title }}-price">
                            </div>
                        </div>
                    @endforeach


                    <button type="submit" class="btn btn-primary m-2">Сохранить изменения</button>
                </form>


            </div>

        </div>


    </div>


@endsection

