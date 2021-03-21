<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SortBox extends Component
{

    /**
     * Columns
     *
     * @var array
     */
    public $columns;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($columns)
    {
        $this->columns = $columns;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.sort-box');
    }
}
