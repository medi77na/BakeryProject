@props(['product' => null])

<div
    class="w-full mx-4 mb-7 bg-white max-w-80 h-96 border-solid border-2 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="bg-cover bg-center bg-no-repeat rounded-t-lg p-4 flex justify-end h-3/5 px-4 pt-4"
        style="background-image: url({{ $product->image_url }})">
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
            <form action="" method="post"></form>
            <button data-modal-target="default-modal--{{ $product->id }}"
                data-modal-toggle="default-modal--{{ $product->id }}"
                class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Detalles</button>
        </div>
    </div>
</div>
