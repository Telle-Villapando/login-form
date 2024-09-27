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

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        </div>
    @endif

    {{-- Display session error message --}}
    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Display session success message --}}
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Sign in -->
    <div class="container mx-auto my-10 max-w-md p-6 bg-white shadow-lg rounded-lg" id="signIn">
        <h1 class="text-2xl font-bold text-center mb-6">Forgot your password?</h1>
        <p class="text-center my-4 text-gray-500">Type your email and click the email password reset button and check your email</p>
        <form action="{{ route('user.forgetPasswordPost') }}" method="post" class="space-y-4">
            @csrf 
            <div class="relative flex items-center">
                <i class="fas fa-envelope absolute left-3 text-gray-400"></i>
                <input class="pl-10 w-full py-2 border-b border-gray-400 focus:outline-none focus:border-indigo-600" type="email" name="email" id="email" placeholder="Email" required />
            </div>
      
            <input class="w-full py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition duration-200 cursor-pointer" type="submit" value="Email Password Reset Link" name="forgotPassword" />
        </form> 
        <p class="text-right mt-4">
            <a href="{{ route('user.signIn') }}" class="text-indigo-500 hover:underline">Return to Log in</a>
        </p>
    </div>
</body>
</html>
