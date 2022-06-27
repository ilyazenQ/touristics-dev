<div style="background:
 url(https://cdnn21.img.ria.ru/images/07e5/03/13/1602011509_0:160:3072:1888_1920x0_80_0_0_b1c5c3c095c740969f1bf764b0b81b37.jpg)  0 0/cover no-repeat ; width: 100%;">
    <div class="px-4 py-5 text-center">
        <h1 class="hero-title display-5 fw-bold">Байкал ближе чем кажется</h1>
        <div class="col-lg-6 mx-auto">
            <p class="hero-title lead mb-4">сервис бронирования отдыха без посредников</p>
        </div>
    </div>

    <section class="search-sec">
        <div class="container">
            <form action="{{ route('filtering') }}"
                  method="get"

            >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-3 col-sm-12 p-0">

                                <select class="form-control search-slt"
                                        id="location" name='filter[location_id]'>
                                    <option value="">Все направления</option>
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}" @if($session['filter'] && $session['filter']['location_id'] == $location->id) selected @endif>{{ $location->title }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                <select class="form-control search-slt"
                                        id="month" name="filter[place_in_month]">
                                    <option value="">Любой месяц</option>
                                    @foreach($months as $month)
                                        <option value="{{ $month->id }}" @if($session['filter']  && $session['filter']['place_in_month'] == $month->id)
                                            selected
                                            @endif>{{ $month->title }}</option>
                                    @endforeach

                                </select>
                            </div>
{{--                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">--}}
{{--                                <select class="form-control search-slt"--}}
{{--                                        id="type" name="filter[type_id]">--}}
{{--                                    <option value="1">Тип размещения</option>--}}

{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="col-lg-4 col-md-4 col-sm-12 p-0">
                                <button type="submit"
                                        class="btn btn-primary wrn-btn">Искать!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

</div>

