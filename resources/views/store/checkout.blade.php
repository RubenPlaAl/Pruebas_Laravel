<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Carrito') }}
            </h2>
        </div>
    </x-slot>

    <section class=" space-y-6 pt-5 h-screen" style="background-image: url('../storage/Fondo-Tienda.jpg'); background-size: cover; background-position: center;">
        @include('includes.mensaje')
        <div>
            @if(Cart::content()->isEmpty())
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        {{ __("No hay productos en el carrito.") }}
                    </div>
                </div>
            </div>

            @else
            <div class="max-w-8xl mx-auto md:px-0 sm:px-6 lg:px-0 overflow-x-auto">

                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Caratula
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Importe
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Eliminar del carrito
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">
                        @foreach(Cart::content() as $item)
                        <tr class="align-middle">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <img src="{{ route('store.file',['filename' => $item->options->image]) }}" alt="" class="rounded h-18 w-auto mt-2">
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 dark:text-gray-100">{{ $item->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $item->price }}€</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $item->qty }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $item->subtotal }}€</span>
                            </td>
                            <td>
                                <form action="{{route('cart.removeitem')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="rowId" value="{{$item->rowId}}">
                                    <x-primary-button class="mt-5 ml-5 deletebtn" type>
                                        {{ __('Quitar X') }}
                                    </x-primary-button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="3"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-right" colspan="2">
                                <span class="text-sm text-gray-900 dark:text-gray-100 font-semibold">Subtotal:</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <span class="text-sm text-gray-900 dark:text-gray-100 font-semibold">{{ Cart::subtotal() }}€</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-right" colspan="2">
                                <span class="text-sm text-gray-900 dark:text-gray-100 font-semibold">Tax:</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <span class="text-sm text-gray-900 dark:text-gray-100 font-semibold">{{ Cart::tax() }}€</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="px-6 py-4 whitespace-nowrap text-right" colspan="2">
                                <span class="text-sm text-gray-900 dark:text-gray-100 font-semibold">Total:</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <span class="text-sm text-gray-900 dark:text-gray-100 font-semibold">{{ Cart::total() }}€</span>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="botoncarrito mb-5 flex items-center justify-center">
                    <form action="{{ route('cart.comprar') }}" method="post">
                        @csrf
                        <x-primary-button type="submit" class="comprar">
                            {{ __('Comprar') }} <i class="bi bi-box ml-2"></i>
                        </x-primary-button>
                    </form>

                    <a href="{{route('cart.clear')}}">
                        <x-primary-button class="vaciarCarro" type>
                            {{ __('Vaciar Carrito') }} <i class="bi bi-cart-x ml-2"></i>
                        </x-primary-button>
                    </a>
                </div>
            </div>
            @endif
            @include('includes.volver')

    </section>

</x-app-layout>