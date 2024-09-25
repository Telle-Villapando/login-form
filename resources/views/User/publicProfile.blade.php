<x-slot name="header">
   <h2 class="text-xl font-semibold leading-tight text-gray-800">
       {{ __('User Information') }}
   </h2>
</x-slot>

<div>
   @if ($errors->any())
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   @endif
</div>

<script src="https://cdn.tailwindcss.com"></script>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
</style>

<div class="bg-white w-full flex flex-col gap-5 px-3 md:px-16 lg:px-28 md:flex-row text-[#161931]">
    <aside class="hidden py-4 md:w-1/3 lg:w-1/4 md:block">
        <div class="sticky flex flex-col gap-2 p-4 text-sm border-r border-indigo-100 top-12">
            <h2 class="pl-3 mb-4 text-2xl font-semibold">Settings</h2>
            <a href="{{route('user.publicProfile',['user'=>$user])}}" class="flex items-center px-3 py-2.5 font-semibold hover:text-indigo-900 hover:border hover:rounded-full">Public Profile</a>
            <a href="{{route('user.profile',['user'=>$user])}}" class="flex items-center px-3 py-2.5 font-semibold hover:text-indigo-900 hover:border hover:rounded-full">Account Settings</a>
            <a href="#" class="flex items-center px-3 py-2.5 font-semibold hover:text-indigo-900 hover:border hover:rounded-full">Notifications</a>
            <a href="#" class="flex items-center px-3 py-2.5 font-semibold hover:text-indigo-900 hover:border hover:rounded-full">PRO Account</a>
        </div>
    </aside>
    <main class="w-full min-h-screen py-1 md:w-2/3 lg:w-3/4">
        <div class="p-2 md:p-4">
            <div class="w-full px-6 pb-8 mt-8 sm:max-w-xl sm:rounded-lg shadow-md bg-white">
                <div class="grid max-w-2xl mx-auto mt-8">
                    <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">
                        <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500"
                             src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('user.png') }}"
                             alt="User avatar">
                            
                        <h2 class="pl-6 text-3xl font-bold text-indigo-900">{{ auth()->user()->name . " " . auth()->user()->lastName }}</h2>
                    </div>
                    <div class="items-center mt-8 sm:mt-14 text-[#202142]">
                        <h2 class="text-xl font-bold text-indigo-900">{{ $user->name }} {{ $user->lastName }}</h2>
                        <p class="text-sm text-gray-600 mb-4">{{ $user->email }}</p>
                        
                        <div class="mb-6">
                            <label for="bio" class="block mb-2 text-sm font-medium text-indigo-900">Bio</label>
                            <p id="bio" class="block p-2.5 w-full text-sm text-indigo-900 bg-indigo-50 rounded-lg border border-indigo-300">
                                {{ $user->bio }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="script.js"></script>
    </main>
</div>

