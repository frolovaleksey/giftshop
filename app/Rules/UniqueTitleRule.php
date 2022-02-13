<?php

namespace App\Rules;

use App\Field;
use Illuminate\Contracts\Validation\Rule;

class UniqueTitleRule implements Rule
{
    protected $model;
    protected $fkey = 'title';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
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
        $field = Field::where('fkey', $this->fkey)
            ->where('filabletable_type', get_class($this->model))
            ->where('value', $value)
            ->where('filabletable_id', '!=', $this->model->id)
            ->first();

        return ($field === null);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Title is not unique ';
    }
}
