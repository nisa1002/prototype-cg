@extends('layouts.auth')
@section('content')
  <div class="container w-full h-full md:h-auto bg-primary sm:max-w-sm rounded-2xl md:bg-secondary box-border relative">
    @if (session('success') && !Request::is('register'))
      <div class="bg-pink-500 rounded-xl py-2 px-1 absolute my-2 left-1/2 -translate-x-1/2 border-2 border-primary-white">
        <p class="
        text-center">{{ session('success') }}</p>
      </div>
    @endif
    @if (session('failed') && !Request::is('register'))
      <div class="bg-pink-500 rounded-xl py-2 px-1 absolute my-2 left-1/2 -translate-x-1/2 border-2 border-primary-white">
        <p class="
        text-center">{{ session('failed') }}</p>
      </div>
    @endif
    <form action="/{{ Request::is('register') ? 'register' : 'login' }}" class="p-5 h-full" method="POST">
      @csrf
      @method('POST')
      <h3 class="mt-8 mb-5 md:my-3 text-left text-2xl font-semibold flex items-center text-purpink md:text-xl">
        {{ Request::is('register') ? 'Sign up' : 'Sign in' }}</h3>
      @if (Request::is('register'))
        <label for="email" class="flex flex-col mb-2">
          <span class="text-left md:text-sm md:mb-1">Email</span>
          <input type="email" name="email" autocomplete="off"
            class="p-2 rounded-xl focus:outline-none focus:ring-purpink focus:ring-2 invalid:text-pink-500 text-secondary ring-slate-800 @error('email') ring-pink-500 @enderror md:ring-primary ring-2 md:placeholder:text-sm md:p-1"
            placeholder="enter email" value="{{ old('email') }}" id="email">
          @error('email')
            <p class="text-pink-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </label>
        <label for="name" class="flex flex-col mb-2">
          <span class="text-left md:text-sm md:mb-1">Name</span>
          <input type="text" name="name" autocomplete="off"
            class="p-2 rounded-xl focus:outline-none focus:ring-purpink focus:ring-2 invalid:text-pink-500 text-secondary ring-slate-800 @error('name') ring-pink-500 @enderror md:ring-primary ring-2 md:placeholder:text-sm md:p-1"
            placeholder="enter name" value="{{ old('name') }}" id="name">
          @error('name')
            <p class="text-pink-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </label>
      @endif
      <label for="username" class="flex flex-col mb-2">
        <span class="text-left md:text-sm md:mb-1">Username</span>
        <input type="text" name="username" autocomplete="off"
          class="p-2 rounded-xl focus:outline-none focus:ring-purpink focus:ring-2 invalid:text-pink-500 text-secondary ring-slate-800 @error('username') ring-pink-500 @enderror md:ring-primary ring-2 md:placeholder:text-sm md:p-1"
          placeholder="enter username" value="{{ old('username') }}" id="username">
        @error('username')
          <p class="text-pink-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </label>
      <label for="password" class="flex flex-col mb-2">
        <span class="text-left md:text-sm md:mb-1">Password</span>
        <input
          class="p-2 rounded-xl focus:outline-none focus:ring-purpink focus:ring-2 invalid:text-pink-500 text-secondary ring-slate-800 @error('password') ring-pink-500 @enderror md:ring-primary ring-2 md:placeholder:text-sm md:p-1"
          type="password" name="password" id="password" placeholder="password" value="{{ old('password') }}">
        @error('password')
          <p class="text-pink-500 text-xs mt-2">{{ $message }}</p>
        @enderror
      </label>
      @if (Request::is('register'))
        <label for="retype_password" class="flex flex-col mb-2">
          <span class="text-left md:text-sm md:mb-1">Re-type Password</span>
          <input
            class="p-2 rounded-xl focus:outline-none focus:ring-purpink focus:ring-2 invalid:text-pink-500 text-secondary ring-slate-800 @error('retype_password') ring-pink-500 @enderror md:ring-primary ring-2 md:placeholder:text-sm md:p-1"
            type="password" name="retype_password" id="retype_password" placeholder="retype password"
            value="{{ old('retype_password') }}">
          @error('retype_password')
            <p class="text-pink-500 text-xs mt-2">{{ $message }}</p>
          @enderror
        </label>
      @endif
      <div class="text-right my-4">
        <button type="submit"
          class="py-2 px-4 bg-purpink rounded-2xl my-4 hover:brightness-75 hover:scale-95 transition-all group">
          <span
            class="group-hover:text-pink-900 transition-all">{{ Request::is('register') ? 'Register' : 'Login' }}</span>
        </button>
        @if (!Request::is('register'))
          <small class="block">Not registered? <a href="/register"
              class="block text-purpink hover:scale-105 transition-all">Register
              now</a></small>
        @else
          <small class="block">Alredy registered? <a href="/"
              class="block text-purpink hover:scale-105 transition-all">Login</a></small>
        @endif
      </div>
    </form>
  </div>
@endsection
