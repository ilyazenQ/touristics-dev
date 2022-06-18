@extends('layouts.main')
@section('content')
    <style>
        .preview-image
        {
            padding: 10px;
            max-width: 150px;
            height: 100px;
        }
    </style>
    <div class="app-container">
        @include('components.main.header')
        <div class="container">
            @if ($errors->all())
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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

            <h1>
                Редактирование фотографий размещения
            </h1>
            <div class="card mb-2 shadow" id="drop-area">

                <div class="d-flex justify-content-between flex-wrap m-2">

                    @foreach($images as $image)
                        <div style="width: 300px" class="m-2">
                            <img src="{{ asset("/storage/{$image->link}") }}" class="d-block w-100"
                                 style="height: 250px;" alt="...">
                            <form method="post"
                                  action="{{ route('roomImageDestroy', $image->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-1"> Удалить</button>
                            </form>
                        </div>
                    @endforeach
                </div>


                <h2>Загрузите изображения, которые хотели бы добавить</h2>

                <form action="{{ route('roomStoreImages',$id) }}"
                      enctype="multipart/form-data" method="post" id="drop-area">
                    @csrf
                    <div id="preview">

                    </div>
                    <div class="m-2">
                        <input type="file" name="files[]" multiple required onchange="loadFiles(event)"/>
                    </div>
                    <div class="m-2">
                        <button class="btn btn-primary">
                            Загрузить
                        </button>
                    </div>
                </form>

            </div>

        </div>


    </div>
    <script>
        var loadFiles = function (event) {
            for(let i = 0; i < event.target.files.length; i++) {
                var newImg = document.createElement("img");
                newImg.classList.add('preview-image');
                var preview = document.getElementById("preview");
                preview.append(newImg);
                //  var output = document.getElementById('output');
                newImg.src = URL.createObjectURL(event.target.files[i])
            }
        }
    </script>
@endsection

