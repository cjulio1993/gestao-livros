<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->has('year')) {
            $this->merge(['publication_year' => $this->year]);
        }
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|unique:books,isbn|size:13',
            'category_id' => 'required|exists:categories,id',
            'publisher' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'author.required' => 'O autor é obrigatório.',
            'isbn.required' => 'O ISBN é obrigatório.',
            'isbn.unique' => 'Este ISBN já está cadastrado.',
            'isbn.size' => 'O ISBN deve ter 13 dígitos.',
            'category_id.required' => 'A categoria é obrigatória.',
            'category_id.exists' => 'Categoria inválida.',
            'publisher.required' => 'A editora é obrigatória.',
            'year.required' => 'O ano de publicação é obrigatório.',
            'year.min' => 'Ano inválido.',
            'quantity.required' => 'A quantidade é obrigatória.',
            'quantity.min' => 'A quantidade deve ser no mínimo 1.',
            'cover_image.image' => 'O arquivo deve ser uma imagem.',
            'cover_image.max' => 'A imagem não pode exceder 2MB.'
        ];
    }
}
