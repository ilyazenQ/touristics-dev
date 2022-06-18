@extends('layouts.main')
@section('content')
    <div class="app-container">
        @include('components.main.header')
        <div class="container rounded bg-white">
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
            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="card shadow">
                        <div class="card-body">

                            <div class="d-flex justify-content-center">
                                <img class="rounded-circle mt-5" width="150px" height="150px"
                                     src="{{ asset("storage/{$user->image}") }}">

                            </div>
                            <div class="text-center my-6">
                                <!-- Title -->
                                <a class="d-block h5 mb-0">{{ $user->name }}</a> <!-- Subtitle -->
                                <span class="d-block text-sm text-muted">{{ $user->email }}</span> </div> <!-- Stats -->

                            <div class="text-center mt-2">

                                <a href="{{ route('userEdit', $user->id) }}" class="btn btn-primary profile-button" type="button">Редактировать профиль</a>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-7 border-right">
                    <div class="card shadow">
                        <div class="card-body">

                            @if(is_null($place))
                                <div class="d-flex justify-content-center">
                                    <img class="rounded-circle mt-5" width="150px" height="150px"
                                         src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                                    >
                                </div>

                                <div class="text-center mt-2">
                                    <a href="{{ route('placeCreate') }}" class="btn btn-info profile-button">Создать базу отдыха</a>


                                </div>

                                @else

                                @if(isset($place->images[0]))
                                <div class="d-flex justify-content-center">
                                    <img class="rounded-circle mt-5"  width="150px" height="150px"
                                         src="{{ asset("storage/{$place->images[0]->link}") }}"
                                    >
                                </div>
                                @else
                                    <div class="d-flex justify-content-center">
                                        <img class="rounded-circle mt-5" width="150px"
                                             src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
                                        >
                                    </div>
                                    @endif

                                <div class="text-center my-6">
                                <!-- Title --> <a href="#" class="d-block h5 mb-0">
                                        {{ $place->title }}
                                </a> <!-- Subtitle -->
                                <span class="d-block text-sm text-muted">
                                    {{ $place->location->title }}

                                </span> </div> <!-- Stats -->
                            <div class="d-flex">
                                <div class="col-4 text-center">
                                    <a href="#" class="h4 font-bolder mb-0">
                                        {{ $place->state->views }}
                                    </a> <span class="d-block text-sm">Просмотров</span> </div>
                                <div class="col-4 text-center">
                                    <a href="#" class="h4 font-bolder mb-0">{{ count($place->comments) }}
                                    </a> <span class="d-block text-sm">Комментариев</span> </div>
                                <div class="col-4 text-center">
                                    <a href="#" class="h4 font-bolder mb-0">{{ $place->rating }}</a> <span class="d-block text-sm">Оценка</span> </div>
                            </div>

                            <div class="text-center mt-2">
                                <a href="{{ route("placeEdit", $place->id) }}" class="btn btn-outline-primary profile-button">Редактировать текст</a>
                                <a href="{{ route("placeImagesEdit", $place->id) }}" class="btn btn-outline-primary profile-button">Редактировать фотографии</a>
                                <a href="{{ route("placeSingle", $place->id) }}" class="btn btn-info profile-button"> Просмотреть </a>

                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>



            @if(is_null($place))
                <h2>Что бы добавить размещение, необходимо <a href="{{ route('placeCreate') }}" style="color:blue">создать базу отдыха!</a></h2>
            @else

            <div class="container  bg-white">

                <div class="mb-3">

                    <h2>Добавить новое размещение:</h2>

                    <a href="{{ route('roomCreate') }}" class="btn btn-success btn-lg" type="button">Добавить</a>

                </div>

                <div>

                    @if(!count($rooms))

                    <h2>Пока нет активных размещений</h2>
                    @else

                    <h2>Активные размещения:</h2>

                    @foreach($rooms as $room)

                    <div class="room-wrapper container">
                        <hr>
                        <div class="card mb-3" style="max-width:auto;">
                            <div class="row g-0">

                                <div class="col-md-4">
                                    <!--img src="https://picsum.photos/800/300?random=1" class="mb-3 img-fluid rounded-start" alt="..."> -->



                                    <div id="carouselExampleIndicators{{$room->title}}" class="carousel slide" data-bs-ride="carousel">

                                        <div class="carousel-indicators">
                                            @for($i = 0; $i<count($room->images);$i++)

                                                <button type="button" data-bs-target="#carouselExampleIndicators{{$room->title}}"
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

                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{$room->title}}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{$room->title}}" data-bs-slide="next">
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
                                                        data-bs-target="#tab-1" type="button" role="tab" aria-controls="tab-1" aria-selected="true">Вкладка 1</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="title-tab-2" data-bs-toggle="tab"
                                                        data-bs-target="#tab-2" type="button" role="tab" aria-controls="tab-1" aria-selected="false">Вкладка 2</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="title-tab-3" data-bs-toggle="tab"
                                                        data-bs-target="#tab-3" type="button" role="tab" aria-controls="tab-1" aria-selected="false">Вкладка 3</button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="Card-tabs-1-content">
                                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="title-tab-1">

                                                <p class="card-text">
                                                    This is a wider card with supporting text below as a natural lead-in to additional content.
                                                    This is a wider card with supporting text below as a natural lead-in to additional content.
                                                    This is a wider card with supporting text below as a natural lead-in to additional content.
                                                    This is a wider card with supporting text below as a natural lead-in to additional content.

                                                    This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                                </p>

                                            </div>
                                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="title-tab-2">This is a wider card with supporting text below as a natural lead-in to additional content.
                                                This is a wider card with supporting text below as a natural lead-in to additional content.
                                                This is a wider card with supporting text below as a natural lead-in to additional content.
                                                This is a wider card with supporting text below as a natural lead-in to additional content. </div>
                                            <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="title-tab-3">This is a wider card with supporting text below as a natural lead-in to additional content.
                                            </div>
                                        </div>



                                        <p class="card-text btn btn-outline-info">Цена: 2000 рублей/сутки</p>
                                        <div>
                                            <a href="{{ route('roomEdit', $room->id) }}" class="btn btn-primary btn-lg">
                                                Редактировать текст
                                            </a>
                                            <a href="{{ route('roomImagesEdit',$room->id) }}"
                                               class="btn btn-primary btn-lg">
                                                Редактировать изображения
                                            </a>
                                            <button href="" class="btn btn-info btn-lg">Скрыть</button>
                                            <button href="" class="btn btn-danger btn-lg">Удалить</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <hr>



                    </div>

                        @endforeach
                    @endif
                </div>

            </div>


        </div>
        @endif
    </div>

    </div>


@endsection

