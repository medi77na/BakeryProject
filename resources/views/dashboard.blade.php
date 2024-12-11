<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inicio') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end p-2">
                    <x-admin-form-products />
                    <button data-modal-target="crud-modal--0" data-modal-toggle="crud-modal--0"
                        class="block text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800"
                        type="button">
                        Añadir producto
                    </button>
                </div>
                <div class="flex flex-wrap justify-center p-6 text-gray-900 dark:text-gray-100">
                    @forelse ($products as $product)
                        <x-admin-products :product="$product" />
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center">There are not products
                            </td>
                        </tr>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
