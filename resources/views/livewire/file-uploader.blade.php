<div>
	@error('photo') <span class="error">{{ $message }}</span> @enderror
	
	@if($photo)
		<img src="{{ $photo->temporaryUrl() }}" width="250">
	@endif

	<div wire:loading wire:target="photo">Uploading...</div>
	<div wire:loading wire:target="save">Storing to S3...</div>

    <input type="file" wire:model=photo />
    <button wire:click.prevent="save">Save</button>
</div>
