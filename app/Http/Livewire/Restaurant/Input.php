<?php

namespace App\Http\Livewire\Restaurant;

use App\Services\Restuarant\Restuarant;
use Livewire\Component;

class Input extends Component
{

    public $location = 'Bang Sue';

    public function render()
    {
        return view('livewire.restaurant.input');
    }

    public function createItem()
    {
        $restuarant = new Restuarant;
        $restuarant->setUrlDirection($this->location)->excuse();

        $this->emit('saved', $restuarant->getResponse());
    }
}
