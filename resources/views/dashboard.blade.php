@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('ideas.shared.submit')
        <hr>
        @foreach ($ideas as $idea )
        <div class="mt-3">
            @include('ideas.shared.idea-card')
        </div>
        @endforeach
        <div class="mt-3">

            {{ $ideas->links() }}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>
@endsection
