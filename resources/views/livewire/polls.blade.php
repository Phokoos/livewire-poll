<div>
    @forelse($polls as $index => $poll)
        <div class="mb-4">
            <div class="flex justify-between">
                <h3 class="mb-4 text-xl">
                    {{$poll->title}}
                </h3>
                <button class="btn text-red-400" type="button" wire:click.prevent="deletePoll({{$poll->id}})">Delete</button>
            </div>

            @foreach($poll->options as $option)
                <div class="mb-2">
                    <button class="btn" type="button" wire:click.prevent="vote({{$option->id}})">Vote</button>
                    {{ $option->name }} ({{ $option->votes->count() }})
                </div>
            @endforeach
        </div>
    @empty
        <div class="text-gray-500">
            No polls available
        </div>
    @endforelse
</div>
