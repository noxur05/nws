<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $title, $subtitle, $body, $link, $class;
    public function __construct($title, $subtitle = null, $body = null, $link = null, $class = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->body = $body;
        $this->link = $link;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
