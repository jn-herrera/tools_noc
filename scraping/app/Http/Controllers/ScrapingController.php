<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrapingController extends Controller
{
    public function runScript()
    {
        $pythonPath = 'C:\\xampp\\htdocs\\scraping\\public\\scripts\\venv\\Scripts\\python.exe';
        $scriptPath = public_path('scripts/import_requests.py');

        // Comando para ejecutar el script Python
        $command = "$pythonPath $scriptPath";

        // Ejecuta el comando y captura la salida
        $output = shell_exec($command);

        if ($output === null) {
            $output = 'Error al ejecutar el script.';
        }

        return response()->json(['output' => $output]);
    }
}
