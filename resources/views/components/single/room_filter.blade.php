
<div class="modal-info-header d-flex">

    <div class="left-side">
        <h1 class="modalHeader-js">Выбрать номер</h1>

    </div>

    <div class="right-side">




    </div>
</div>

<div class="container mb-3">


    <form action="{{route('roomFilter',$place->id)}}" method="get" novalidate="novalidate">
        <div class="row">

            <div class="row">

                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <select class="form-select search-slt"
                            id="month" name="filter[place_in_month]">
                        <option value="">Любой месяц</option>
                        @foreach($months as $month)
                            <option value="{{ $month->id }}" @if($session['filter'] && $session['filter']['place_in_month'] == $month->id) selected @endif>{{ $month->title }}</option>
                        @endforeach

                    </select>
                </div>
{{--                <div class="col-lg-3 col-md-3 col-sm-12 p-0">--}}
{{--                    <select class="form-select search-slt" id="exampleFormControlSelect1">--}}
{{--                        <option>Select Vehicle</option>--}}
{{--                        <option>Example one</option>--}}
{{--                        <option>Example one</option>--}}
{{--                        <option>Example one</option>--}}
{{--                        <option>Example one</option>--}}
{{--                        <option>Example one</option>--}}
{{--                        <option>Example one</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <button type="submit" class="btn btn-primary wrn-btn">Search</button>
                </div>
            </div>
        </div>

    </form>
</div>
