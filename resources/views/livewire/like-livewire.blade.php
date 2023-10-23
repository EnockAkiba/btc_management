<div class="content " style="max-height: 80vh; overflow:auto">
    <div class="container-fluid">
        <div class="row">
            @foreach ($news as $new)
             <div class="col-md-6 col-lg-6 col-sm-6 mb-2">
                <div class="card p-0">
                    <div class="row p-0">
                        <div class="col-md-6">
                            <div class="bg-dark" style="height: 300px;">
                                @if ($new->video)
                                <video src="{{ asset('/videos/news/Vid652a6538973954.44074558.mp4')}}" controls style="height: 300px; width:100%"></video>
                                @endif
                                @if ($new->picture)
                                <img src="{{ asset('/' . $new->picture) }}" class="" alt="..." style="height: 300px; width:100% ;">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 m-0 px-2 pt-2">
                            <h2 class="text-md font-semibold mb-3 mx-2">{{ substr($new->title, 0, 45) }}</h2>

                            <div class="mb-1 ml-2 pe-3 flex justify-between items-center" style="height: 44px; width:100%">
                                <div class="flex items-center">
                                    <img class="img-circle" style="height: 44px;" src="{{ asset('/' . $new->user->picture) }}" alt="User Image">
                                    <!-- <span class="text-sm mx-2"><a href="#">{{ $new->user->name }}</a></span> -->
                                </div>
                                <span class="mx-2 date"><i class="fa fa-calendar text-gray-200"></i> {{ $new->created_at->format('d.M.Y H:i') }} </span>
                            </div>




                            <p class="text-muted  mx-2 text-sm" style="height: 140px;">
                                {{ substr($new->description, 0, 245) }}... <a href="{{ route('news.show', $new) }}" class="text-blue-400">Lire plus</a>
                            </p>
                            <div class="row justify-evenly mb-3">
                                <div class=" cursor-pointer col-5 text-center bg-gray-50 p-1 rounded-full" wire:click="like({{ $new->id }})">
                                    <span>{{ count($new->like) }} <i class="fa fa-heart text-red-300" aria-hidden="true"></i></span>
                                </div>
                                <a href="{{ route('news.show', $new) }}" class="col-5 text-center bg-gray-50 p-1 rounded-full">

                                    <span class="">
                                        {{ count($new->comment) }} <i class="fa fa-comment text-blue-400"></i>
                                    </span>

                                </a>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>