<?php
require __DIR__ . "/vendor/autoload.php";

use Collection\Collection;

$data = [
    [
        'name' => 'Xiomi Note 10',
        'price' => 100,
        'status' => 0
    ],
    [
        'name' => 'Realme Note 10',
        'price' => 200,
        'status' => 0
    ],
    [
        'name' => 'Samsung Note 10',
        'price' => 100,
        'status' => 0
    ],
    [
        'name' => 'Vivo Note 10',
        'price' => 100,
        'status' => 0
    ],
    [
        'name' => 'Oppo F3',
        'price' => 100,
        'status' => 1
    ],
];

$collect = Collection::make($data)
            ->filter(function ($key, $value) {
                return $value['status'] == 1;
            })->map(function ($value, $key) {
                return [
                    'name' => $value['name'],
                    'price' => $value['price']
                ];
            })->toJson();

print_r($collect);