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
