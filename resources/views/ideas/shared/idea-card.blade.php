<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{ $idea->user->getImage() }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0 "><a class="text-primary-emphasis" href="{{ route('users.show' , $idea->user->id ) }}"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a class="mx-2 text-primary-emphasis" href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                    <a class="text-primary-emphasis" href="{{ route('ideas.show', $idea->id) }}">View</a>
                    <button class="ms-1 btn btn-danger btn-sm"> X</button>
                </form>

            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
        <form action="{{ route('ideas.update', $idea->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                @error('content')
                    <span class="fs-6 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button class="btn btn-dark btn-sm" type="submit"> Update </button>
            </div>
        </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>
