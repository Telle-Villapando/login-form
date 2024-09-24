<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-gray-200 to-indigo-200 font-poppins">
    <!-- Register -->
    <div class="container mx-auto my-10 max-w-md p-6 bg-white shadow-lg rounded-lg" id="signUp">
        <h1 class="text-2xl font-bold text-center mb-6">Register</h1>
        <form action="{{route('registered.user')}}" method="POST" class="space-y-4">
            @csrf 
            @method('post')

            <div class="relative flex items-center">
                <i class="fas fa-user absolute left-3 text-gray-400"></i>
                <input class="pl-10 w-full py-2 border-b border-gray-400 focus:outline-none focus:border-indigo-600"
                    type="text" name="name" id="name" placeholder="First Name" required />
                <label for="name"
                    class="text-gray-500 text-sm absolute top-0 left-10 transform -translate-y-3 transition-all duration-300 ease-in-out">First
                    Name</label>
            </div>
            <div class="relative flex items-center">
                <i class="fas fa-user absolute left-3 text-gray-400"></i>
                <input class="pl-10 w-full py-2 border-b border-gray-400 focus:outline-none focus:border-indigo-600"
                    type="text" name="lastName" id="lastName" placeholder="Last Name" required />
                <label for="lastName"
                    class="text-gray-500 text-sm absolute top-0 left-10 transform -translate-y-3 transition-all duration-300 ease-in-out">Last
                    Name</label>
            </div>
            <div class="relative flex items-center">
                <i class="fas fa-envelope absolute left-3 text-gray-400"></i>
                <input class="pl-10 w-full py-2 border-b border-gray-400 focus:outline-none focus:border-indigo-600"
                    type="email" name="email" id="email" placeholder="Email" required />
                <label for="email"
                    class="text-gray-500 text-sm absolute top-0 left-10 transform -translate-y-3 transition-all duration-300 ease-in-out">Email</label>
            </div>
            <div class="relative flex items-center">
                <i class="fas fa-lock absolute left-3 text-gray-400"></i>
                <input class="pl-10 w-full py-2 border-b border-gray-400 focus:outline-none focus:border-indigo-600"
                    type="password" name="password" id="password" placeholder="Password" required />
                <label for="password"
                    class="text-gray-500 text-sm absolute top-0 left-10 transform -translate-y-3 transition-all duration-300 ease-in-out">Password</label>
            </div>
            <input
                class="w-full py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition duration-200 cursor-pointer"
                type="submit" value="Sign Up" name="signUp" />
        </form>
        <p class="text-center my-4 text-gray-500">---------- or ----------</p>
        <div class="flex justify-center space-x-4">
            <i class="fab fa-google text-2xl text-red-500 cursor-pointer"></i>
            <i class="fab fa-facebook text-2xl text-blue-600 cursor-pointer"></i>
        </div>
        <div class="text-center mt-6">
            <p>Already have an account?</p>
            <button id="signInButton" class="text-indigo-500 hover:underline"><a href="{{route('user.signIn')}}">Sign In</a></button>
        </div>
    </div>

    <!-- Sign in -->


</body>

</html>
