<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col col">
            <h2 class="mb-4">Комментарии</h2>
            @if(count($comments) === 0)
                <p class="mb-0">
                    Список комментариев пуст. Ваш комментарий будет первым
                </p>
                <hr>
            @else
            @foreach($comments as $comment)
                <div class="card text-dark">

                <div class="card-body">



                    <div class="d-flex flex-start">
                        <img class="rounded-circle shadow-1-strong me-3"
                             src="{{ asset("storage/{$comment->user->image}") }}" alt="avatar" width="60"
                             height="60" />
                        <div>
                            <h6 class="fw-bold mb-1"> {{ $comment->user->name }}</h6>
                            <div class="d-flex align-items-center mb-3">
                                <p class="mb-0">
                                    {{ $comment->created_at }}

                                </p>

                            </div>
                            <p class="mb-0">
                                {{ $comment->body }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                <hr class="my-0" />
                    @endif


                @auth
                <form method="post" action="{{route('commentStore',['userId' => Auth::user()->id,'placeId' => $place->id ]) }}" class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    @csrf
                    @method('post')
                    <div class="d-flex flex-start w-100">
{{--                        <img class="rounded-circle shadow-1-strong me-3"--}}
{{--                             src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"--}}
{{--                             height="40" />--}}
                        <div class="form-outline w-100">
                          <textarea class="form-control" name="body" id="body" rows="4"
                                    style="background: #fff;"></textarea>
                            <label class="form-label" for="body">Сообщение</label>
                        </div>
                    </div>
                    <div class="float-end mt-2 pt-1">
                        <button type="submit" class="btn btn-primary btn-sm">Опубликовать</button>

                    </div>
                </form>
                @endauth

            </div>
        </div>
    </div>
</div>
