<div>
    {{-- <input wire:model.debounce.1000ms="name" type="text"> Hello {{ strtoupper($name) }} --}}
    {{-- <input wire:model.lazy="name" type="text"> Hello {{ strtoupper($name) }} --}}
    <input wire:model="name" type="text"> 

    <input wire:model="loud" type="checkbox">

    {{-- <select wire:model="greeting">
    	<option>Hello</option>
    	<option>Goodbye</option>
    	<option>Adios</option>
    </select> --}}

    <select wire:model="greeting" multiple>
    	<option>Hello</option>
    	<option>Goodbye</option>
    	<option>Adios</option>
    </select>

    {{-- {{ $greeting }} {{ $name }} @if($loud) ! @endif --}}
    {{ implode(', ', $greeting) }} {{ $name }} @if($loud) ! @endif
</div>
