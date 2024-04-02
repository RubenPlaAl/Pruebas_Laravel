<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ver detalles') }}
            </h2>
        </div>
    </x-slot>

    <section class="container-fluid px-0"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-5">
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
                                <i class="bi bi-star-fill  fs-4 mr-2"></i>
                                <i class="bi bi-star-fill text-warning fs-4 mr-2" style="color: yellow; display: none;"></i>
                                <div class="clearfix"></div>
                                <div class="comments">
                                  <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mt-5">Opiniones ({{count($image->comments)}})</h2>  
                                  <hr>
                                  <form mehtod="POST" action="{{route('comment.save')}}">
                                  @csrf
                                  @method('POST')
                                   <input type="hidden" name="image_id" value="{{$image->id}}">
                                 
                                    <textarea  class="form-control  mt-5" name="content" id="content" required cols="30" rows="10" style="background-color: gray;"></textarea>
                                  
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
</x-app-layout>
