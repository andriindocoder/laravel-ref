<div>
    <h1 style="font-size: 28px;">Support Tickets</h1>
    	@foreach($tickets as $ticket)
        <div class="cursor-pointer rounded border shadow p-3 my-2 {{ $active == $ticket->id ? 'bg-green-200' : '' }}" wire:click="$emit('ticketSelected', {{$ticket->id}})">
            <p class="text-gray-800">{{ $ticket->question }}</p>
        </div>
        @endforeach
</div>
