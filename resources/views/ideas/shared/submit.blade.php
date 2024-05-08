@auth()
    <h4> Share yours ideas </h4>
    <div class="row">
        <form action="{{ route('ideas.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <textarea name="content" class="form-control border-secondary" id="content" rows="3"></textarea>
                @error('content')
                    <span class="fs-6 text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <button class="btn btn-dark" type="submit"> Share </button>
            </div>
        </form>
    </div>
@endauth
@guest()
    <h4>Login Share yours ideas</h4>
@endguest
