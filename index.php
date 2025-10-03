<?php

require __DIR__ . '/vendor/autoload.php';

use App\Course;
use App\CourseType;

$course = new Course(
    title: 'Curso profesional de PHP y Laravel: Inmersión Total',
    subtitle: 'Aprende PHP y Laravel desde cero',
    description: 'Sumérgete en el ecosistema de PHP y Laravel',
    tags: [
        'PHP',
        'Laravel',
        'JavaScript',
    ],
    price: 109.00,
    public_date: '2025-10-20',
    archived: false,
    lvls: [
        [
            'name' => 'Básico',
            'description' => 'Ideal para principiantes'
        ],
        [
            'name' => 'Intermedio',
            'description' => 'Ideal para estudiantes con conocimientos básicos de programación'
        ],
        [
            'name' => 'Avanzado',
            'description' => 'Ideal para estudiantes con conocimientos solidos de programación'
        ]
    ],
    lvl: 'Intermedio', 
    type: CourseType::PAID
);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PHP // Coder</title>

    <style>
        .futuristic-shadow {
            text-shadow: 0 0 5px rgba(0, 255, 255, 0.5), 0 0 10px rgba(0, 255, 255, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .futuristic-shadow:hover {
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.8), 0 0 20px rgba(0, 255, 255, 0.6);
        }

        .minimal-card {
            background-color: rgba(17, 24, 39, 0.7);
            /* Dark background with transparency */
            border: 1px solid rgba(59, 130, 246, 0.5);
            /* Subtle blue border */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2), 0 0 15px rgba(59, 130, 246, 0.2);
            /* Subtle glow effect */
        }
    </style>
</head>

<body class="bg-slate-950 min-h-screen p-8 font-mono text-gray-100">

    <div class="max-w-4xl mx-auto space-y-12">
        <header class="text-center pt-10">
            <h1 class="text-5xl font-extrabold text-cyan-400 uppercase tracking-widest futuristic-shadow">
                Curso profesional de PHP y Laravel
            </h1>
            <p class="text-xl my-4 text-lime-400">Accediendo a la Interfaz del Curso...</p>
        </header>

        <div class="minimal-card p-8 rounded-xl backdrop-blur-sm">

            <?= $course ?>

            <div class="mt-8 text-center">
                <button class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full uppercase tracking-widest shadow-lg shadow-blue-500/50 transform hover:scale-105 transition duration-300">
                    Inscribete ahora
                </button>
            </div>
        </div>

    </div>
</body>

</html>