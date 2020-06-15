@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">
            <livewire:comments :initialComments="$comments" />
        </div>
    </div>
@endsection
