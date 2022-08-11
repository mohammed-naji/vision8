<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckWordCount implements Rule
{
    protected $count;
    protected $msg;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($count, $msg)
    {
        $this->count = $count;
        $this->msg = $msg;
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
        return str_word_count($value) < $this->count;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->msg;
    }
}
