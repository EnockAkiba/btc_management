<div class="content " style="max-height: 80vh; overflow:auto">
    <div class="container-fluid">
        <div class="row">
            @foreach ($news as $new)
            <div class="col-md-4 col-sm-6 col-lg-4">
                <div class="card">
                    <div class="bg-dark" style="height:250px;">
                        @if ($new->video)
                        <video src="{{ asset('/videos/news/Vid652a6538973954.44074558.mp4')}}" controls style="height: 250px; width:100%"></video>
                        @endif
                        @if ($new->picture)
                        <img src="{{ asset('/' . $new->picture) }}" class="" alt="..." style="height: 250px; width:100% ;">
                        @endif
                    </div>
                    <div class="mt-0 pt-0">
                        <div class="liker-box bg-dark my-0 py-1 px-2">
                            <span> <i class="fa fa-calendar text-gray-300" aria-hidden="true"></i>{{ $new->created_at->format('d.M.Y') }} </span>
                            <div class="liker">
                                <button class="btn" type="submit" wire:click="like({{ $new->id }})">{{ count($new->like) }} <i class="fa fa-heart text-red-400" aria-hidden="true"></i></button>
                                <span class="comment">
                                    {{ count($new->comment) }} <i class="fa fa-comment" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                        <h6 class="card-subtitle mb-2 title-blue"> <a href="{{ route('news.show', $new) }}">
                                {{ substr($new->title, 0, 45) }}...</a></h6>
                        <p class="card-text">
                            {{ substr($new->description, 0, 200) }}... <a href="{{ route('news.show', $new) }}" class="title">Lire plus</a>
                        </p>
                        @if (Auth::user()->roleUser == 0)
                        <p class="flex justify-end my-3">
                            @if ($new->type == 0)
                            <button class="btn" type="submit" wire:click="setType({{ $new->id }})">
                                <i class="fa fa-eye cursor-pointer text-green-600 mx-2 " aria-hidden="true" title="Cette actualité est privée "></i>
                            </button>
                            @else
                            <button class="btn" type="submit" wire:click="setType({{ $new->id }})">
                                <i class="fa fa-eye-slash cursor-pointer text-red-600 mx-2 " aria-hidden="true" title="Cette actualité est publique "> </i>
                            </button>

                            @endif

                        </p>
                        @endif
                    </div>
                </div>
            </div>

            @endforeach
        </div>

    </div>

    {{-- <button class="w-full bg-green-500 text-white py-1">Charger plus</button> --}}

    <!-- /.row -->
</div>