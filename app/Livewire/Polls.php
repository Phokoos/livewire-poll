<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Attributes\On;
use Livewire\Component;

class Polls extends Component
{
    #[On('pollCreated')]
//    protected $listeners = [
//      'pollCreated' => 'render'
//    ];

    public function render()
    {
        $polls = Poll::with('options.votes')
            ->latest()->get();

        return view('livewire.polls', ['polls' => $polls]);
    }

    public function vote(Option $option)
    {
        $option->votes()->create();
    }

    public function deletePoll(Poll $poll)
    {
        $poll->delete();
    }
}
