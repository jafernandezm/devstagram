<div>
    @if($posts->count())
    <div class="grid gap-6 md:grid-cols-2 lg:grid -cols-3 xl:grid-cols-4">
        @foreach ($posts as $post)
            <div class="">
                <a href="{{route('posts.show', ['post'=> $post, 'user' => $post->user ])}}">
                    <img src="{{ asset('uploads'). '/' .   $post->imagen}}" alt="Imagen Del post {{ $post->titulo}}">
                </a>
                
            </div>
        @endforeach
    </div>
    
    <div class="my-10">
        {{ $posts->links() }}
    </div>
    @else
    <div class="bg-white shadow-lg rounded-lg px-4 py-6 text-center">
        <h2 class="text-lg text-gray-600">No hay ningun post</h2>
    </div>
    @endif
</div>