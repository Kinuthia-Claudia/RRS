<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TimeBetween implements Rule
{
    public function passes($attribute, $value)
    {
        return true; // Always return true to pass validation
    }

    public function message()
    {
        return ''; // No error message needed since validation always passes
    }
}
