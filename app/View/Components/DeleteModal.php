<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteModal extends Component
{
    public $route;
    public $model;
    public $id;

    public function __construct($route, $model, $id)
    {
        $this->route = $route;
        $this->model = $model;
        $this->id    = $id;
    }

    public function render()
    {
        return view('components.delete-modal');
    }
}
