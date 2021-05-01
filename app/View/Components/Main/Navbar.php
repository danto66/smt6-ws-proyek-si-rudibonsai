<?php

namespace App\View\Components\Main;

use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (auth()->check()) {
            $cart = auth()->user()->carts->count();
            $profile = auth()->user()->userProfile;

            return view('components.main.navbar', compact('cart', 'profile'));
        }
        return view('components.main.navbar');
    }
}
