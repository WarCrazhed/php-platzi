<?php

class Course
{
    public function __construct(
        public string $title,
        public string $subtitle,
        public string $description,
        public array $tags,
        public float $price,
        public ?string $public_date = null,
        public bool $archived = false,
        public array $lvls = []
    ) {}
}

$course = new Course(
    title: 'Curso profesional de PHP y Laravel: Inmersión Total',
    subtitle: 'Aprende PHP y Laravel desde cero',
    description: 'Sumérgete en el ecosistema de PHP y Laravel',
    tags: [
        'PHP',
        'Laravel',
        'JavaScript',
        'HTML',
        'CSS',
        'MySQL',
    ],
    price: 109.00,
    public_date:'2025-10-20',
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
    ]
);

$status = ($course->archived) ? "Archivado" : "Activo";
$lvlToSearch = "Intermedio";

$lvlFilter = array_filter($course->lvls, function ($level) use ($lvlToSearch) {
    return $level['name'] === $lvlToSearch;
});

$lvl_found = array_values($lvlFilter)[0]; 

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
            <h2 class="text-3xl font-bold text-blue-400">
                <?= $course->title ?>
            </h2>
            <h3 class="mb-4 border-b border-blue-600/50 pb-2">
                <?= $course->subtitle ?>
            </h3>
            <h4 class="text-xl font-bold text-lime-400 mb-2 border-b border-blue-600/50 pb-2">
                Nivel: <?= $lvl_found['name'] ?>
            </h4>
            <p class="mb-4 text-sm text-gray-400">
                <?= $lvl_found['description'] ?>
            </p>
            <p class="text-gray-300 leading-relaxed mb-6">
                <span class="text-lime-400">// Descripción General:</span> <?= $course->description ?>
            </p>

            <p>Etiquetas:</p>
            <div class="text-xs mb-4 flex flex-wrap gap-2 py-3">
                <?php foreach ($course->tags as $tag): ?>
                    <p class="bg-blue-500 px-3 py-1 rounded-xl"><?= $tag ?></p>
                <?php endforeach; ?>
            </div>

            <div class="grid grid-cols-2 gap-6 text-sm">
                <div class="p-4 bg-gray-800/80 rounded-lg border border-cyan-700/50">
                    <span class="text-xs uppercase tracking-wider text-lime-500 block mb-1">Costo de Acceso</span>
                    <p class="text-3xl font-extrabold text-white">
                        $<?= number_format($course->price, 2) ?>
                        <span class="text-base font-normal text-gray-400 ml-1">USD</span>
                    </p>
                </div>

                <div class="p-4 bg-gray-800/80 rounded-lg border border-cyan-700/50">
                    <span class="text-xs uppercase tracking-wider text-lime-500 block mb-1">Lanzamiento Oficial</span>
                    <p class="text-3xl font-extrabold text-white">
                        <?= date("d/m/Y", strtotime($course->public_date)) ?>
                    </p>
                </div>
            </div>

            <div class="mt-8 text-center text-sm">
                <p>Estado del curso: <span class="text-lime-500"><?= $status ?></span></p>
            </div>

            <div class="mt-8 text-center">
                <button class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-full uppercase tracking-widest shadow-lg shadow-blue-500/50 transform hover:scale-105 transition duration-300">
                    Inscribete ahora
                </button>
            </div>
        </div>

    </div>
</body>

</html>