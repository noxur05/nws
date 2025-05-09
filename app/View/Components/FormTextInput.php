<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormTextInput extends Component
{
    public $name, $id, $type, $value, $placeholder, $required, $class;
    public function __construct($name, $id, $type = 'text', $value = null, $placeholder='', $required = false, $class='')
    {
        $this->name = $name;
        $this->id = $id;
        $this->type = $type;
        $this->value = old($name, $value);
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('components.form-text-input');
    }
}
