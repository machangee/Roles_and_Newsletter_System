@extends('admin.topics.layouts')
@section('content')
<div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>

    @endif

   
        <div class="absolute top-0 left-0  m-4 p-4  rounded-xl border-transparent ">
            <button class="bg-green-600 text-white p-2 text-center rounded-xl ">
                
                <a href='{{ route('admin.topics.create') }}'>create a
                    new topic</a>
                
            </button>
        </div>
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="mt-16">
                <div class="grid grid-cols-1  gap-6 lg:gap-8">

                    <form action="{{route('admin.subscribe')}}" method="POST">
                        @csrf

                        @foreach ($topics as $topic)
                            <div>
                                <div>
                                    <div class="flex">
                                        @auth
                                            <a class="bg-slate-400 text-white rounded-sm p-2 m-2"
                                                href="{{ route('admin.topics.edit', $topic->id) }}">Edit</a>
                                            {{-- <form action="{{ route('topics.destroy', $topic->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-700 text-white p-2 rounded-sm">Delete</button>
                                            </form> --}}
                                        @endauth
                                    </div>

                                    <div>

                                        <input type="checkbox" name="topics_ids[]" value="{{ $topic->id }}"
                                            id="topic_{{ $topic->id }}">
                                        <label for="topic_{{ $topic->id }}">{{ $topic->title }}</label>
                                        <br>

                                    </div>

                                    <a href="{{ route('admin.topics.show', $topic->id) }}"
                                        class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                        <div>
                                            <div
                                                class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0-2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                                                </svg>


                                            </div>

                                            <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                                                {{ $topic->title }}
                                            </h2>

                                            <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                                {{ $topic->description }}
                                            </p>
                                        </div>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" class="self-center shrink-0 stroke-red-500 w-6 h-6 mx-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        @endforeach
                        <div>
                            <input type="email" name="email" placeholder="enter email" class="border-blue-200 border-2">
                            <button type="submit" class="bg-green-500 text-white">subscribe</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        @endsection