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
            <div class="w-full px-6 pb-8 mt-8 sm:max-w-xl sm:rounded-lg">
                <h2 class="pl-6 text-2xl font-bold sm:text-xl">Account Settings</h2>
                <div class="grid max-w-2xl mx-auto mt-8">
                    <div class="flex flex-col items-center space-y-5 sm:flex-row sm:space-y-0">
               

                             <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500"
                             src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('user.png')}}"
                             alt="User avatar">
                            
                        <div class="flex flex-col space-y-5 sm:ml-8">
                     

                              <!-- Button to change the picture -->
                              <button type="button"
                              class="py-3.5 px-7 text-base font-medium text-indigo-100 focus:outline-none bg-[#202142] rounded-lg border border-indigo-200 hover:bg-indigo-900 focus:z-10 focus:ring-4 focus:ring-indigo-200"
                              id="change-picture-btn">Change picture</button>

                              <!-- Hidden input for file upload -->
                              <form action="{{ route('user.updateAvatar') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <input type="file" id="avatar-input" name="avatar" accept="image/*" class="hidden">
                              <!-- Submit the form automatically when a file is selected -->
                              </form>

                              <!-- Display the selected file name (optional) -->
                              <p id="file-name" class="mt-2 text-sm text-gray-500"></p>


                            <button type="button"
                                    class="py-3.5 px-7 text-base font-medium text-indigo-900 focus:outline-none bg-white rounded-lg border border-indigo-200 hover:bg-indigo-100 hover:text-[#202142] focus:z-10 focus:ring-4 focus:ring-indigo-200">Delete picture</button>
                        </div>
                    </div>
                    <div class="items-center mt-8 sm:mt-14 text-[#202142]">
                        <form action="{{ route('user.profileUpdate', ['user' => $user]) }}" method="POST">
                            @csrf
                            @method('put')
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <input type="hidden" name="role" value="{{ $user->role }}">

                            <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                <div class="w-full">
                                    <label for="first_name" class="block mb-2 text-sm font-medium text-indigo-900">First name</label>
                                    <input type="text" name="name" id="first_name"
                                           class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                           placeholder="Your first name" value="{{ $user->name }}" required>
                                </div>

                                <div class="w-full">
                                    <label for="last_name" class="block mb-2 text-sm font-medium text-indigo-900">Last name</label>
                                    <input type="text" name="lastName" id="last_name"
                                           class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                           placeholder="Your last name" value="{{ $user->lastName }}" required>
                                </div>
                            </div>

                            <div class="mb-2 sm:mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-indigo-900">Email</label>
                                <input type="email" name="email" id="email"
                                       class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                       value="{{ $user->email }}" required>
                            </div>
                            <div class="mb-2 sm:mb-6">
                                <label for="profession" class="block mb-2 text-sm font-medium text-indigo-900">Profession</label>
                                <input type="text" name="profession" id="profession"
                                       class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                       value="Student" required>
                            </div>
                            <div class="mb-2 sm:mb-6">
                                <label for="gender" class="block mb-2 text-sm font-medium text-indigo-900">Gender</label>
                                <input type="text" name="gender" id="gender"
                                       class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                       value="Female" required>
                            </div>

                            <div class="mb-2 sm:mb-6">
                                <label for="password" class="block mb-2 text-sm font-medium text-indigo-900">Password</label>
                                <input type="password" name="password" id="password"
                                       class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                       value="{{$user->password}}" required>
                            </div>

                            <div class="mb-6">
                                <label for="message" class="block mb-2 text-sm font-medium text-indigo-900">Bio</label>
                                <textarea id="message" rows="4"
                                          class="block p-2.5 w-full text-sm text-indigo-900 bg-indigo-50 rounded-lg border border-indigo-300 focus:ring-indigo-500 focus:border-indigo-500"
                                          placeholder="Write your bio here..."></textarea>
                            </div>
                            <div class="flex justify-between space-x-4">
                           

                              <a href="{{route('user.cancelProfileUpdate')}}"
                                class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                Cancel
                                </a>
                          
                              <button type="submit"
                                  class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                                  Save
                              </button>
                              
                            
                          </div>
                          
                        </form>
                    </div>

                  <form action="" method="POST">
                    @csrf
                    <div class="block p-4 w-full text-sm text-indigo-900 bg-indigo-50 rounded-lg border border-indigo-300 focus:ring-indigo-500 focus:border-indigo-500">
                        <h2 class="text-lg font-semibold mb-4">Delete Your Account</h2>
                        <p class="text-sm mb-4">Deleting your account is permanent and cannot be undone. All your data will be lost. Please proceed with caution.</p>
                        <label for="first_name" class="block mb-2 text-sm font-medium text-indigo-900">To confirm this, type "DELETE"</label>
                        <input type="text" name="name" id="first_name"
                               class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                               placeholder="DELETE" value="" required>

                               <input type="submit"  class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-4" value="Delete Account">
                        
                    </div>
                    
                  </form>
                </div>
            </div>
        </div>
        <script src="script.js"></script>
    </main>
</div>




