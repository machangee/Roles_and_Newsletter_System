@extends('admin.topics.layouts')

@section('content')
<div class="flex justify-center items-center">
<form action="/admin/topics"method='POST'>
@csrf
<label for="title" class="text-2xl" >Title</label><br>
 <input type="text" name="title"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your title" ><br> 
{{-- <textarea --}}

{{-- id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" --}}
 {{-- placeholder="Enter the title"> --}}

{{-- </textarea>     --}}
<label for="description" class="text-2xl relative w-full min-w-[200px] " >Description</label><br>
<input type="text" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter your thoughts here...." ><br> 
 {{-- <textarea  --}}
      {{-- class="peer h-full min-h-[100px] w-full resize-none rounded-md border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-pink-500 focus:border-t-transparent focus:outline-0 disabled:resize-none disabled:border-0 disabled:bg-blue-gray-50" --}}
      {{-- placeholder="Write your thoughts here... " --}}
    {{-- ></textarea> --}}

<button type="submit" class="bg-teal-500  p-2 m-2 font-bold py-2 px-4 rounded-full">submit</button>

</form>
</div>
    
@endsection