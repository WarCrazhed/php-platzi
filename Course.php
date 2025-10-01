<?php
class Course
{
    public function __construct(
        protected string $title,
        protected string $subtitle,
        protected string $description,
        protected array $tags,
        protected float $price,
        protected string $lvl,
        protected ?string $public_date = null,
        protected bool $archived = false,
        protected array $lvls = [],
    ) {}

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        return null;
    }

    public function __toString()
    {
        $lvlDescription = $this->getLvl();

        // 1. Generar la lista de etiquetas (Tags)
        $tagsHtml = '';
        foreach ($this->tags as $tag) {
            $tagsHtml .= "<p class='bg-blue-500 px-3 py-1 rounded-xl'>$tag</p>";
        }

        // 2. Generar el HTML principal con todos los datos
        $html = "
            <h2 class='text-3xl font-bold text-blue-400'>
                $this->title
            </h2>
            <h3 class='mb-4 border-b border-blue-600/50 pb-2'>
                $this->subtitle
            </h3>
            <h4 class='text-xl font-bold text-lime-400 mb-2 border-b border-blue-600/50 pb-2'>
                Nivel: $this->lvl
            </h4>
            
            <p class='mb-4 text-sm text-gray-400'>
                $lvlDescription 
            </p>
            
            <p class='text-gray-300 leading-relaxed mb-6'>
                <span class='text-lime-400'>// Descripción General:</span> $this->description
            </p>

            <p>Etiquetas:</p>
            <div class='text-xs mb-4 flex flex-wrap gap-2 py-3'>
                $tagsHtml
            </div>

            <div class='grid grid-cols-2 gap-6 text-sm'>
                <div class='p-4 bg-gray-800/80 rounded-lg border border-cyan-700/50'>
                    <span class='text-xs uppercase tracking-wider text-lime-500 block mb-1'>Costo de Acceso</span>
                    <p class='text-3xl font-extrabold text-white'>
                        $" . number_format($this->price, 2) . "
                        <span class='text-base font-normal text-gray-400 ml-1'>USD</span>
                    </p>
                </div>

                <div class='p-4 bg-gray-800/80 rounded-lg border border-cyan-700/50'>
                    <span class='text-xs uppercase tracking-wider text-lime-500 block mb-1'>Lanzamiento Oficial</span>
                    <p class='text-3xl font-extrabold text-white'>
                        " . date("d/m/Y", strtotime($this->public_date)) . "
                    </p>
                </div>
            </div>

            <div class='mt-8 text-center text-sm'>
                <p>Estado del curso: <span class='text-lime-500'>" . $this->status() . "</span></p>
            </div>
        ";

        return $html;
    }

    // ... (rest of the class methods: addTag, status, getLvl) ...

    public function addTag(string $tag): void
    {
        if (in_array($tag, $this->tags)) {
            return;
        }

        if (empty($tag)) {
            return;
        }

        if (count($this->tags) >= 5) {
            return;
        }

        $this->tags[] = $tag;
    }

    public function status(): string
    {
        return ($this->archived) ? "Archivado" : "Activo";
    }

    public function getLvl(): string
    {
        $lvlFilter = array_filter($this->lvls, function ($level) {
            return $level['name'] === $this->lvl;
        });

        // Devolvemos la descripción si existe, si no, un mensaje de error
        if (!empty($lvlFilter)) {
            return array_values($lvlFilter)[0]['description'];
        }

        return 'Descripción de nivel no disponible o no encontrado.';
    }
}
