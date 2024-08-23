<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                <button id="run-script-btn" class="w-full py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 mb-2">Scraping - Porcentajes grupos electrógenos %</button>
            </div>
        </div>
    </div>

    <div class="mt-8 mb-10 p-8 bg-white shadow-md rounded-lg max-w-4xl mx-auto">
        <div>
            <p>Resultado</p>
            <!-- Área para mostrar el resultado del script -->
            <div id="script-output" class="code-container">
                <pre><code id="code-block"></code></pre>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#run-script-btn').click(function() {
                $.ajax({
                    url: '/run-script',
                    method: 'GET',
                    success: function(response) {
                        $('#code-block').text(response.output);
                    },
                    error: function(xhr) {
                        $('#code-block').text('Error: ' + xhr.responseJSON.output);
                    }
                });
            });
        });
    </script>
</body>

</html>
