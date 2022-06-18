

<div id="mobile-filter">
    <form action="{{ route('filtering') }}" novalidate="novalidate" method="get">
        <div class="mb-2">
            <h6 class="p-1 border-bottom">Цена</h6>
            <select class="form-select" name="sort">
                <option value="-price">По убыванию</option>
                <option value="price">По возрастанию</option>
            </select>
        </div>

        <div class="mb-2">
            <h6 class="p-1 border-bottom">Акции</h6>
            <select class="form-select">
                <option>Без акции</option>
                <option>Со скидками</option>
            </select>
        </div>
        <div class="mb-2">

            <h6>Звездность</h6>

            <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" name="type"> <label for="boring" class="pl-1 pt-sm-0 pt-1">Без звезд</label> </div>
            <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" name="type"> <label for="ugly" class="pl-1 pt-sm-0 pt-1">Мение 3</label> </div>
            <div class="form-inline border rounded p-md-2 p-sm-1"> <input type="radio" name="type"> <label for="notugly" class="pl-1 pt-sm-0 pt-1">Более 3</label> </div>

        </div>
        <button type="submit" class="btn btn-primary">Применить</button>
    </form>
</div>
