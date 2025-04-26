<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EmailView extends Component
{
    public $email;

    public function __construct($email = null)
    {
        $this->email = $email;
    }

    public function render()
    {
        return view('components.email-view');
    }
}
