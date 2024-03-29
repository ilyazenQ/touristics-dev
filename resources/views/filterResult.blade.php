@extends('layouts.main')
@section('content')

    <div class="app-container main-page">
        @include('components.main.header')

        @include('components.main.filter_params')


        <section class="app-main">

            @include('components.main.body_filters')

            <div class="app-main-left cards-area">
            @if(count($places) === 0)
                <h2>По вашему запросу ничего не найдено</h2>
                @else
                @foreach($places as $place)
                    <div class="card-wrapper main-card">
                        <a class="card cardItemjs"  href="{{ route("placeSingle", ['id' => $place->id, 'filter[place_in_month]' => $session['filter']['place_in_month']]) }}">
                            <div class="card-image-wrapper">
                                <img  src="{{ asset("storage/{$place->images[0]->link}") }}" alt="Hotel">
                            </div>
                            <div class="card-info">
                                <div class="card-text big cardText-js">
                                    {{ $place->title }}
                                    @if($place->stars !== 0)
                                        <div class="rating-mini">
                                            @for($i = 0; $i < $place->stars; $i++)
                                                <span class="active"></span>
                                            @endfor
                                        </div>
                                    @endif
                                </div>
                                <div class="card-text small mb-1">
                                    <div class="btn btn-outline-info">{{ $place->type->title }}</div>
                                </div>
                                <div class="card-text small mb-1">
                                    <div class="btn btn-outline-primary btn-sm">{{ $place->location->title }}</div>

                                    @if (!is_null($place->distance_to))
                                        <div class="btn btn-outline-secondary btn-sm">{{ $place->distance_to }}м до Байкала</div>
                                    @endif
                                </div>
                                <div class="card-text small mb-1">
                                    <div class="btn btn-outline-danger btn-sm">
                                        Рейтинг: {{ $place->getReadableRating($place->rating) }}
                                    </div>

                                </div>
                                <div class="card-text small mb-1">

                                    @if (($place->price) !== 0)
                                        Цена от
                                        <span class="card-price"> {{ $place->price }} рублей/сутки</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @endif

            </div>
        </section>

        <script>
            let filterLine = document.querySelector("div.filter-line");
            let sel = document.querySelectorAll('select')
            sel.forEach((el) => {
                let options =  el.getElementsByTagName('option');
                for (let i = 0; i < options.length; i++) {
                    if (options[i].selected) {
                        let elem = document.createElement("button");
                        elem.classList.add('filter-btn')
                        let elemText = document.createTextNode(options[i].innerHTML);
                        elem.appendChild(elemText);
                        filterLine.appendChild(elem);
                    }
                }

            })
        </script>
@endsection


