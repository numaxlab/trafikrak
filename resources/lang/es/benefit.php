<?php

return [
    'label' => 'Beneficio',
    'plural_label' => 'Beneficios',
    'pages' => [
        'edit' => [
            'title' => 'Información básica',
        ],
    ],
    'table' => [
        'name' => [
            'label' => 'Nombre',
        ],
    ],
    'form' => [
        'code' => [
            'label' => 'Tipo',
            'options' => [
                'credit_payment_type' => 'Método de pago a crédito',
                'customer_group' => 'Pertenecer a grupo de clientes',
            ],
        ],
        'name' => [
            'label' => 'Nombre',
        ],
        'customer_group_id' => [
            'label' => 'Grupo de clientes',
        ],
    ],
];
