<?php
return [
    [
        "id"                  => 1,
        "question"            => "How easy was it to receive the project documents?",
        "name"                => "question_1",
        "dependent_to"        => '',
        'dependent_condition' => '',
        'dependent_value'     => [],
    ],
    [
        "id"                  => 2,
        "question"            => "How easy was it to receive the project?",
        "name"                => "question_2",
        "dependent_to"        => 'question_1',
        'dependent_condition' => 'eq',
        'dependent_value'     => ['yes'],
    ],
    [
        "id"                  => 3,
        "question"            => "How is it?",
        "name"                => "question_3",
        "dependent_to"        => 'question_1',
        'dependent_condition' => 'eq',
        'dependent_value'     => ['no'],
    ],
    [
        "id"                  => 4,
        "question"            => "Are you happy?",
        "name"                => "question_4",
        "dependent_to"        => 'question_2',
        'dependent_condition' => 'in',
        'dependent_value'     => ['yes', 'no'],
    ],
];