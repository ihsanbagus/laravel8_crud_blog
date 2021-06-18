<h3>{{ $post->title }}</h3>
<h4>{{ $post->content }}</h4>
COMMENTS
<hr>
<ul>
    @foreach ($post->comments as $c)
        <li>{{ $c->comment }}</li>
    @endforeach
</ul>
