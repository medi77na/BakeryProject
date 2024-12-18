<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end p-2">
                    @if ($isAdmin)
                        <x-admin-form-products />
                        <button data-modal-target="crud-modal--{{ 0 }}"
                            data-modal-toggle="crud-modal--{{ 0 }}"
                            class="block text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800"
                            type="button">
                            Añadir producto
                        </button>
                    @endif
                </div>
                <div class="flex flex-wrap justify-center m-4 p-6 text-gray-900 dark:text-gray-100">
                    @forelse ($products as $product)
                        @if ($isAdmin)
                            <x-admin-products :product="$product" />
                        @else
                            @include('users/user-products', ['product' => $product])
                        @endif
                    @empty
                        <p class="text-center text-lg font-medium">No hay productos disponibles.</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
