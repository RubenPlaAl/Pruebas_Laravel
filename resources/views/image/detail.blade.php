<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight m-0">
                {{ __('Comentar Tema') }}
            </h2>
        </div>
    </x-slot>
    @include('includes.mensaje')

    <section class="px-0 container-fluid pt-5" style="background-image: url('./storage/Fondo-Foro.jpg'); background-size: cover; background-position: center; background-repeat: repeat;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mx-auto" style="width: 90%;">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mt-5 position-relative">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{$image->user->name}}
                            </h2>
                            <span class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                {{ FormatTime::LongTimeFilter($image->created_at)  }}
                            </span>
                            <div class="relative mt-5">
                                <img src="{{route('image.file',['filename' => $image->image_path])}}" alt="" class="w-full h-auto rounded-lg">
                                <div class="absolute inset-0 bg-black opacity-50 rounded-lg"></div>
                                <div class="absolute inset-0 flex items-center justify-center text-white text-center">
                                    <h3 class="font-semibold text-2xl w-full">{{$image->description}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <div class="d-flex align-items-center justify-content-center">
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
                                </div>

                                @if(Auth::user() && Auth::user()->id == $image->user->id || Auth::user()->role == 'admin')

                                <x-primary-button onclick="document.getElementById('id01').style.display='block'">Borrar publicación</x-primary-button>
                                <div id="id01" class="modal">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                    <form class="modal-content" action="/action_page.php">
                                        <div class="container">
                                            <h1>Borrar publicacion</h1>
                                            <p class="seguro">Estas seguro de que quieres borrar esta publicación?</p>

                                            <div class="btn-group">
                                                <x-primary-button type="button" class="cancelbtn">Cancelar</x-primary-button>
                                                <a href="{{ route('image.delete', ['id' => $image->id ])}}"> <x-primary-button type="button" class="deletebtn">Borrar
                                                    </x-primary-button></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                @endif
                                @if(Auth::user() && Auth::user()->id == $image->user->id)

                                <a href="{{ route('image.edit', ['id' => $image->id ])}}"> <x-primary-button type="button">Editar
                                    </x-primary-button></a>
                                @endif


                                <div class="clearfix"></div>
                                <div class="comments">
                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mt-5">Opiniones ({{count($image->comments)}})</h2>
                                    <hr>
                                    @foreach($image->comments as $comment)
                                    <div class="comment bg-gray-100 dark:bg-gray-700 p-3 sm:p-6 mb-4 sm:mb-8 rounded-lg shadow">
                                        <div class="flex justify-between items-center mb-2">
                                            <div class="userYHora">
                                                <span class="text-lg font-medium text-gray-900 dark:text-gray-100">{{$comment->user->name}}</span>
                                                <span class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ FormatTime::LongTimeFilter($comment->created_at) }}</span>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="content text-left">
                                            <span class="font-semibold text-lg text-gray-900 dark:text-gray-100">{{$comment->content}}</span>
                                        </div>

                                        @if (Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id || Auth::user()->role == 'admin'))
                                        <x-primary-button class="mt-5">
                                            <a href="{{ route('comment.delete', ['id' => $comment->id])}}">
                                                Eliminar
                                            </a>
                                        </x-primary-button>
                                        @endif

                                    </div>
                                    @endforeach

                                    <form method="POST" action="{{route('comment.save')}}" class="w-full">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="image_id" value="{{$image->id}}">
                                        <p>
                                            <textarea class="form-control mt-5 w-full" name="content" id="content" required cols="30" rows="5" style="background-color: gray;"></textarea>
                                        </p>
                                        <x-primary-button class="btn btn-dark mt-5" type="submit">
                                            Enviar
                                        </x-primary-button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('includes.volver')

</x-app-layout>