<?php
/**
 * @author      Aroldo de Moura Santos
 * @copyright   2023 Aroldo de Moura Santos
 * @license     GPL-3.0 license
 * @link        https://github.com/aroldosantos/LaravelSimpleCMS
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'resumo' => 'required',
            'conteudo' => 'required',
            'status' => 'required',
            'image' => File::image()->max(2 * 1024),
            'categoria_id' => 'required',
            'user_id' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'titulo.required' => 'O título é obrigatório',
            'resumo.required' => 'O resumo é obrigatório',
            'conteudo.required' => 'O conteúdo é obrigatório',
            'image.max' => 'O tamanho máximo da imagem é de 2MB',
            'image.image' => 'O arquivo deve ser uma imagem',
            'status.required' => 'O status é obrigatório',
            'categoria_id.required' => 'A categoria é obrigatória',
            'user_id.required' => 'O Autor é obrigatório',
        ];
    }

}
