<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">
    <div class="text-2xl font-semibold text-center mb-6 mt-20">Herramientas NOC</div>
    <div class="p-8 bg-white shadow-md rounded-lg">

        <div class="flex gap-5">
            <div class="flex-1 px-4">
                <button class="w-full py-1 px-3 bg-blue-500 text-white rounded hover:bg-blue-600 mb-2">Scraping - Porcentajes grupos electrógenos %</button>
                <button class="w-full py-1 px-3 bg-blue-500 text-white rounded hover:bg-blue-600 mb-2">Mail - Degradaciones/Caidas</button>
                <button class="w-full py-1 px-3 bg-blue-500 text-white rounded hover:bg-blue-600">Botón 3</button>
            </div>
            <div class="flex-1 px-4">
                <button class="w-full py-1 px-3 bg-gray-500 text-white rounded hover:bg-gray-600 mb-2">Botón 4</button>
                <button class="w-full py-1 px-3 bg-gray-500 text-white rounded hover:bg-gray-600 mb-2">Botón 5</button>
                <button class="w-full py-1 px-3 bg-gray-500 text-white rounded hover:bg-gray-600">Botón 6</button>
            </div>
        </div>
    </div>
</body>
</html>
