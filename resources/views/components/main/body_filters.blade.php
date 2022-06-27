

<div id="mobile-filter">
    <form action="{{route('filtering')}}" novalidate="novalidate" method="get">
        <div class="mb-2">
            <h6 class="p-1 border-bottom">Цена</h6>
            <select class="form-select" name="sort">
                <option value="-price" @if($session['sort'] && $session['sort'] == "-price") selected @endif>По убыванию</option>
                <option value="price" @if($session['sort'] && $session['sort'] == "price") selected @endif>По возрастанию</option>
            </select>
        </div>
        <div class="mb-2">
            <h6 class="p-1 border-bottom">Направление</h6>

            <select class="form-select"
                    id="location" name='filter[location_id]'>
                <option value="">Все направления</option>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}" @if($session['filter'] && $session['filter']['location_id'] == $location->id) selected @endif>{{ $location->title }}</option>
                @endforeach

            </select>

        </div>
        <div class="mb-2">
            <h6 class="p-1 border-bottom">Месяц</h6>
            <select class="form-select"
                    id="month" name="filter[place_in_month]">
                <option value="">Любой месяц</option>
                @foreach($months as $month)
                    <option value="{{ $month->id }}" @if($session['filter'] && $session['filter']['place_in_month'] == $month->id) selected @endif>{{ $month->title }}</option>
                @endforeach

            </select>
        </div>

{{--        <div class="mb-2">--}}
{{--            <h6 class="p-1 border-bottom">Акции</h6>--}}
{{--            <select class="form-select">--}}
{{--                <option>Без акции</option>--}}
{{--                <option>Со скидками</option>--}}
{{--            </select>--}}
{{--        </div>--}}
        <div class="mb-2">
            <h6 class="p-1 border-bottom">Звездность</h6>
            <select class="form-select" id="stars" name="filter[stars]">
                <option value="">Любая звездность</option>
                @for($i = 0; $i <= 5; $i++)
                    <option value="{{$i}}" @if(isset($session['filter']['stars']) && $session['filter']['stars'] === (string) $i) selected @endif>{{$i}}</option>
                @endfor

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Применить</button>
    </form>
</div>

