<div>
    @auth
        @if (Auth::user()->likeIdeas($idea))
        <form action="{{ route('ideas.unlike' , $idea->id) }}" method="post">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6">
                <span class="fas fa-heart me-1"></span>
                {{ $idea->likes()->count() }}
            </button>
        </form>
        @else
            <form action="{{ route('ideas.like' , $idea->id) }}" method="post">
                @csrf
                <button type="submit" class="fw-light nav-link fs-6">
                    <span class="far fa-heart me-1"></span>
                    {{ $idea->likes()->count() }}
                </button>
            </form>
        @endif
    @endauth
    @guest
    <a href="{{ route('login') }}" class="fw-light nav-link fs-6">
        <span class="far fa-heart me-1"></span>
        {{ $idea->likes()->count() }}
    </a>
    @endguest

</div>
