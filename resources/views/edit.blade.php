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
            <h1 class="text-5xl font-bold text-black mb-2">Update</h1>

        </header>


        <form action="/update/{{ $data->id }}" method="POST">

            @csrf
            @method('PUT')


            <div class="bg-white border rounded-lg border-gray-300 p-6">
                <h2 class="text-lg font-semibold text-black mb-4">Update Task</h2>
                <div class="flex flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="title" value="{{ $data->title }}" id="title"
                            placeholder="Task title"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-black focus:outline-none">
                    </div>
                    <div class="flex-1">
                        <input type="text" name="desc" value="{{ $data->desc }}" id="description"
                            placeholder="Task description"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-black focus:outline-none">
                    </div>
                </div>
            </div>

            <div class="mt-4 mb-8">
                <button type="submit"
                    class="bg-black hover:bg-gray-800 text-white font-medium py-3 px-8 w-full md:w-auto rounded-lg flex items-center justify-center gap-2 cursor-pointer">
                    Update Task
                </button>
            </div>


        </form>




    </div>
</body>

</html>
