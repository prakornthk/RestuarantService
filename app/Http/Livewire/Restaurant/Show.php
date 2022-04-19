<?php

namespace App\Http\Livewire\Restaurant;

use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['saved'];

    public $response = null;

    public function render()
    {
        $export = [
            'list' => [],
        ];

        if (!is_null($this->response)) {
            $export['list'] = $this->response;
            // dd($export['list']['results']);
        }

        return view('livewire.restaurant.show', compact('export'));
    }
    
    public function saved($data)
    {
        $this->response = $data;

        $this->render();
    }
}
