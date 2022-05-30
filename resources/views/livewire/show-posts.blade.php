<div>
    @foreach ($posts as $post)
        {{ $post }}
    @endforeach

    {{ $posts->links() }}
</div>
