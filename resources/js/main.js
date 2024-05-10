

var url = 'http://localhost/EntornoServidor/PlarHub/Pruebas_Laravel/public';


$(document).ready(function () {
    // Dar like o quitar like
    $(document).on("click", ".bi-star-fill", function () {
        var icon = $(this);
        var isLiked = icon.hasClass('btn-like');

        animateFontSize(icon);

        var ajaxUrl = isLiked ? url + '/dislike/' : url + '/like/';
        $.ajax({
            url: ajaxUrl + $(this).data('id'),
            type: 'GET',
            success: function (response) {
                if (isLiked) {
                    if (response.like) {
                        console.log('Has quitado el like');
                    } else {
                        console.log('Error al quitar el like');
                    }
                } else {
                    if (response.like) {
                        console.log('Has dado like');
                    } else {
                        console.log('Error al dar like');
                    }
                }
            }
        });

        icon.toggleClass('btn-like btn-dislike');
    });

    function animateFontSize(icon) {
        var currentFontSize = parseInt(icon.css('font-size'));
        var targetFontSize = currentFontSize === 20 ? 16 : 20;

        icon.animate({ fontSize: targetFontSize + 'px' }, 200, function () {
            setTimeout(function () {
                icon.animate({ fontSize: currentFontSize + 'px' }, 200);
            }, 100);
        });
    }

    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');
    $('.cart').css('cursor', 'pointer');


    var modal = document.getElementById('id01');
    var cancelBtn = document.querySelector('.cancelbtn');

    // Si pulsas en cualquier zona fuera del modal lo quitas!
    window.onclick = function (event) {
        if (event.target == modal || event.target == cancelBtn) {
            modal.style.display = "none";
        }
    }

    $('#buscador').submit(function () {
        $(this).attr('action', url + '/profiles/' + $('#buscador #search').val());

    });

    document.addEventListener('DOMContentLoaded', function () {
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

        // Agregar event listeners a los botones de control
        document.querySelector('.carousel-control.prev').addEventListener('click', prevItem);
        document.querySelector('.carousel-control.next').addEventListener('click', nextItem);
        console.log(document.querySelector('.carousel-control.prev'));
        console.log(document.querySelector('.carousel-control.next'));

        // Mostrar la primera imagen al cargar la página
        showItem(0);
    });





});
