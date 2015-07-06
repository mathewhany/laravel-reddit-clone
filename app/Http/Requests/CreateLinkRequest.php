<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateLinkRequest extends LinkRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }
}
