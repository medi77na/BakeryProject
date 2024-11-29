<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-4 border-yellow-700 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end border-4 border-black-700">
                    <x-admin-form-products />
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800" type="button">
                        Añadir producto
                      </button>

                </div>
                <div class="flex flex-wrap justify-center border-4 border-green-700 p-6 text-gray-900 dark:text-gray-100">
                    <x-admin-products />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
