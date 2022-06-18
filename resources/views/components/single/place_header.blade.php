<div class="modal-image-wrapper">


    <div>

        <!-- CONTENEDOR SLIDER -->
        <div id="carouselPlace" class="carousel slide p-0" data-bs-ride="carousel">

            <!-- INDICADORES -->
            <ol class="carousel-indicators">
                @for($i = 0; $i<count($place->images);$i++)

                    <button type="button" data-bs-target="#carouselPlace"
                            data-bs-slide-to="{{$i}}"
                            class="{{$i== 0 ? 'active' : '' }}"
                            aria-current="true"
                            aria-label="Slide {{$i}}">

                    </button>

                @endfor
            </ol>

            <!-- IMAGENES O CONTENIDO SLIDES -->
            <div class="carousel-inner">
                @foreach($place->images as $key => $image)

                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                        <img src="{{ asset("storage/{$image->link}") }}" class="d-block w-100" alt="...">
                    </div>

                @endforeach
            </div>

            <!-- FLECHA ANTERIOR -->
            <a class="carousel-control-prev" href="#carouselPlace" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </a>

            <!-- FLECHA SIGUIENTE -->
            <a class="carousel-control-next" href="#carouselPlace" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

    </div>

</div>



<div class="modal-info-header">
    <div class="left-side">
        <h1 class="modalHeader-js"> {{ $place->title }}
            @if($place->stars !== 0)
                <div class="rating-mini">
                    @for($i = 0; $i < $place->stars; $i++)
                        <span class="active"></span>
                    @endfor
                </div>
            @endif
        </h1>
        <p>{{ $place->location->title }}  <a href="{{ $place->on_map }}" class="btn btn-outline-danger btn-sm">На карте</a>   </p>
    </div>
    <div class="right-side">


    </div>
</div>

