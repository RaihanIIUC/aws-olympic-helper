<?php

namespace App\Http\Livewire;

use App\Http\Controllers\QueryController;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostForm extends Component
{

    public $start;
    public $end;
 
   
    public function storePost()
    {
        // QueryController::queryByDate2($this->start, $this->end);
        // delay  
        sleep(3);
        return redirect()->to('/');

     }

    public function render()
    {
        return view('livewire.post-form', ['posts' =>   []]);
    }
 
}