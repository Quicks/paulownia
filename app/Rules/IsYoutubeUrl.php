<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsYoutubeUrl implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $rx = '~^(?:https?://)?(?:www[.])?(?:youtube[.]com/watch[?]v=|youtu[.]be/)([^&]{11})~x';
        return preg_match($rx, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
       return __('validation.custom.video.IsYoutubeUrl');
    }
}
