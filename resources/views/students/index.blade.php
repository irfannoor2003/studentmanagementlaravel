<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Records</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-gray-100">

    <div class="w-full flex justify-center items-center min-h-screen px-4 py-8">
        <div class="w-full max-w-6xl bg-amber-600 rounded-xl shadow-md shadow-amber-300 px-6 py-6 flex flex-col gap-4">

            <!-- 🔍 Search + Title -->
            <div class="flex flex-col sm:flex-row justify-between items-center mb-4 gap-3">
                <h2 class="text-3xl text-amber-900 font-extrabold tracking-wide">All Students</h2>

                <form action="{{ route('students.index') }}" method="GET" class="flex space-x-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search students..."
                        class="px-4 py-2 rounded-lg bg-amber-700 text-gray-100 placeholder-gray-200 border border-amber-300 focus:border-amber-100 focus:ring-2 focus:ring-amber-300 outline-none transition">
                    <button type="submit"
                        class="bg-amber-900 hover:bg-amber-800 text-white font-semibold px-4 py-2 rounded-lg transition">
                        Search
                    </button>
                </form>
            </div>

            <!-- 📋 Table -->
            <div class="overflow-x-auto">
                <table class="border border-amber-100 w-full text-center border-collapse">
                    <thead>
                        <tr class="bg-amber-800 text-gray-100">
                            <th class="border border-amber-400 px-4 py-2">ID</th>
                            <th class="border border-amber-400 px-4 py-2">Name</th>
                            <th class="border border-amber-400 px-4 py-2">Email</th>
                            <th class="border border-amber-400 px-4 py-2">Age</th>
                            <th class="border border-amber-400 px-4 py-2">Class</th>
                            <th class="border border-amber-400 px-4 py-2">Status</th>
                            <th class="border border-amber-400 px-4 py-2">Update</th>
                            <th class="border border-amber-400 px-4 py-2">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $item)
                            <tr class="hover:bg-amber-700 transition-colors duration-200">
                                <td class="border border-amber-400 px-4 py-2">{{ $item->id }}</td>
                                <td class="border border-amber-400 px-4 py-2">{{ $item->name }}</td>
                                <td class="border border-amber-400 px-4 py-2">{{ $item->email }}</td>
                                <td class="border border-amber-400 px-4 py-2">{{ $item->age }}</td>
                                <td class="border border-amber-400 px-4 py-2">{{ $item->classroom->name }}</td>
                                <td class="border border-amber-400 px-4 py-2">{{ $item->profile }}</td>
                                <td class="border border-amber-400 px-4 py-2">
                                    <a href="{{ route('students.edit', $item->id) }}"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-sm transition">
                                        Edit
                                    </a>
                                </td>
                                <td class="border border-amber-400 px-4 py-2">
                                    <form action="{{ route('students.destroy', $item->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete"
                                            class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 cursor-pointer transition text-sm">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-4 text-gray-900 font-semibold">No students found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- 📄 Pagination -->
            <div class="mt-4 flex justify-center">
                <div class="bg-amber-700 px-4 py-2 rounded-lg text-gray-100">
                    {{ $students->onEachSide(1)->links() }}
                </div>
            </div>

            <!-- ➕ Create Button -->
            <div class="flex justify-center mt-2">
                <a href="{{ route('students.create') }}"
                    class="bg-amber-900 hover:bg-amber-700 cursor-pointer px-6 py-2 rounded-md font-bold text-white transition">
                    + Create New Record
                </a>
            </div>

        </div>
    </div>

</body>

</html>
