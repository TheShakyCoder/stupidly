<?php

use Carbon\Carbon;

return [

    'users' => [
        [
            'name' => 'Sharif Khan',
            'email' => 'sharif.khan@stupidly.uk',
        ],
    ],

    'courses' => [
        'tic-tac-toe' => [
            'title' => 'Tic Tac Toe Game',
            'description' => 'Build a classic Tic Tac Toe game using VueJS, HTML, and CSS.',
            'level' => 'Beginner',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / CSS'],
            'image' => '/images/courses/solstice-hannan--yhBOqHOr0c-unsplash.jpg',
            'preview' => 'https://www.youtube.com/embed/aqz-KE-bpKQ?si=byy4vWLPje2zWu5F',
            'lessons' => [
                [
                    'available_at' => '2026-01-05 09:30:00',
                    'title' => 'Lesson 1'
                ],
                [
                    'available_at' => '2026-01-12 09:30:00',
                    'title' => 'Lesson 2'
                ],
                [
                    'available_at' => '2026-01-19 09:30:00',
                    'title' => 'Lesson 3'
                ],
            ]
        ],
        'simple-simon' => [
            'title' => 'Fun With Flags',
            'description' => 'Create a fun memory game.',
            'level' => 'Beginner',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / CSS'],
            'image' => '/images/courses/k8-B8e8PAJ9JRM-unsplash.jpg',
        ],

        'game-of-life' => [
            'title' => 'Conway\'s Game of Life',
            'description' => 'Build Conway\'s Game of Life.',
            'level' => 'Intermediate',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'P5.js', 'HTML / Tailwind CSS'],
            'image' => '/images/courses/SpaceshipFormation.gif',
            'lessons' => [
                [
                    'available_at' => '2026-01-05 11:00:00',
                    'title' => 'Lesson 1'
                ],
                [
                    'available_at' => '2026-01-12 11:00:00',
                    'title' => 'Lesson 2'
                ],
                [
                    'available_at' => '2026-01-19 11:00:00',
                    'title' => 'Lesson 3'
                ],
                [
                    'available_at' => '2026-01-26 11:00:00',
                    'title' => 'Lesson 4'
                ],
            ]
        ],
        'black-jack' => [
            'title' => 'Black Jack Game',
            'description' => 'Learn to build a classic Black Jack card game.',
            'level' => 'Intermediate',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / Tailwind CSS'],
            'image' => '/images/courses/tom-m-UWh8vs4ZMMM-unsplash.jpg',
        ],

        'convoy' => [
            'title' => 'Convoy Location Tracker',
            'description' => 'Use a map to keep track of friends in your convoy.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Laravel / Inertia.js', 'VueJS', 'HTML / Tailwind CSS', 'APIs'],
            'image' => '/images/courses/tamas-tuzes-katai-rEn-AdBr3Ig-unsplash.jpg',
        ],
        'game-of-lives-1' => [
            'title' => 'Multi-player Game of Life',
            'description' => 'Use Lua to remake this classic.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Lua', 'WebSockets'],
            'image' => '/images/courses/cffc6424ce-lua.jpg',
        ],
        'game-of-lives-2' => [
            'title' => 'Multi-player Game of Life',
            'description' => 'Use P5.js to remake this classic.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'P5.js', 'WebSockets', 'NodeJS'],
            'image' => '/images/courses/cffc6424ce-vue.png',
            'lessons' => [
                [
                    'available_at' => '2026-01-05 14:00:00',
                    'title' => 'Lesson 1'
                ],
                [
                    'available_at' => '2026-01-12 14:00:00',
                    'title' => 'Lesson 2'
                ],
                [
                    'available_at' => '2026-01-19 14:00:00',
                    'title' => 'Lesson 3'
                ],
                [
                    'available_at' => '2026-01-26 14:00:00',
                    'title' => 'Lesson 3'
                ],
            ]
        ],
        'super-bomberman' => [
            'title' => 'Super Bomberman Game',
            'description' => 'Build a multi-player version of the classic Bomberman game.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Lua', 'WebSockets'],
            'image' => '/images/courses/Bomberman_game.png',
        ],
        'texas-hold-em' => [
            'title' => 'Texas Hold\'em Game',
            'description' => 'Build a classic Texas Hold\'em card game for multiple players.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / Tailwind CSS', 'WebSockets', 'NodeJS'],
            'image' => '/images/courses/michal-parzuchowski-U8n_O7rEq7o-unsplash.jpg',
        ],
        'live-chat' => [
            'title' => 'Live Chat App',
            'description' => 'Use JavaScript to build a real-time live chat application.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'NodeJS', 'HTML / Tailwind CSS', 'WebSockets'],
            'image' => '/images/courses/kuu-akura-pnK6Q-QTHM4-unsplash.jpg',
        ],
        'used-car-prices' => [
            'title' => 'Used Car Prices Predictor',
            'description' => 'Build an app that predicts used car prices using eBay.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Laravel / Inertia.js', 'APIs'],
            'image' => '/images/courses/obi-aZKJEvydrNM-unsplash.jpg',
        ],
        'battle-zone' => [
            'title' => 'Battle Zone Game',
            'description' => 'Create a 3D Battle Zone game using Babylon.js.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Babylon.js'],
            'image' => '/images/courses/paul-pastourmatzis-5FGsEWRn2NQ-unsplash.jpg',
            'lessons' => [
                [
                    'available_at' => '2026-01-05 15:30:00',
                    'title' => 'Lesson 1'
                ],
                [
                    'available_at' => '2026-01-12 15:30:00',
                    'title' => 'Lesson 2'
                ],
                [
                    'available_at' => '2026-01-19 15:30:00',
                    'title' => 'Lesson 3'
                ],
                [
                    'available_at' => '2026-01-26 15:30:00',
                    'title' => 'Lesson 4'
                ],
            ]
        ]
    ],

];
