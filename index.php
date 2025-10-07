<?php

$app = require __DIR__ . '/bootstrap.php';

$question = $_POST['question'] ?? '';

$answer = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $question) {
    $answer = $app->getResponse($question);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Chatbot</title>
</head>

<body class="bg-gradient-to-br from-indigo-900 via-black to-purple-900 min-h-screen flex flex-col">
    <main class="max-w-2xl mx-auto p-4 text-white flex-grow">
        <h1 class="text-center text-9xl font-bold mb-4">
            <span class="relative inline-block bg-gradient-to-br from-purple-500 via-indigo-500 to-cyan-500 bg-clip-text text-transparent">
                ChatBot
            </span>
        </h1>
        <form method="POST" class="mb-8">
            <label
                for="question"
                class="block text-lg font-medium mb-2">Pregunta:</label>
            <input
                type="text"
                id="question"
                name="question"
                placeholder="Escribe tu pregunta aquí..."
                required
                value="<?php echo htmlspecialchars($question); ?>"
                class="w-full p-2 border border-purple-500 focus:outline-none focus:border-purple-600 rounded-xl mb-4">
            <button
                type="submit"
                class="bg-indigo-500 text-white px-4 py-2 rounded-xl hover:bg-indigo-600 w-full uppercase font-bold">Enviar</button>
        </form>
        <?php if ($answer): ?>
            <h2 class="text-6xl font-bold mb-4 text-center">Respuesta:</h2>
            <p><?php echo htmlspecialchars($answer); ?></p>
        <?php endif; ?>
    </main>
</body>

</html>