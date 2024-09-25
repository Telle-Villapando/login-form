<x-slot name="header">
   <h2 class="text-xl font-semibold leading-tight text-gray-800">
       {{ __('User Information') }}
   </h2>
</x-slot>
<div>
   @if ($errors->any())
   <ul>
       @foreach ($errors->all() as $error )
       <li>{{$error}}</li>

       @endforeach
   </ul>

   @endif
</div>
 <script src="https://cdn.tailwindcss.com"></script>
<div class="py-12">
   <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
       <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
           <div class="p-6 text-gray-900">
            
               <form action="{{route('admin.userUpdate', ['user' => $user])}}" method="POST">
                   @csrf
                   @method('put')
                   <label for="" class="text-lg font-semibold leading-tight text-gray-800">Id: </label>
                   <input type="text" name="id" value="{{$user->id}}"
                       class="block w-full p-2 mt-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                   <br>

                   <label for="" class="text-lg font-semibold leading-tight text-gray-800">Name: </label>
                   <input type="text" name="name" value="{{$user->name}}"
                       class="block w-full p-2 mt-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                   <br>
                   <label for="" class="text-lg font-semibold leading-tight text-gray-800">Last Name: </label>
                   <input type="text" name="lastName" value="{{$user->lastName}}"
                       class="block w-full p-2 mt-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                   <br>
                   <label for="" class="text-lg font-semibold leading-tight text-gray-800">Email</label>
                   <input type="email" value="{{$user->email}}" name="email"
                       class="block w-full p-2 mt-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                   <br>
                   <label for="" class="text-lg font-semibold leading-tight text-gray-800">Role</label>
                   <input type="text" name="role" value="{{$user->role}}"
                       class="block w-full p-2 mt-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                   <br>
                  
                   <label for="" class="text-lg font-semibold leading-tight text-gray-800">Password</label>
                   <input type="text" name="password" value="{{$user->password}}"
                       class="block w-full p-2 mt-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                   <br>

                   <input type="submit"
                       class="block w-1/2 p-2 mt-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                       value="Save ">

               </form>
           </div>
       </div>
   </div>
</div>

<div>

</div>
