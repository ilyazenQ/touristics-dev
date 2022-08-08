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
                Создание базы отдыха
            </h1>
            <div class="card mb-2 shadow">

                <form method="post" action="{{ route('placeStore') }}" enctype="multipart/form-data">
                    @csrf
                    <h2>Шапка Отеля</h2>
                    <div class="form-group m-2">
                        <label for="title">Название отеля</label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value=""
                               required
                              >
                    </div>

                    <div class="form-group m-2">
                        <label for="type_id">Категория объекта</label>
                        <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id" required>

                            @foreach($types as $k => $v)
                                <option value="{{ $v->id }}">{{ $v->title }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="location_id">Локация</label>
                        <select class="form-control @error('location_id') is-invalid @enderror" id="location_id" name="location_id" required>

                            @foreach($locations as $k => $v)
                                <option value="{{ $v->id }}">{{ $v->title }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="stars">Звездность (если нет, пропустите)</label>
                        <select class="form-control" id="stars" name="stars">

                            <option>0</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>

                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="name">Примерное расстояние до байкала (в метрах) (если нет, пропустите)</label>
                        <input type="number"
                               class="form-control"
                               id="distance_to"
                               name="distance_to"
                               value=""
                               >
                    </div>
                    <div class="form-group m-2">
                        <label for="on_map">Ссылка на карту</label>
                        <input type="text"
                               class="form-control @error('on_map') is-invalid @enderror"
                               id="on_map"
                               name="on_map"
                               value=""
                               required
                        >
                    </div>

                    <div class="form-group m-2">
                        <label for="description"> Описание отеля </label>
                        <textarea class="form-control"
                                  name="description"
                                  id="description"
                                  rows="3"
                                  required
                        ></textarea>
                    </div>

                    <div class="form-group m-2">
                        <label for="phone">Телефон для связи</label>
                        <input type="text"
                               class="form-control @error('phone') is-invalid @enderror"
                               id="phone"
                               name="phone"
                               value=""
                               required
                        >
                    </div>
                <hr>
                    <h2>Вкладка об Отеле</h2>

                    <div class="form-group m-2 row">
                        <div class="col d-flex flex-row align-items-center">
                            <label for="check-in" class="d-block">Время заезда c</label>
                            <input type="number"
                                   class="form-control mx-2 @error('check-in') is-invalid @enderror"
                                   id="check-in"
                                   name="check-in"
                                   value="0"
                                   style="width: 100px;"
                                   required
                                   >
                        </div>
                        <div class="col d-flex flex-row align-items-center">
                            <label for="check-out" class="d-block">Время выезда по </label>
                            <input type="number" class="form-control mx-2 @error('check-out') is-invalid @enderror"
                                   id="check-out"
                                   name="check-out"
                                   value="24"
                                   style="width: 100px;"
                                   required
                            >
                        </div>
                    </div>

                    <div class="form-group m-2 row">
                        <div class="col d-flex flex-row align-items-center">
                            <label for="build" class="d-block"> Год постройки </label>
                            <input type="number"
                                   class="form-control mx-2"
                                   id="build"
                                   name="build"
                                   style="width: 100px;"
                            >
                        </div>
                        <div class="col d-flex flex-row align-items-center">
                            <label for="rebuild" class="d-block">Год реконструкции (если нет, пропустите) </label>
                            <input type="number" class="form-control mx-2"
                                   id="rebuild"
                                   name="rebuild"
                                   style="width: 100px;"
                            >
                        </div>
                    </div>

                    <div class="form-group m-2">
                        <label for="documents"> Список документов необходимых для заезда </label>
                        <textarea
                            class="form-control @error('check-out') is-invalid @enderror"
                            id="documents"
                            name="documents"
                            rows="3"
                            required
                        ></textarea>
                    </div>



                    <div class="form-group m-2">
                        <label for="about_place"> Описание отеля: </label>
                        <select id="about_place"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 1)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="for_child"> Для детей: </label>
                        <select id="for_child"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"

                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 2)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="for_special"> Особые категории: </label>
                        <select id="for_special"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"

                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 3)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="season"> Сезон работы: </label>
                        <select id="season"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"

                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 4)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="bill">Способ оплаты</label>
                        <select class="form-control" id="bill" name="about_place[]" required>

                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 12)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>


                    <hr>
                    <h2>Вкладка Инфрастуктура</h2>

                    <div class="form-group m-2">

                            <label for="room-fund" class="d-block">Номерной фонд</label>
                            <input type="text"
                                   class="form-control mx-2 @error('room-fund') is-invalid @enderror"
                                   id="room-fund"
                                   name="room-fund"
                                   required
                            >
                        </div>

                    <div class="form-group m-2">

                        <label for="conference-hall-fund" class="d-block">
                            Количество конференц залов(если нет, пропустите)
                        </label>
                        <input type="text"
                               class="form-control mx-2"
                               id="conference-hall-fund"
                               name="conference-hall-fund"
                        >
                    </div>

                    <div class="form-group m-2">

                        <label for="restaurant-fund" class="d-block">
                            Количество ресторанов/кафе на территории (если нет, пропустите)
                        </label>
                        <input type="text"
                               class="form-control mx-2"
                               id="restaurant-fund"
                               name="restaurant-fund"
                        >
                    </div>


                    <div class="form-group m-2">
                        <label for="on_area"> Инфраструктура на территории: </label>
                        <select id="on_area"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 7)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="security"> Безопасность </label>
                        <select id="security"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 6)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="services"> Услуги и удобства </label>
                        <select id="services"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 5)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>


                    <hr>
                    <h2>Вкладка Питание</h2>

                    <div class="form-group m-2">

                        <label for="cooking" class="d-block">
                            Места для приготовления и приема пищи
                        </label>
                        <textarea
                               class="form-control mx-2 @error('cooking') is-invalid @enderror"
                               id="cooking"
                               name="cooking"
                               rows="3"
                               required
                        ></textarea>
                    </div>

                    <div class="form-group m-2">

                        <label for="cooking-price" class="d-block">
                            Стоимость питания
                        </label>
                        <textarea
                            class="form-control mx-2"
                            id="cooking-price"
                            name="cooking-price"
                            value=""
                            rows="3"
                        ></textarea>
                    </div>

                    <div class="form-group m-2 row">
                        <div class="col d-flex flex-row align-items-center">
                            <label for="breakfast-start" class="d-block">
                                Завтрак начинается c (если нет, пропустите)</label>
                            <input type="number"
                                   class="form-control mx-2"
                                   id="breakfast-start"
                                   name="breakfast-start"
                                   style="width: 100px;"
                            >
                        </div>
                        <div class="col d-flex flex-row align-items-center">
                            <label for="breakfast-end" class="d-block">
                                Завтрак  длится до (если нет, пропустите) </label>
                            <input type="number" class="form-control mx-2"
                                   id="breakfast-end"
                                   name="breakfast-end"
                                   style="width: 100px;"
                            >
                        </div>
                    </div>



                    <div class="form-group m-2">
                        <label for="eat-add"> Дополнительные услуги </label>
                        <select id="eat-add"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 11)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="rest-kitchen">
                            Кухня ресторанов  (если нет, пропустите)</label>
                        <select id="rest-kitchen"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 10)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="breakfast-conp"> Концепция завтрака (если нет, пропустите)</label>
                        <select id="breakfast-conp"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 9)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="cooking-self">
                            Возможности для самостоятельного приготовления</label>
                        <select id="cooking-self"
                                class="form-control"
                                name="about_place[]"
                                multiple="multiple"
                        >
                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 8)
                                    <option value="{{ $v->id }}">{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <hr>
                    <h2>Месяцы и цена</h2>
                    <div class="form-group m-2">
                        <label for="cooking-self">
                            Выберите месяцы работы</label>
                        <select id="mounth"
                                class="form-control"
                                name="months[]"
                                multiple="multiple"
                        >
                            @foreach($months as $month)

                                    <option value="{{ $month->id }}">{{ $month->title }}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">

                        <label for="restaurant-fund" class="d-block">
                            Цена от
                        </label>
                        <input type="text"
                               class="form-control mx-2"
                               id="price"
                               name="price"
                        >
                    </div>

                    <button type="submit" class="btn btn-primary m-2">Создать</button>
                </form>


            </div>

    </div>


    </div>


@endsection
