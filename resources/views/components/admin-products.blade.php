@props(['product' => null])

<x-admin-form-products :product="$product" />
<x-admin-confirm-destroy-products :product="$product" />

<div
    class="w-full mx-4 mb-7 bg-white max-w-80 h-96 border-solid border-2 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="bg-cover bg-center bg-no-repeat rounded-t-lg p-4 flex justify-end h-3/5 px-4 pt-4"
        style="background-image: url({{ $product->image_url }})">

        <button id="dropdownButton--{{ $product->id }}" data-dropdown-toggle="dropdown--{{ $product->id }}"
            class="h-8 text-gray-500 dark:text-gray-400 border border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
            type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 16 3">
                <path
                    d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
            </svg>
        </button>

        <!-- Dropdown menu -->
        <div id="dropdown--{{ $product->id }}"
            class="z-10 hidden w-24 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2" aria-labelledby="dropdownButton--{{ $product->id }}">
                <button data-modal-target="crud-modal--{{ $product->id }}"
                    data-modal-toggle="crud-modal--{{ $product->id }}"
                    class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                    type="button">
                    Editar
                </button>

                <button data-modal-target="confirm-modal--{{ $product->id }}"
                    data-modal-toggle="confirm-modal--{{ $product->id }}"
                    class="block px-4 w-full py-2 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-red-200 dark:hover:text-red"
                    type="button">Eliminar
                </button>
            </ul>
        </div>
    </div>
    <div class="flex flex-col items-center h-2/5">
        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $product->name }}</h5>
        <div class="my-1">
            <div class="flex justify-start items-center my-1">
                <span class="iconify mr-2" data-icon="material-symbols:attach-money" data-inline="false"
                    style="width: 1.5em; height: 1.5em;"></span>

                <!-- Formatea el precio del producto con separador de miles y sin decimales -->
                <p class="font-bold">Precio: <span
                        class="text-sm text-gray-500 dark:text-gray-400">{{ number_format($product->price, 0, '', '.') }}</span>
                </p>
            </div>
            <div class="flex justify-start items-center my-1">
                <span class="iconify mr-2" data-icon="tabler:list-numbers" data-inline="false"
                    style="width: 1.5em; height: 1.5em;"></span>
                <p class="font-bold">Stock: <span
                        class="text-sm text-gray-500 dark:text-gray-400">{{ $product->stock }}</span></p>
            </div>
        </div>
        <x-admin-details-products :product="$product" />
        <div class="flex mt-2">
            <form action="/products/{{ $product->id }}/toggle-published" method="POST">
                @csrf
                @method('PATCH')
                @php
                    $background = $product->published ? 'bg-[#e21c47]' : 'bg-green-700';
                    $hoverBackground = $product->published ? 'hover:bg-[#c91a40]' : 'hover:bg-green-800'; // Hover rojo más oscuro
                    $focusRing = 'focus:ring-4 focus:outline-none focus:ring-green-300';
                    $darkMode = 'dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800';
                @endphp

                <button
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white {{ $background }} rounded-lg {{ $hoverBackground }} {{ $focusRing }} {{ $darkMode }}"
                    type="submit">
                    {{ $product->published ? 'Ocultar' : 'Publicar' }}
                </button>
            </form>

            <button data-modal-target="default-modal--{{ $product->id }}"
                data-modal-toggle="default-modal--{{ $product->id }}"
                class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Detalles</button>
        </div>
    </div>
</div>
