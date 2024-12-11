<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:500',
            'price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'image_url' => 'nullable|url|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del producto es requerido.',
            'name.string' => 'El nombre del producto debe ser una cadena válida.',
            'name.max' => 'El nombre del producto no puede exceder los 100 caracteres.',
            'description.required' => 'La descripción del producto es requerida.',
            'description.string' => 'La descripción del producto debe ser una cadena válida.',
            'description.max' => 'La descripción del producto no puede exceder los 500 caracteres.',
            'price.required' => 'El precio del producto es requerido.',
            'price.numeric' => 'El precio del producto debe ser un número válido.',
            'price.min' => 'El precio del producto no puede ser menor que 0.',
            'stock.required' => 'El stock del producto es requerido.',
            'stock.integer' => 'El stock del producto debe ser un número entero válido.',
            'stock.min' => 'El stock del producto no puede ser menor que 0.',
            'image_url.url' => 'La URL de la imagen debe ser una URL válida.',
            'image_url.max' => 'La URL de la imagen no puede exceder los 255 caracteres.'
        ];
    }
}
