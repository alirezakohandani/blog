<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;

class mailable implements Rule
{
    /**
     * mailable variable
     *
     * @var [string]
     */
    private $mailable;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->mailable = $request->mailable;
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
        $whiteList = ['WellcomeMail', 'ForgetMail'];
        return in_array($this->mailable, $whiteList);   
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please enter the correct information';
    }
}
