<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-image: url('./storage/Fondo-dashboard.jpg'); background-size: cover; background-position: center; min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center dark:text-gray-100">
                    <h2 class="text-2xl font-semibold">{{__('Welcome to the Gallery')}}</h2>
                    <p class="mt-2 mb-5">{{__('Explore the amazing collection of images.')}}</p>
                </div>
            </div>
        </div>

        <!-- Slideshow Section -->
        <div class="max-w-7xl mx-auto px-4 py-5 my-5">
            <div id="slideshow" class="carousel dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                <div class="carousel-inner" style="display: flex;">
                    @foreach ($images as $key => $image)
                        @if($key % 3 === 0)
                            <div class="carousel-item" style="flex: 1;">
                                @for($i = 0; $i < 3; $i++)
                                    @if(isset($images[$key + $i]))
                                        <img src="{{ asset(Storage::url($images[$key + $i])) }}" class="d-block w-100 image-clickable" style="max-width: 100%;" alt="Imagen {{ $key + $i + 1 }}">
                                    @endif
                                @endfor
                            </div>
                        @endif
                    @endforeach
                </div>
                <x-primary-button class="carousel-control-prev">&lt;</x-primary-button>
                <x-primary-button class="carousel-control-next">&gt;</x-primary-button>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Modal -->
<div id="modal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="modal-image">
</div>

<!-- Script para abrir y cerrar el modal -->
<script>
    var carousel = document.querySelector('.carousel');
    var items = carousel.querySelectorAll('.carousel-item');
    var currentIndex = 0;

    function showItem(index) {
        console.log("Mostrando elemento en el índice:", index);
        items[currentIndex].classList.remove('active');
        items[index].classList.add('active');
        currentIndex = index;
    }

    function nextItem() {
        var nextIndex = currentIndex + 1;
        if (nextIndex >= items.length) {
            nextIndex = 0;
        }
        showItem(nextIndex);
    }

    function prevItem() {
        var prevIndex = currentIndex - 1;
        if (prevIndex < 0) {
            prevIndex = items.length - 1;
        }
        showItem(prevIndex);
    }

    document.querySelector('.carousel-control-prev').addEventListener('click', prevItem);
    document.querySelector('.carousel-control-next').addEventListener('click', nextItem);

    // Mostrar la primera imagen al cargar la página
    showItem(0);

    // Obtener el modal
    var modal = document.getElementById("modal");

    // Obtener la imagen y agregar el evento de clic a cada una
    var images = document.querySelectorAll(".carousel-item img");
    images.forEach(function(image) {
        image.addEventListener("click", function() {
            modal.style.display = "block";
            var modalImg = document.getElementById("modal-image");
            modalImg.src = this.src;
        });
    });

    // Obtener el elemento de cierre y agregar el evento de clic para cerrar el modal
    var span = document.getElementsByClassName("close")[0];
    span.addEventListener("click", function() {
        modal.style.display = "none";
    });

    // Cuando el usuario hace clic fuera del modal, ciérralo
    window.addEventListener("click", function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });

    // Cerrar el modal cuando se presiona la tecla Escape
    window.addEventListener("keydown", function(event) {
        if (event.key === "Escape") {
            modal.style.display = "none";
        }
    });
</script>
