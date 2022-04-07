@extends('layouts.main')

@section('content')
    <div style="margin: auto; display:block; color:black; text-decoration: none"
        href="/{{ $post->author->username }}/status/{{ $post->post_code }}">
        <div style="display: flex; align-items: center;justify-content: flex-start">
            <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
            <p style="font-weight: bold">
                {{ Request::is('menfess*') ? $post->author->disguise($post->author->name) : $post->author->name }}</p>
        </div>
        <p>{{ $post->content }}</p>
        <div>
            <small>
                <form action="/like" method="post">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button type="submit"
                        style="font-weight:  {{ $post->isLike(auth()->user()->id, $post->id) ? 'bold' : 'inherit' }}">Like
                        {{ count($likes->where('post_id', $post->id)) }}</button>
                </form>
            </small>
            <small>Comment {{ count($comments) }}</small>
        </div>
        <br>
        <div style="width: 100%; height: 1px; background-color: lightgray"></div>
        <br>
        <div>
            <form action="/comment" method="post">
                @csrf
                @method('POST')
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input style="display: block; width:100%; padding: 5px" type="text" name="content" placeholder="Comment"
                    value="{{ old('content') }}">
                <button type="submit">Comment</button>
            </form>
        </div>
        <br>
        <div style="width: 100%; height: 1px; background-color: lightgray"></div>
        <br>
        <div id="comment-section">
            @foreach ($comments as $comment)
                <div style="background-color: grey; margin-bottom: 5px; padding: 10px; border-bottom: 1px solid lightgray">
                    <div style="display: flex; align-items: center;justify-content: flex-start">
                        <div style="width:50px; height: 50px; background-color: aqua; margin-right: 10px"></div>
                        <p style="font-weight: bold">
                            {{ Request::is('menfess*') ? $comment->author->disguise($comment->author->name) : $comment->author->name }}
                        </p>
                    </div>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
