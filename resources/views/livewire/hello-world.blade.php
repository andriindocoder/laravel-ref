<div>

    <input wire:model="name" type="text"> 

    <input wire:model="loud" type="checkbox">

    <select wire:model="greeting" multiple>
    	<option>Hello</option>
    	<option>Goodbye</option>
    	<option>Adios</option>
    </select>

    {{ implode(', ', $greeting) }} {{ $name }} @if($loud) ! @endif

    {{-- <button wire:click="resetName">Reset Name</button> --}}
    {{-- <button wire:click="resetName($event.target.innerText)">Reset Name</button> --}}

    {{-- <form action="#" wire:submit.prevent="resetName('Bingo')">
    	<button>Reset Name</button>
    </form> --}}

    <form action="#" wire:submit.prevent="$set('name', 'Bingo')">
    	<button>Reset Name</button>
    </form>
</div>
