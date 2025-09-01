<?php

namespace App\View\Components\cards;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PriceCard extends Component
{
    public $type;
    public $desc;
    public $price;
    public $advantages;
    public $popular;
    /**
     * Create a new component instance.
     */
    public function __construct($type, $desc, $price, $advantages, $popular=false)
    {
        $this->type = $type;
        $this->desc = $desc;
        $this->price = $price;
        $this->advantages = $advantages;
        $this->popular = $popular;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards.price-card');
    }
}
