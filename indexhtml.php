<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $html_code = $_POST['html_code'];
    $message = '';

    // Überprüfen, ob der HTML-Code das richtige <h1> Tag enthält und den Text "Hallo Welt" hat
    if (preg_match('/<h1>\s*Hallo Welt\s*<\/h1>/', $html_code)) {
        $message = "<div class='alert alert-success' role='alert'>
                        <strong>Erfolg:</strong> Du hast die Aufgabe korrekt gelöst! Die Überschrift lautet <code>&lt;h1&gt;Hallo Welt&lt;/h1&gt;</code>.
                    </div>";
    } else {
        $message = "<div class='alert alert-danger' role='alert'>
                        <strong>Fehler:</strong> Die Aufgabe wurde nicht korrekt gelöst. Stelle sicher, dass du das <code>&lt;h1&gt;</code>-Tag verwendest und der Text genau <code>Hallo Welt</code> lautet.
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
    <title>HTML-Test: Überschrift mit "Hallo Welt"</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4">Test: Erstelle eine sehr wichtige Überschrift</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="html_code" class="form-label">Gib den HTML-Code für eine sehr wichtige Überschrift mit dem Text <strong>Hallo Welt</strong> ein:</label>
                        <textarea name="html_code" id="html_code" class="form-control" rows="10" placeholder="Füge dein HTML hier ein"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Test ausführen</button>
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
