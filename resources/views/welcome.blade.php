<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Todo App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto">

        <header class="text-center mb-12">
            <h1 class="text-7xl font-bold text-black mb-2">Todo List</h1>

        </header>


        <form action="/add" method="POST">
            @csrf
            <div class="bg-white border rounded-lg border-gray-300 p-6">

                <div class="flex flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="title" id="title" placeholder="Task title"
                            class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:border-black focus:outline-none">
                    </div>
                    <div class="flex-1">
                        <input type="text" name="desc" id="description" placeholder="Task description"
                            class="w-full px-4 py-2 border rounded-lg border-gray-300 focus:border-black focus:outline-none">
                    </div>
                </div>
            </div>

            <div class="mt-4 mb-8">
                <button type="submit"
                    class="bg-black rounded-lg hover:bg-gray-800 text-white font-medium py-3 px-8 w-full md:w-auto flex items-center justify-center gap-2">

                    Add Task
                </button>
            </div>




        </form>

        @if (session()->has('success'))
            <script>
                alert(@json(session('success')));
            </script>
        @endif


        <div class="space-y-4">


            @if ($data->isEmpty())

                <h1>No todos</h1>
            @else
                @foreach ($data as $todo)
                    <div class="flex gap-4">
                        <div class="bg-white border rounded-lg w-full border-gray-300 p-5">
                            <div class="flex flex-column items-center gap-6">

                                <div class="">
                                    <p class=" text-gray-400 ">Title</p>

                                    <div class="">
                                        <h3 class="text-xl font-medium text-black">{{ $todo->title }}</h3>
                                    </div>
                                </div>


                                <div class="">
                                    <p class=" text-gray-400 ">Description</p>
                                    <div class="">
                                        <p class="text-gray-600">{{ $todo->desc }}
                                        </p>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <div class="flex gap-2">
                            <a href="/edit/{{ $todo->id }}"
                                class="bg-gray-800 rounded-lg hover:bg-black text-white py-2 px-4 flex items-center gap-2 cursor-pointer">

                                Update
                            </a>
                            <a href="/delete/{{ $todo->id }}"
                                class="bg-red-500 rounded-lg hover:bg-red-600 text-white py-2 px-4 flex items-center gap-2 cursor-pointer">

                                Delete
                            </a>
                        </div>
                    </div>
                @endforeach


            @endif






        </div>
    </div>
</body>

</html>
