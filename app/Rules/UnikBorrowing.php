<?php

namespace App\Rules;

use App\Models\Borrowing;
use Illuminate\Contracts\Validation\Rule;

class UnikBorrowing implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $students_id;
    private $books_id;
    public function __construct($students_id, $books_id)
    {
        //
        $this->students_id = $students_id;
        $this->books_id = $books_id;
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
        return !Borrowing::where('students_id', $this->students_id)->where('books_id', $this->books_id)->exist();


        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Anda tidak boleh meminjam lagi';
    }
}
