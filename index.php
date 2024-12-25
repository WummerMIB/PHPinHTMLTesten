<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['php_code'];
    try {
        ob_start(); 
        eval($code); 
        $output = ob_get_clean(); 

        // Extrahiere die reine Zahl (z. B. "2") aus der Ausgabe
        if (preg_match('/\b\d+\b/', $output, $matches)) {
            $number = (int)$matches[0]; // Konvertiere die gefundene Zahl in einen Integer

            // Prüfe, ob die Zahl 2 ist
            if ($number === 2) {
                $message = "<div class='alert alert-success' role='alert'>
                                <strong>Erfolg:</strong> Die Berechnung war korrekt.
                            </div>";
            } else {
                $message = "<div class='alert alert-danger' role='alert'>
                                <strong>Kein Erfolg:</strong> Die Ausgabe war \"$output\".
                            </div>";
            }
        } else {
            $message = "<div class='alert alert-warning' role='alert'>
                            <strong>Kein Erfolg:</strong> Keine Zahl gefunden in der Ausgabe \"$output\".
                        </div>";
        }
    } catch (Throwable $e) {
        $message = "<div class='alert alert-danger' role='alert'>
                        <strong>Fehler:</strong> " . htmlspecialchars($e->getMessage()) . ".
                    </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.min.css" rel="stylesheet">
    <title>PHP-Code-Ausführung</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4">PHP-Code eingeben und ausführen</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="php_code" class="form-label">PHP-Code</label>
                        <textarea name="php_code" id="php_code" class="form-control" rows="10" placeholder="PHP-Code hier eingeben"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Code ausführen</button>
                </form>
            </div>
        </div>

        <!-- Bereich für die Ausgabe -->
        <div class="mt-4">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </div>
    </div>

    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>
