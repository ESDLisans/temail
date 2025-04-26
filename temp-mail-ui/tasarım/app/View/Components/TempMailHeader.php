<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TempMailHeader extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.temp-mail-header');
    }
}
