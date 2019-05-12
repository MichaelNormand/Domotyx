<?php

return [
    "required" => "Le champ :attribute doit être remplis.",
    'mimes' => 'Le champ :attribute doit contenir des fichiers de ces types: :values.',
    'max' => [
        'numeric' => 'Le champ :attribute doit être au maximum au nombre :max.',
        'file' => 'Le champ :attribute doit être au plus de :max kilo-octets.',
        'string' => 'Le champ :attribute doit comporter au plus de :max charactères.',
        'array' => 'Le champ :attribute doit comporter au plus de :max items.',
    ],
];

?>