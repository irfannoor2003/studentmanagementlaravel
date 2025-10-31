<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Student</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="w-full flex justify-center items-center h-screen">
        <div class="w-1/3 bg-amber-600 h-auto rounded-xl shadow-md shadow-amber-300 px-4 py-6 flex flex-col items-center gap-3">

            <h2 class="text-2xl font-semibold text-center text-amber-950 mb-2">Update Student</h2>

            <form action="{{ route('students.update', $varname->id) }}" method="POST" class="w-full">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="flex w-full flex-col mb-2">
                    <label for="name" class="block text-gray-100 font-bold text-md">Name</label>
                    <input type="text" name="name" id="name" value="{{ $varname->name }}"
                        placeholder="Enter Name"
                        class="w-full outline-0 border border-amber-900 py-2 px-4 rounded-md mt-1 text-gray-900 focus:ring focus:ring-amber-900"
                        required>
                </div>

                <!-- Email -->
                <div class="flex w-full flex-col mb-2">
                    <label for="email" class="block text-gray-100 font-bold text-md">Email</label>
                    <input type="email" name="email" id="email" value="{{ $varname->email }}"
                        placeholder="Enter Email"
                        class="w-full outline-0 border border-amber-900 py-2 px-4 rounded-md mt-1 text-gray-900 focus:ring focus:ring-amber-900"
                        required>
                </div>

                <!-- Age -->
                <div class="flex w-full flex-col mb-2">
                    <label for="age" class="block text-gray-100 font-bold text-md">Age</label>
                    <input type="number" name="age" id="age" value="{{ $varname->age }}"
                        placeholder="Your Age"
                        class="w-full outline-0 border border-amber-900 py-2 px-4 rounded-md mt-1 text-gray-900 focus:ring focus:ring-amber-900"
                        required>
                </div>

                <!-- Class -->
                <div class="flex w-full flex-col mb-2">
                    <label for="class" class="block text-gray-100 font-bold text-md">Class</label>
                    <select name="class" id="class"
                        class="bg-amber-700 border border-amber-900 text-gray-100 text-sm rounded-lg px-3 py-2 outline-none focus:ring focus:ring-amber-900">
                        <option value="" disabled>Select a Class</option>
                        @foreach ($varname11 as $class)
                            <option value="{{ $class->id }}" 
                                {{ $class->id == $varname->classroom_id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Profile -->
                <div class="flex w-full flex-col mb-4">
                    <label for="profile" class="block text-gray-100 font-bold text-md">Profile</label>
                    <select name="profile" id="profile"
                        class="bg-amber-700 border border-amber-900 rounded-lg text-gray-100 text-sm py-2 px-3 outline-none focus:ring focus:ring-amber-900">
                        <option value="" disabled>Select Profile</option>
                        <option value="Verified" {{ $varname->profile == 'Verified' ? 'selected' : '' }}>Verified</option>
                        <option value="Unverified" {{ $varname->profile == 'Unverified' ? 'selected' : '' }}>Unverified</option>
                    </select>
                </div>

                <!-- Submit -->
                <div class="w-full flex items-center justify-center mt-3">
                    <input type="submit" value="Update"
                        class="bg-amber-900 hover:bg-amber-950 transition-colors text-white font-semibold px-6 py-2 rounded-md cursor-pointer shadow-md">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
