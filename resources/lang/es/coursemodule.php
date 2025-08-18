<?php

return [
    'label' => 'Sesión',
    'plural_label' => 'Sesiones',
    'pages' => [
        'edit' => [
            'title' => 'Información básica',
        ],
        'instructors' => [
            'label' => 'Instructoras',
            'actions' => [
                'attach' => [
                    'label' => 'Asociar',
                    'form' => [
                        'record_id' => [
                            'label' => 'Instructora',
                        ],
                    ],
                    'notificaton' => [
                        'success' => 'Instructora asociada correctamente',
                    ],
                ],
                'detach' => [
                    'notificaton' => [
                        'success' => 'Instructora desasociada correctamente',
                    ],
                ],
            ],
        ],
    ],
    'table' => [
        'course_name' => [
            'label' => 'Curso',
        ],
        'name' => [
            'label' => 'Título',
        ],
        'starts_at' => [
            'label' => 'Fecha y hora',
        ],
        'is_published' => [
            'label' => 'Pública',
        ],
    ],
    'form' => [
        'course_id' => [
            'label' => 'Curso',
        ],
        'name' => [
            'label' => 'Título',
        ],
        'subtitle' => [
            'label' => 'Subtítulo',
        ],
        'description' => [
            'label' => 'Descripción',
        ],
        'starts_at' => [
            'label' => 'Fecha y hora',
        ],
        'is_published' => [
            'label' => 'Pública',
        ],
    ],
];
