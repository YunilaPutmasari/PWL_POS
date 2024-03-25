<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\RedirectResponse;

class StorePostRequestLevel extends FormRequest
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
            // level
            'level_kode' => 'required',
            'level_nama' => 'required',
        ];
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        // The incoming rwquest is valid...
        // retrieve the validate input data..

        $validated = $request->validated();

        // retrieve a portion of the validated input data...

        // // store the post..

        $validated = $request->safe()->only(['level_kode', 'level_nama']);
        $validated = $request->safe()->except(['level_kode', 'level_nama']);

        // store the post..
        return redirect('/level');
    }
}
