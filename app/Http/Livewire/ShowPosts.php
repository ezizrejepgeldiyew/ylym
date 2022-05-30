<?php

namespace App\Http\Livewire;

use App\Models\TalypLogin;
use Illuminate\View\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    public function render()
    {
        $posts=TalypLogin::paginate(1);
        return view('User.usertest',compact('posts'));
    }
}
