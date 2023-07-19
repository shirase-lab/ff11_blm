<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;


class Coefficient extends Component
{
    public $coefficients = [1];
    public $mindiff = [0, 50, 100, 200, 300, 400, 500, 600, 700, 800, 900];
    public $maxdiff = [50,100, 200, 300, 400, 500, 600, 700, 800, 900, 1000];
    public function render()
    {
        return view('livewire.coefficient');
    }
    
    public function add()
    {
        Log::info("call add()");
        $this->coefficients[] = ['int_diff_min' => null,'int_diff_max' =>null,'coefficient'=>null];
    }

    public function delete($key)
    {
        Log::info("call delete({{$key}})");
        unset($this->coefficients[$key]);
    }
}
