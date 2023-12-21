<div class="content " style="max-height: 80vh; overflow:auto">
    <div class="container-fluid">
        <div class="row">
            @foreach ($news as $new)
            <div class="col-md-12 col-lg-12 col-sm-6 mb-2">
                <div class="card p-0">
                    <div class="row p-0">
                        <div class="col-md-4">
                            <div class="bg-dark" style="height: 300px;">
                                @if ($new->video)
                                <video src="{{ asset('/videos/news/Vid652a6538973954.44074558.mp4')}}" controls style="height: 300px; width:100%"></video>
                                @endif
                                @if ($new->picture)
                                <img src="{{ asset('/' . $new->picture) }}" class="" alt="..." style="height: 300px; width:100% ;">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8 m-0 px-2 pt-2">
                            <h2 class="text-md font-semibold mb-3 mx-2">{{ substr($new->title, 0, 45) }}</h2>

                            <div class="mb-1 ml-2 pe-3 flex justify-between items-center" style="height: 50px; width:100%">
                                <div class="flex items-center">
                                    @if($new->user->picture)
                                    <img class=" rounded-full" style="width:45px; height:45px" src="{{ asset('/' . $new->user->picture) }}" alt="User Image">
                                    @else
                                        <img class=" rounded-full" style="width:45px; height:45px" src="{{asset('/images/user.png')}}">
                                    @endif
                                  </div>
                                <span class="mx-2 date"><i class="fa fa-calendar text-gray-200"></i> {{ $new->created_at->format('d.M.Y H:i') }} </span>
                            </div>




                            <p class="text-muted  mx-2" style="min-height: 140px;">
                                {{ substr($new->description, 0, 690) }}... <a href="{{ route('news.show', $new) }}" class="text-blue-400">Lire plus</a>
                            </p>

                            <div class=" mb-3">
                                <div class="flex justify-end pr-3">
                                    @if (Auth::user()->roleUser == 2)
                                    @if ($new->type == 0)
                                    <button class="btn" type="submit" wire:click="setType({{ $new->id }})">
                                        <i class="fa fa-eye cursor-pointer text-green-600 " aria-hidden="true" title="Cette actualité est privée "></i>
                                    </button>
                                    @else
                                    <button class="btn" type="submit" wire:click="setType({{ $new->id }})">
                                        <i class="fa fa-eye-slash cursor-pointer text-red-600" aria-hidden="true" title="Cette actualité est publique "> </i>
                                    </button>

                                    @endif
                                    @endif
                                    <div class=" cursor-pointer text-center  p-2 rounded-full" wire:click="like({{ $new->id }})">
                                        <span>{{ count($new->like) }} <i class="fa fa-heart text-red-300" aria-hidden="true"></i></span>
                                    </div>
                                    <a href="{{ route('news.show', $new) }}" class=" text-center p-2 ml-2 rounded-full">

                                        <span class="">
                                            {{ count($new->comment) }} <i class="fa fa-comment text-blue-400"></i>
                                        </span>

                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>