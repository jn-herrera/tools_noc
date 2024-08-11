<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <style>
        /* Estilos para el área de código */
        .code-container {
            position: relative;
            background-color: #f5f5f5;
            border-radius: 0.375rem;
            padding: 1rem;
            overflow-x: auto;
            max-height: 400px;
        }

        .copy-button {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: #3182ce;
            color: white;
            border: none;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            cursor: pointer;
            font-size: 0.875rem;
            transition: background-color 0.3s;
        }

        .copy-button:hover {
            background-color: #2b6cb0;
        }

        pre {
            margin: 0;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="text-2xl font-semibold text-center mb-6 mt-10">Herramientas NOC</div>
    <div class="p-8 bg-white shadow-md rounded-lg max-w-4xl mx-auto">
        <!-- Usar clases responsive para el diseño de los botones -->
        <div class="flex flex-col md:flex-row gap-5">
            <div class="flex-1 px-4">
                <button class="w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 mb-2">Scraping -
                    Porcentajes grupos electrógenos %</button>
                <button class="w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 mb-2">Mail -
                    Degradaciones/Caidas</button>
                <button class="w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600">Botón 3</button>
            </div>
            <div class="flex-1 px-4">
                <button class="w-full py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-600 mb-2">Botón 4</button>
                <button class="w-full py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-600 mb-2">Botón 5</button>
                <button class="w-full py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-600">Botón 6</button>
            </div>
        </div>
    </div>

    <div class="mt-8 mb-10 p-8 bg-white shadow-md rounded-lg max-w-4xl mx-auto">
        <div>
            <p>Resultado</p>
            <!-- Área de código con botón de copiar -->
            <div class="code-container">
                <button class="copy-button" onclick="copyToClipboard()">Copiar código</button>
                <pre><code id="code-block">
&lt;!-- resources/views/welcome.blade.php --&gt;


            .copy-button:hover {
                background-color: #2b6cb0;
            }
            pre {
                margin: 0;
            }
        &lt;/style&gt;
    &lt;/head&gt;
    &lt;body class="bg-gray-100"&gt;
        &lt;div class="text-2xl font-semibold text-center mb-6 mt-8"&gt;Herramientas NOC&lt;/div&gt;
        &lt;div class="p-8 bg-white shadow-md rounded-lg max-w-4xl mx-auto"&gt;
            &lt;!-- Usar clases responsive para el diseño de los botones --&gt;
            &lt;div class="flex flex-col md:flex-row gap-5"&gt;
                &lt;div class="flex-1 px-
