<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Record</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-900 text-gray-100">
    <div class="w-full flex justify-center  items-center h-screen">
        <div
            class="w-1/3 bg-amber-500 h-auto rounded-xl shadow-md shadow-amber-300 px-4 py-3 flex items-center justify-center
        flex-col gap-2">
            <form action="{{ route('students.store') }}" class="w-full" method="POST">
                @csrf
                <div class="flex w-full flex-col">
                    <label for="name" class="block text-gray-300 font-bold text-md">Name </label>
                    <input type="text" name="name" id="name" placeholder="Enter Name "
                        class="w-full outline-0 border border-amber-900 py-1 px-4 rounded-md mt-1 text-gray-100 ml-1"
                        required>
                </div>
                <div class="flex w-full flex-col">
                    <label for="email" class="block text-gray-300 font-bold text-md">Email </label>
                    <input type="email" name="email" id="email" placeholder="Enter Email "
                        class="w-full outline-0 border border-amber-900 py-1 px-4 rounded-md mt-1 text-gray-100 ml-1"
                        required>
                </div>
                <div class="flex w-full flex-col">
                    <label for="age" class="block text-gray-300 font-bold text-md">Age </label>
                    <input type="number" name="age" id="age" placeholder="Your Age "
                        class="w-full outline-0 border border-amber-900 py-1 px-4 rounded-md mt-1 text-gray-100 ml-1"
                        required>
                </div>
                <div class="flex w-full flex-col ">
                    <label for="class" class="block text-gray-300 font-bold text-md">
                        Class
                    </label>
                    <select name="class" id="class"
                        class="bg-amber-600 border border-amber-900 text-gray-100 text-sm rounded-lg   px-3 py-2 outline-none ml-2">
                        <option value="" disabled selected class="text-gray-400">
                            Select a Class
                        </option>
                        @foreach ($classnames as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>
                 <div class="flex w-full flex-col ">
                        <label for="profile" class="block text-gray-300 font-bold text-md">Profile</label>
                        <select name="profile" id="profile" class="bg-amber-600 border  border-amber-900 rounded-lg text-gray-100 text-sm py-2 px-3 outline-none ml-2 ">
                            <option value="" disabled selected clas="text-gray-400">Select Profile </option>
                            <option value="Verified">Verified</option>
                            <option value="Unverified">Unverified</option>
                        </select>
                </div>


                <div class="w-full flex items-center justify-center mt-2">
                    <input type="submit" value="Submit" class="bg-amber-900 px-6 py-1 rounded-md ">
                </div>
            </form>
        </div>
    </div>

</body>

</html>
