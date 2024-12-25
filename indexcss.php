<?php
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $css_code = $_POST['css_code'];

    // Versuche, CSS in das <style> Tag einzufügen
    $message = "<div class='alert alert-info' role='alert'>CSS wird angewendet...</div>";

    // Validieren und anwenden des CSS
    echo "<style>$css_code</style>";

    // CSS-Überprüfung (in diesem Fall Farbe Blau und unterstrichen)
    if (strpos($css_code, 'color: blue') !== false && strpos($css_code, 'text-decoration: underline') !== false) {
        $message = "<div class='alert alert-success' role='alert'>
                        <strong>Erfolg:</strong> Du hast den Text in Blau und unterstrichen gemacht.
                    </div>";
    } else {
        $message = "<div class='alert alert-danger' role='alert'>
                        <strong>Fehler:</strong> Dein CSS entspricht nicht den Anforderungen. Stelle sicher, dass der Text blau ist und unterstrichen wird.
                    </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Lokale Bootstrap CSS-Datei einbinden (im gleichen Ordner) -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <title>CSS-Test: Blaue und unterstrichene Überschrift</title>
</head>
<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-4">CSS-Test: Blaue und unterstrichene Überschrift</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="css_code" class="form-label">Gib deinen CSS-Code ein, um die Überschrift blau und unterstrichen zu machen der Klassenname ist "erstesCSS":</label>
                        <textarea name="css_code" id="css_code" class="form-control" rows="10" placeholder="Füge deinen CSS-Code hier ein"></textarea>
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

        <!-- Beispiel-Überschrift, um das CSS zu testen -->
        <h1 class="erstesCSS">Sehr wichtige Überschrift</h1>
    </div>

    <!-- Lokale Bootstrap JS-Datei einbinden (im gleichen Ordner) -->
    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>
