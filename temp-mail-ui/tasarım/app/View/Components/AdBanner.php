<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdBanner extends Component
{
    public $format;
    public $label;

    public function __construct($format = 'horizontal', $label = null)
    {
        $this->format = $format;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.ad-banner');
    }
}
