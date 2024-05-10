<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg max-w-md mx-auto">
    <div class="max-w-xl relative">
        <div class=" relative">

            <a class="datos-image" href="{{ route('perfil', ['id' => $image->user->id])}}">
                @if($image->user->image)
                <div class="nav-avatar">
                    <div class="image-avatar">
                        <img src="{{route('user.avatar', ['filename'=>$image->user->image])}}" class="rounded  mx-auto  mt-2" style="height: 150px">
                    </div>
                </div>
                @endif
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{$image->user->name}}
                </h2>
            </a>
            <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
                {{ FormatTime::LongTimeFilter($image->created_at)  }}
            </span>

            <div class="relative mt-5">
                <img src="{{route('image.file',['filename' => $image->image_path])}}" alt="" class="w-full h-auto rounded-lg">
                <div class="absolute inset-0 bg-black opacity-50 rounded-lg"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center text-white text-center">
                    <h3 class="font-semibold">{{$image->description}}</h3>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="likes text-white p-5">
                <?php $user_like = false; ?>
                @foreach($image->likes as $like)
                @if($like->user->id == Auth::user()->id)
                <?php $user_like = true; ?>
                @endif
                @endforeach
                @if($user_like)
                <i class="bi bi-star-fill  fs-4 mr-2 btn-like" data-id="{{$image->id}}"></i>
                @else
                <i class="bi bi-star-fill  fs-4 mr-2 btn-dislike" data-id="{{$image->id}}"></i>
                @endif
                {{count($image->likes)}}
                <span>{{__("Interested")}}</span>
            </div>
            <a href="{{ route('image.detail', ['id' => $image->id])}}">
                <x-primary-button class="mt-5">
                    {{__("Opinions")}}({{count($image->comments)}})
                </x-primary-button>
            </a>
        </div>
    </div>
</div>