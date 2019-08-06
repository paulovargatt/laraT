<?php

namespace Laratube\Http\Requests\channels;

use Illuminate\Foundation\Http\FormRequest;

class updateChannelRequest extends FormRequest
{



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->channel->user_id === auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'image' => 'image',
            'description' => 'max:1000'
        ];
    }
}
