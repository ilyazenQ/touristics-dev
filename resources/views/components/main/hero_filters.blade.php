<div style="background-image: url(https://www.waterbaikal.ru/image/cache/catalog/Blog/articles/osobennostiozerabaikal-0x0.jpg); width: 100%;">
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
            novalidate="novalidate">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">

                                <select class="form-control search-slt"
                                        id="location" name="filter[location_id]">

                                    <option value="1">Направление</option>

                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select class="form-control search-slt"
                                        id="month" name="filter[price]">
                                    <option value="1">Месяц поездки</option>

                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select class="form-control search-slt"
                                        id="type" name="filter[type_id]">
                                    <option value="1">Тип размещения</option>

                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
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

