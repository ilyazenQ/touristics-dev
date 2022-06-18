@extends('layouts.main')
@section('content')

    <div class="app-container main-page">
        @include('components.main.header')

        @include('components.main.filter_params')


        <section class="app-main">

            @include('components.main.body_filters')

            <div class="app-main-left cards-area">

                <div class="card-wrapper main-card">
                    <a class="card cardItemjs"  href="{{ route("single") }}">
                        <div class="card-image-wrapper">
                            <img src="https://source.unsplash.com/featured/1200x900/?architecture,hotel" alt="Hotel">
                        </div>
                        <div class="card-info">
                            <div class="card-text big cardText-js">The Grand Canyon Hotel
                                <div class="rating-mini">
                                    <span class="active"></span>
                                    <span class="active"></span>
                                    <span class="active"></span>
                                </div></div>
                            <div class="card-text small mb-1">
                                <div class="btn btn-outline-info">Отель</div>
                            </div>
                            <div class="card-text small mb-1">
                                <div class="btn btn-outline-primary btn-sm">Байкальск</div>
                                <div class="btn btn-outline-secondary btn-sm">20м до Байкала</div>
                            </div>
                            <div class="card-text small mb-1">
                                <div class="btn btn-outline-danger btn-sm">Рейтинг: 0/10 </div>

                            </div>
                            <div class="card-text small mb-1">
                                Цена от
                                <span class="card-price"> 1500 рублей/сутки</span>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
        </section>>

@endsection


