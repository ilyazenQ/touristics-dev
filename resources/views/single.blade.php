@extends('layouts.main')
@section('content')
    <div class="app-container">
        @include('components.main.header')

        @include('components.main.filter_params')
        @include('components.error_and_success')
        <div id="modal-window" class="shadow container">

            <div class="main-modal">
                <div class="modal-left">

                    @include('components.single.place_header')



                    <div class="info-bar">
                        <div class="container">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active"
                                            id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button"
                                            role="tab" aria-controls="home" aria-selected="true">
                                        Описание</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                        Об отеле
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="messages-tab"
                                            data-bs-toggle="tab" data-bs-target="#messages"
                                            type="button" role="tab" aria-controls="messages" aria-selected="false">
                                        Инфраструктура
                                    </button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="feed-tab"
                                            data-bs-toggle="tab" data-bs-target="#feed"
                                            type="button" role="tab" aria-controls="feed" aria-selected="false">
                                        Питание
                                    </button>
                                </li>


                            </ul>


                        </div>

                    </div>

                    <div class="desc-wrapper">

                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">


                                <div class="modal-info-header">
                                    <p class="info-header-text">
                                        {{ $place->description }}
                                    </p>
                                </div>


                            </div>
                            <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="modal-info-header">


                                    <div class="row container">


                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <p class="info-header-text">
                                                Категория: {{ $place->type->title }} <br>
                                                @if(!is_null($place->distance_to))
                                                 Расположение: {{ $place->distance_to }} <br>
                                                @endif
                                                Сезон работы:
                                                @if(count($about->where('about_type_id','=', 4)->all()) == 12)
                                                    Круглогодично <br>
                                                @else
                                                    @foreach($about->where('about_type_id','=', 4)->all() as $k => $v)
                                                                {{$v->title}}
                                                    @endforeach <br>
                                                @endif
                                                Заезд с: {{ $place->userFill['check-in'] }} ч выезд до: {{ $place->userFill['check-out'] }} ч<br>
                                                @if(!is_null($place->userFill['build'] ))
                                                Год постройки: {{ $place->userFill['build']}}
                                                @endif
                                                @if(!is_null($place->userFill['rebuild']))
                                                 Год реконструкции: {{ $place->userFill['rebuild'] }}
                                                @endif
                                                <br>
                                                Способы оплаты:
                                                    @foreach($about as $k => $v)
                                                        @if($v->about_type_id === 12)
                                                            {{ $v->title }}
                                                        @endif
                                                    @endforeach
                                                <br>
                                            </p>

                                            <h5>Документы для заселения</h5>
                                            <p class="info-header-text">
                                                {{ $place->userFill['documents'] }}
                                            </p>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <ul class="single-list">
                                                <li><h5>Общая информация</h5></li>
                                                @foreach($about as $k => $v)
                                                    @if($v->about_type_id === 1)
                                                        <li>{{ $v->title }}</li>
                                                    @endif
                                                @endforeach


                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                           @if (count($about->where('about_type_id','=', 2)->all()) > 0)
                                            <ul class="single-list">
                                                <li><h5>Для детей</h5></li>
                                                @foreach($about as $k => $v)
                                                    @if($v->about_type_id === 2)
                                                        <li>{{ $v->title }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            @endif

                                            <ul class="single-list">
                                                @if (count($about->where('about_type_id','=', 3)->all()) > 0)
                                                <li><h5>Особые категории</h5></li>
                                                @foreach($about as $k => $v)
                                                    @if($v->about_type_id === 3)
                                                        <li>{{ $v->title }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                               @endif
                                        </div>




                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane" id="feed" role="tabpanel" aria-labelledby="messages-tab">

                                <div class="modal-info-header">


                                    <div class="row container">


                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <p class="info-header-text">
                                                Места для приготовления и приема пищи:
                                                {{ $place->userFill['cooking'] }} <br>

                                                Стоимость питания:
                                                {{ $place->userFill['cooking-price'] }} <br>
                                                <br>

                                                @if($place->userFill['breakfast-start'])
                                                    Завтрак начинается c: {{ $place->userFill['breakfast-start'] }} ч;
                                                    Длится до: {{ $place->userFill['breakfast-end'] }} <br>

                                                    Концепция завтрака:
                                                      @foreach($about as $k => $v)
                                                         @if($v->about_type_id === 9)
                                                        <li>{{ $v->title }}</li>
                                                         @endif
                                                    @endforeach

                                                @endif



                                            </p>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <ul class="single-list">
                                                <li><h5> Возможности для приготовления</h5></li>
                                                @foreach($about as $k => $v)
                                                    @if($v->about_type_id === 8)
                                                        <li>{{ $v->title }}</li>
                                                    @endif
                                                @endforeach


                                            </ul>

                                            <ul class="single-list">
                                                <li><h5>Кухня ресторанов</h5></li>
                                                @foreach($about as $k => $v)
                                                    @if($v->about_type_id === 10)
                                                        <li>{{ $v->title }}</li>
                                                    @endif
                                                @endforeach


                                            </ul>


                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">

                                                <ul class="single-list">
                                                    <li><h5>Дополнительные услуги</h5></li>
                                                    @foreach($about as $k => $v)
                                                        @if($v->about_type_id === 11)
                                                            <li>{{ $v->title }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>


                                        </div>




                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="feed-tab">
                                <div class="modal-info-header">


                                    <div class="row container">


                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <p class="info-header-text">
                                                Номерной фонд: {{ $place->userFill['room-fund'] }} <br>
                                                @if(!is_null($place->userFill['conference-hall-fund']))
                                                    Количество конференц залов: {{ $place->userFill['conference-hall-fund'] }} <br>
                                                @endif
                                                @if(!is_null( $place->userFill['restaurant-fund']))
                                                    Количество ресторанов/кафе на территории: {{ $place->userFill['restaurant-fund'] }} <br>
                                                @endif

                                            </p>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <ul class="single-list">
                                                <li><h5>На территории</h5></li>
                                                @foreach($about as $k => $v)
                                                    @if($v->about_type_id === 7)
                                                        <li>{{ $v->title }}</li>
                                                    @endif
                                                @endforeach


                                            </ul>

                                            <ul class="single-list">
                                                <li><h5>Безопасность</h5></li>
                                                @foreach($about as $k => $v)
                                                    @if($v->about_type_id === 6)
                                                        <li>{{ $v->title }}</li>
                                                    @endif
                                                @endforeach


                                            </ul>


                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">

                                            <ul class="single-list">
                                                <li><h5>Услуги и удобства</h5></li>
                                                @foreach($about as $k => $v)
                                                    @if($v->about_type_id === 5)
                                                        <li>{{ $v->title }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>


                                        </div>




                                    </div>

                                </div>

                            </div>


                        </div>
                        <hr>

                        @if(count($rooms))
                    @include('components.single.room_filter')
                        @endif

                        <div class="room-wrapper container">
                            @if(!count($rooms))

                                <h2 class="m-1">Пока нет активных размещений</h2>
                                <hr>
                            @else



                                @foreach($rooms as $room)
                                    <hr>
                                    <div class="card mb-3" style="max-width:auto;">
                                        <div class="row g-0">

                                            <div class="col-md-4">
                                                <!--img src="https://picsum.photos/800/300?random=1" class="mb-3 img-fluid rounded-start" alt="..."> -->



                                                <div id="carouselExampleIndicators{{$room->id}}" class="carousel slide" data-bs-ride="carousel">

                                                    <div class="carousel-indicators">
                                                        @for($i = 0; $i<count($room->images);$i++)

                                                            <button type="button" data-bs-target="#carouselExampleIndicators{{$room->id}}"
                                                                    data-bs-slide-to="{{$i}}"
                                                                    class="{{$i== 0 ? 'active' : '' }}"
                                                                    aria-current="true"
                                                                    aria-label="Slide {{$i}}">

                                                            </button>

                                                        @endfor
                                                    </div>
                                                    <div class="carousel-inner">
                                                        @foreach($room->images as $key => $image)

                                                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                                <img src="{{ asset("storage/{$image->link}") }}" class="d-block w-100" style="height: 250px;" alt="...">
                                                            </div>

                                                        @endforeach
                                                    </div>

                                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{$room->id}}" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{$room->id}}" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>




                                                <div class="text-center">
                                                    <div class="m-1">
                                                        <button href="" class="btn btn-danger btn-lg">Забронировать</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"> {{ $room->title }} </h5>

                                                    <ul class="nav nav-tabs" id="Card-tabs-{{$room->id}}" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link active" id="title-tab-{{$room->id}}" data-bs-toggle="tab"
                                                                    data-bs-target="#tab-{{$room->id}}" type="button" role="tab" aria-controls="tab-{{$room->id}}" aria-selected="true">Общее</button>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <button class="nav-link" id="title-tab-{{$room->id}}-2" data-bs-toggle="tab"
                                                                    data-bs-target="#tab-{{$room->id}}-2" type="button" role="tab" aria-controls="tab-{{$room->id}}-2" aria-selected="false">О номере</button>
                                                        </li>

                                                    </ul>
                                                    <div class="tab-content" id="Card-tabs-{{$room->id}}-content">
                                                        <div class="tab-pane fade show active" id="tab-{{$room->id}}" role="tabpanel" aria-labelledby="title-tab-{{$room->id}}">
                                                            <div class="row container">
                                                                <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                                                    <p class="info-header-text">
                                                                        Вместимость номера:
                                                                        @foreach($about as $k => $v)
                                                                            @if($v->about_type_id === 2)
                                                                                {{ $v->title }}
                                                                                @break
                                                                            @endif
                                                                        @endforeach
                                                                        <br>
                                                                        Площадь номера:
                                                                        {{$room->userFill->area}}
                                                                        <br>
                                                                        Количество кроватей:
                                                                        {{$room->userFill->beds}}
                                                                        <br>
                                                                        Вид на:
                                                                        @foreach($about as $k => $v)
                                                                            @if($v->about_type_id === 3)
                                                                                {{ $v->title }}
                                                                                @break
                                                                            @endif
                                                                        @endforeach
                                                                        <br>
                                                                        Расположение ванной:
                                                                        @foreach($about as $k => $v)
                                                                            @if($v->about_type_id === 4)
                                                                                {{ $v->title }}
                                                                                @break
                                                                            @endif
                                                                        @endforeach
                                                                        <br>
                                                                        Расположение с/у:
                                                                        @foreach($about as $k => $v)
                                                                            @if($v->about_type_id === 5)
                                                                                {{ $v->title }}
                                                                                @break
                                                                            @endif
                                                                        @endforeach
                                                                        <br>
                                                                    </p>
                                                                </div>

                                                                <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                                                    <ul class="single-list">
                                                                        <li><h5> Общее о размещении</h5></li>
                                                                        @foreach($about as $k => $v)
                                                                            @if($v->about_type_id === 1)
                                                                                <li>{{ $v->title }}</li>
                                                                            @endif
                                                                        @endforeach


                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="tab-{{$room->id}}-2" role="tabpanel" aria-labelledby="title-tab-{{$room->id}}-2">

                                                            <div class="row container">
                                                                <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                                                    <ul class="single-list">
                                                                        <li><h5> Удобства в номере </h5></li>
                                                                        @foreach($about as $k => $v)
                                                                            @if($v->about_type_id === 6)
                                                                                <li>{{ $v->title }}</li>
                                                                            @endif
                                                                        @endforeach


                                                                    </ul>
                                                                </div>

                                                                <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                                                    <ul class="single-list">
                                                                        <li><h5> Мебель </h5></li>
                                                                        @foreach($about as $k => $v)
                                                                            @if($v->about_type_id === 7)
                                                                                <li>{{ $v->title }}</li>
                                                                            @endif
                                                                        @endforeach


                                                                    </ul>
                                                                    <ul class="single-list">
                                                                        <li><h5> Кухня </h5></li>
                                                                        @foreach($about as $k => $v)
                                                                            @if($v->about_type_id === 8)
                                                                                <li>{{ $v->title }}</li>
                                                                            @endif
                                                                        @endforeach


                                                                    </ul>

                                                                </div>

                                                                <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                                                    <ul class="single-list">
                                                                        <li><h5> Ванная комната </h5></li>
                                                                        @foreach($about as $k => $v)
                                                                            @if($v->about_type_id === 9)
                                                                                <li>{{ $v->title }}</li>
                                                                            @endif
                                                                        @endforeach

                                                                        <br>
                                                                        <li> Курение:
                                                                            @foreach($about as $k => $v)
                                                                                @if($v->about_type_id === 10)
                                                                                    {{ $v->title }}
                                                                                    @break
                                                                                @endif
                                                                            @endforeach
                                                                        </li>
                                                                    </ul>
                                                                    <br>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>



                                                    <p class="card-text btn btn-outline-info">Цена: 2000 рублей/сутки</p>
                                                    @if(false)
{{--                                                    <div>--}}
{{--                                                        <a href="{{ route('roomEdit', $room->id) }}" class="btn btn-primary btn-lg">--}}
{{--                                                            Редактировать текст--}}
{{--                                                        </a>--}}
{{--                                                        <a href="{{ route('roomImagesEdit',$room->id) }}"--}}
{{--                                                           class="btn btn-primary btn-lg">--}}
{{--                                                            Редактировать изображения--}}
{{--                                                        </a>--}}
{{--                                                        <button href="" class="btn btn-info btn-lg">Скрыть</button>--}}
{{--                                                        <button href="" class="btn btn-danger btn-lg">Удалить</button>--}}
{{--                                                    </div>--}}
                                                        @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                @endforeach
                            @endif

                            @guest
                            <p class="mb-0">
                                Только зарегистрированные пользователи могут оставить комментарий и оценить проживание!

                            </p>
                                    <hr>

                                @endguest



                            <div class="container rating-form">
                                <h2 class="mb-4">Текущаяя оценка:</h2>
                                <div class="border p-3 rounded">
                                    <div class="row">
                                        @for($i=1; $i<=4; $i++)
                                            <div class="col-md-3"> <label class="radio"> <input type="radio" disabled name="expDone" value="{{ $i }}" @if($i == $place->rating) checked @endif> <span>{{ $place->getReadableRating($i) }}</span> </label> </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                                @auth
                                    @if(Auth::user()->hasUserVote(Auth::user()->id, $place->id))
                                    <form method="post" action="{{ route("ratingStore", ['userId' => Auth::user()->id,'placeId' => $place->id ]) }}" class="container rating-form">
                                        @csrf
                                        @method("POST")
                                        <h2 class="mb-4">Оцените проживание</h2>
                                        <div class="border p-3 rounded">
                                            <div class="row">
                                                @for($i=1; $i<=4; $i++)
                                                <div class="col-md-3"> <label class="radio"> <input type="radio" name="experience" value="{{ $i }}"> <span>{{ $place->getReadableRating($i) }}</span> </label> </div>
                                                @endfor
                                            </div>


                                            <div class="button mt-4 text-right"> <button type="submit" class="btn btn-success submit-button">Оценить</button> </div>
                                        </div>
                                    </form>
                                        @endif
                                @endauth

                            <hr>


                            @include('components.single.comments')




                        </div>

                        </div>





                </div>

            </div>
        </div>

    </div>


@endsection
