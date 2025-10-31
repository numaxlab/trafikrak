<?php

return [
    'label' => 'Piso',
    'plural_label' => 'Portadas',
    'sections' => [
        'homepage' => 'Portada',
        'bookshop' => 'Librería',
        'editorial' => 'Editorial',
        'education' => 'Formación',
    ],
    'pages' => [
        'edit' => [
            'title' => 'Información básica',
        ],
    ],
    'table' => [
        'name' => [
            'label' => 'Nombre',
        ],
        'type' => [
            'label' => 'Tipo',
        ],
        'is_published' => [
            'label' => 'Público',
        ],
    ],
    'form' => [
        'section' => [
            'label' => 'Portada',
            'options' => [
                'homepage' => 'Portada',
                'bookshop' => 'Librería',
                'editorial' => 'Editorial',
                'education' => 'Formación',
            ],
        ],
        'name' => [
            'label' => 'Nombre',
        ],
        'link' => [
            'label' => 'Enlace',
        ],
        'link_name' => [
            'label' => 'Etiqueta del enlace',
        ],
        'type' => [
            'label' => 'Tipo',
            'options' => [
                'related_content_banner' => 'Banners',
                'related_content_collection' => 'Categorías de productos',
                'related_content_course' => 'Cursos',
                'related_content_education_topic' => 'Temas de formación',
                'editorial_latest' => 'Últimos productos Editorial',
                'education_upcoming' => 'Próximos cursos',
                'events_upcoming' => 'Próximos eventos (actividades + sesiones de cursos)',
                'articles_latest' => 'Últimas noticias',
            ],
        ],
        'banners' => [
            'label' => 'Banners',
        ],
        'courses' => [
            'label' => 'Cursos',
        ],
        'education_topics' => [
            'label' => 'Temas formación',
        ],
        'collections' => [
            'label' => 'Categorías',
        ],
        'is_published' => [
            'label' => 'Público',
        ],
    ],
];
