<div>
	Hello {{ $contact->name }}: {{ now() }}

	<button wire:click="emitFoo">refresh</button>
</div>
