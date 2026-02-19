<?php

declare(strict_types=1);

class SkillModel
{
    public function all(): array
    {
        return [
          
            [
                "image" => "/images/php.png",
                "title" => "PHP",
                "description" => "Backend-Entwicklung mit Laravel.",
                "link" => "/about/knowledge/#php",
                "buttonStyle" => "bg-indigo-500 text-white",
            ],
              [               
                "image" => "/images/javascript.png",
                "title" => "JavaScript",
                "description" => "Moderne Webentwicklung mit ES6+, DOM, APIs.",
                "link" => "/about/knowledge/#javascript",
                "buttonStyle" => "bg-amber-400 text-black",
            ],
            [
                "image" => "/images/react.png",
                "title" => "React",
                "description" => "Frontend-Entwicklung mit React.",
                "link" => "/about/knowledge/#react",
                "buttonStyle" => "bg-blue-500 text-white",
            ],
            [
                "image" => "/images/php.png",
                "title" => "Laravel",
                "description" => "Backend-Entwicklung mit Laravel.",
                "link" => "/about/knowledge/#laravel",
                "buttonStyle" => "bg-indigo-500 text-white",
            ]
            
        ];
    }
}
