@extends('layouts.main')
@section('content')
    <div class="app-container">
        @include('components.main.header')

        @include('components.main.filter_params')
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

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                        Другие услуги</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" id="dropdown-tab-1" data-bs-toggle="tab" data-bs-target="#dropdown-pane-1" type="button" role="tab" aria-controls="dropdown-pane-1" aria-selected="false">
                                                Бизнес услуги</a></li>
                                        <li><a class="dropdown-item" href="#" id="dropdown-tab-2" data-bs-toggle="tab" data-bs-target="#dropdown-pane-2" type="button" role="tab" aria-controls="dropdown-pane-2" aria-selected="false">
                                                Санаторные услуги</a></li>
                                    </ul>
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
                                                        <li>{{ $v->titile }}</li>
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
                            <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">

                                <div class="modal-info-header">


                                    <div class="row container">


                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <p class="info-header-text">
                                                Номерной фонд: {{ $place->userFill['room-fund'] }} <br>
                                                @if(!is_null($place->distance_to))
                                                    Количество конференц залов: {{ $place->userFill['conference-hall-fund'] }} <br>
                                                @endif
                                                @if(!is_null($place->distance_to))
                                                    Количество ресторанов/кафе на территории: {{ $place->userFill['restaurant-fund'] }} <br>
                                                @endif

                                            </p>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <ul class="single-list">
                                                <li><h5>На территории</h5></li>
                                                @foreach($about as $k => $v)
                                                    @if($v->about_type_id === 7)
                                                        <li>{{ $v->titile }}</li>
                                                    @endif
                                                @endforeach


                                            </ul>

                                            <ul class="single-list">
                                                <li><h5>Безопасность</h5></li>
                                                @foreach($about as $k => $v)
                                                    @if($v->about_type_id === 6)
                                                        <li>{{ $v->titile }}</li>
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

                            <div class="tab-pane" id="feed" role="tabpanel" aria-labelledby="feed-tab">
                                <div class="modal-info-header">


                                    <div class="row container">


                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <h5>Title</h5>
                                            <p class="info-header-text">
                                                Необходимые документы для заезда: Для взрослых: ваучер, паспортДля детей - свидетельство о рождении (до 14 лет), паспорт (старше 14 лет), нотариальное согласие, если ребенок едет без родителя Рекомендуем и взрослым и детям брать с собой медицинский полис. - просто текст Отмена/предоплата: правила отмены бронирования и предоплаты зависят от типа выбранного варианта. В связи с коронавирусом (COVID-19) в этом объекте размещения сейчас
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <ul class="single-list">
                                                <li><h5>Title</h5></li>
                                                <li>Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor</li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                            <ul class="single-list">
                                                <li><h5>Title</h5></li>
                                                <li>Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor</li>
                                            </ul>

                                            <ul class="single-list">
                                                <li><h5>Title</h5></li>
                                                <li>Lorem ipsum dolor</li>
                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                            </ul>
                                        </div>




                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane" id="dropdown-pane-1" role="tabpanel" aria-labelledby="dropdown-tab-1">

                                <div class="modal-info-header">
                                    <h1>Бизнес</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="dropdown-pane-2" role="tabpanel" aria-labelledby="dropdown-tab-2">

                                <div class="modal-info-header">
                                    <h1>Доп.услуги</h1>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    </p>
                                </div>

                            </div>
                        </div>


                    @include('components.single.room_filter')

                        <div class="room-wrapper container">
                            <hr>
                            <div class="card mb-3" style="max-width:auto">
                                <div class="row g-0">

                                    <div class="col-md-4">
                                        <!--img src="https://picsum.photos/800/300?random=1" class="mb-3 img-fluid rounded-start" alt="..."> -->

                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="https://picsum.photos/800/300?random=4" class="d-block w-100" style="height: 250px;" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="https://picsum.photos/800/300?random=5" class="d-block w-100" style="height: 250px;" alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="https://picsum.photos/800/300?random=6" class="d-block w-100" style="height: 250px;" alt="...">
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>

                                        <div class="text-center">

                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Номер 1 </h5>

                                            <ul class="nav nav-tabs" id="Card-tabs-1" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="title-tab-1" data-bs-toggle="tab"
                                                            data-bs-target="#tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="true">Общее</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="title-tab-2" data-bs-toggle="tab"
                                                            data-bs-target="#tab-2" type="button" role="tab" aria-controls="tab-1" aria-selected="false">О номере</button>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="Card-tabs-1-content">
                                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="title-tab-1">

                                                    <ul class="single-list">
                                                        <li><h5>Title</h5></li>
                                                        <li>Lorem ipsum dolor</li>
                                                        <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                        <li>Lorem ipsum dolor</li>
                                                        <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                        <li>Lorem ipsum dolor</li>
                                                        <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                        <li>Lorem ipsum dolor</li>
                                                    </ul>

                                                </div>
                                                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="title-tab-2">
                                                    <div class="row container">


                                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                                            <h5 class="info-tab-title">Title</h5>
                                                            <p class="info-header-text">
                                                                Необходимые документы для заезда: Для взрослых: ваучер, паспортДля детей - свидетельство о рождении (до 14 лет), паспорт (старше 14 лет), нотариальное согласие, если ребенок едет без родителя Рекомендуем и взрослым и детям брать с собой медицинский полис. - просто текст Отмена/предоплата: правила отмены бронирования и предоплаты зависят от типа выбранного варианта. В связи с коронавирусом (COVID-19) в этом объекте размещения сейчас
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                                            <ul class="single-list">
                                                                <li><h5>Title</h5></li>
                                                                <li>Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor</li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                                            <ul class="single-list">
                                                                <li><h5>Title</h5></li>
                                                                <li>Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor</li>
                                                            </ul>

                                                            <ul class="single-list">
                                                                <li><h5>Title</h5></li>
                                                                <li>Lorem ipsum dolor</li>
                                                                <li>Lorem ipsum dolor Lorem ipsum dolor</li>
                                                            </ul>
                                                        </div>




                                                    </div>

                                                </div>



                                                <p class="card-text btn btn-outline-info">Цена: 2000 рублей/сутки</p>
                                                <div>
                                                    <button href="" class="btn btn-danger btn-lg">Забронировать</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <hr>



                            </div>


                            <p class="mb-0">
                                Только зарегистрированные пользователи могут оставить комментарий и оценить проживание!
                            </p>



                            <div class="container rating-form">
                                <h2 class="mb-4">Текущаяя оценка:</h2>
                                <div class="border p-3 rounded">
                                    <div class="row">
                                        <div class="col-md-3"> <label class="radio"> <input type="radio" disabled name="expDone" value="Bad Experience"> <span>Плохо</span> </label> </div>
                                        <div class="col-md-3"> <label class="radio"> <input type="radio" disabled name="expDone" value="Good Experience"> <span>Удовлетворительно</span> </label> </div>
                                        <div class="col-md-3"> <label class="radio"> <input type="radio" disabled name="expDone" value="Great Experience" checked> <span>Хорошо</span> </label> </div>
                                        <div class="col-md-3"> <label class="radio"> <input type="radio" disabled name="expDone" value="Amazing Experience"> <span>Отлично</span> </label> </div>
                                    </div>
                                </div>
                            </div>


                            <div class="container rating-form">
                                <h2 class="mb-4">Оцените проживание</h2>
                                <div class="border p-3 rounded">
                                    <div class="row">
                                        <div class="col-md-3"> <label class="radio"> <input type="radio" name="experience" value="Bad Experience"> <span>Плохо</span> </label> </div>
                                        <div class="col-md-3"> <label class="radio"> <input type="radio" name="experience" value="Good Experience"> <span>Удовлетворительно</span> </label> </div>
                                        <div class="col-md-3"> <label class="radio"> <input type="radio" name="experience" value="Great Experience" checked> <span>Хорошо</span> </label> </div>
                                        <div class="col-md-3"> <label class="radio"> <input type="radio" name="experience" value="Amazing Experience"> <span>Отлично</span> </label> </div>
                                    </div>

                                    <div class="button mt-4 text-right"> <button class="btn btn-success submit-button">Оценить</button> </div>
                                </div>
                            </div>
                            <hr>


                            @include('components.single.comments')




                        </div>

                        </div>





                </div>

            </div>
        </div>

    </div>


@endsection
