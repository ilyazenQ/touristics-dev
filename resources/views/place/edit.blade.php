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
                Редактирование: {{ $place->title }}
            </h1>
            <div class="card mb-2 shadow">

                <form method="post"
                      action="{{ route('placeUpdate', $place->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h2>Шапка Отеля</h2>
                    <div class="form-group m-2">
                        <label for="title">Название отеля</label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ $place->title }}"
                               required
                        >
                    </div>

                    <div class="form-group m-2">
                        <label for="type_id">Категория объекта</label>
                        <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id" required>

                            @foreach($types as $k => $v)
                                <option value="{{ $v->id }}" @if($v->id == $place->type_id) selected @endif>
                                    {{ $v->title }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="location_id">Локация</label>
                        <select class="form-control @error('location_id') is-invalid @enderror" id="location_id" name="location_id" required>

                            @foreach($locations as $k => $v)
                                <option value="{{ $v->id }}" @if($v->id == $place->location_id) selected @endif>{{ $v->title }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="stars">Звездность (если нет, пропустите)</label>
                        <select class="form-control" id="stars" name="stars">
                            @for($i = 0; $i <= 5; $i++)
                            <option @if($i == $place->stars) selected @endif>{{$i}}</option>
                            @endfor

                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="name">Примерное расстояние до байкала (в метрах) (если нет, пропустите)</label>
                        <input type="number"
                               class="form-control"
                               id="distance_to"
                               name="distance_to"
                               value="{{ $place->distance_to }}"
                        >
                    </div>
                    <div class="form-group m-2">
                        <label for="on_map">Ссылка на карту</label>
                        <input type="text"
                               class="form-control @error('on_map') is-invalid @enderror"
                               id="on_map"
                               name="on_map"
                               value="{{ $place->on_map }}"
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
                        >{{ $place->description }}</textarea>
                    </div>

                    <div class="form-group m-2">
                        <label for="phone">Телефон для связи</label>
                        <input type="text"
                               class="form-control @error('phone') is-invalid @enderror"
                               id="phone"
                               name="phone"
                               value="{{ $place->social->phone }}"
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
                                   value="{{ $place->userFill['check-in'] }}"
                                   style="width: 100px;"
                                   required
                            >
                        </div>
                        <div class="col d-flex flex-row align-items-center">
                            <label for="check-out" class="d-block">Время выезда по </label>
                            <input type="number" class="form-control mx-2 @error('check-out') is-invalid @enderror"
                                   id="check-out"
                                   name="check-out"
                                   value="{{ $place->userFill['check-out'] }}"
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
                                   value="{{ $place->userFill->build }}"
                                   style="width: 100px;"
                            >
                        </div>
                        <div class="col d-flex flex-row align-items-center">
                            <label for="rebuild" class="d-block">Год реконструкции (если нет, пропустите) </label>
                            <input type="number" class="form-control mx-2"
                                   id="rebuild"
                                   name="rebuild"
                                   value="{{ $place->userFill->rebuild }}"
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
                        >{{ $place->userFill->documents }}</textarea>
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif
                                    > </option>
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif

                                    >{{ $v->title }}</option>
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif

                                    >{{ $v->title }}</option>
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif
                                    >{{$v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group m-2">
                        <label for="bill">Способ оплаты</label>
                        <select class="form-control" id="bill" name="about_place[]" required>

                            @foreach($about as $k => $v)
                                @if($v->about_type_id === 12)
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif

                                    >{{ $v->title }}</option>
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
                               value="{{ $place->userFill['room-fund'] }}"
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
                               value="{{ $place->userFill['conference-hall-fund'] }}"
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
                               value="{{ $place->userFill['restaurant-fund'] }}"
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif
                                    >{{ $v->title }}</option>
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif

                                    >{{ $v->title }}</option>
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif
                                    >{{ $v->title }}</option>
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
                        >{{ $place->userFill['cooking'] }}</textarea>
                    </div>

                    <div class="form-group m-2">

                        <label for="cooking-price" class="d-block">
                            Стоимость питания
                        </label>
                        <textarea
                            class="form-control mx-2"
                            id="cooking-price"
                            name="cooking-price"
                            rows="3"
                        >{{ $place->userFill['cooking-price'] }}</textarea>
                    </div>

                    <div class="form-group m-2 row">
                        <div class="col d-flex flex-row align-items-center">
                            <label for="breakfast-start" class="d-block">
                                Завтрак начинается c (если нет, пропустите)</label>
                            <input type="number"
                                   class="form-control mx-2"
                                   id="breakfast-start"
                                   name="breakfast-start"
                                   value="{{ $place->userFill['breakfast-start'] }}"
                                   style="width: 100px;"
                            >
                        </div>
                        <div class="col d-flex flex-row align-items-center">
                            <label for="breakfast-end" class="d-block">
                                Завтрак  длится до (если нет, пропустите) </label>
                            <input type="number" class="form-control mx-2"
                                   id="breakfast-end"
                                   name="breakfast-end"
                                   value="{{ $place->userFill['breakfast-end'] }}"
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif

                                    >{{ $v->title }}</option>
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif
                                    >{{ $v->title }}</option>
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif
                                    >{{ $v->title }}</option>
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
                                    <option value="{{ $v->id }}"
                                            @if(in_array($v->id, $place->abouts->pluck('id')->all())) selected @endif
                                    >{{ $v->title }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary m-2">Применить изменения</button>
                </form>


            </div>

        </div>


    </div>


@endsection

