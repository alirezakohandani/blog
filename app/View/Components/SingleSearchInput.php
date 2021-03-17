<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SingleSearchInput extends Component
{
    /**
     * Input name
     * 
     * @var string
     */
    public $name;

    /**
     * Input value
     * 
     * @var string
     */
    public $value;

    /**
     * Input placeholder
     * 
     * @var string
     */
    public $placeholder;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $value, $placeholder)
    {
        $this->name = $name;
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.single-search-input');
    }
}
