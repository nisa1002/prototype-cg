@extends('layouts.main')
@section('content')
   <div class="rounded-2xl overflow-hidden">
      @include('partials.posting')
   </div>
   <div class="">
      @foreach ($posts as $post)
         @include('partials.fragment-post', ['post' => $post])
      @endforeach
   </div>
@endsection

@section('notifications')
   @include('notifications')
@endsection


@section('sidebar-row-1')
   @includeWhen(!Route::is('menfess'), 'partials.profile', ['author' => auth()->user()])
@endsection

@section('sidebar-row-2')
   @include('partials.updates')
@endsection
