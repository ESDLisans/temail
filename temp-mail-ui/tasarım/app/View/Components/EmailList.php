<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EmailList extends Component
{
    public $emails;

    public function __construct($emails = [])
    {
        $this->emails = $emails;
    }

    public function render()
    {
        return view('components.email-list');
    }
}
