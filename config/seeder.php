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
            'synopsis' => 'Build a classic Tic Tac Toe game using VueJS, HTML, and CSS.',
            'description' => 'Learn the fundamentals of game development by creating a classic Tic Tac Toe game. You\'ll master VueJS components, game state management, and interactive UI design while building a fully functional two-player game.',
            'bullets' => [
                'what a constant is, and what a variable is',
                'the basics of computer logic',
                'what a loop is and when to use it',
                'what a condition is and the different ways to code it'
            ],
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
        'fun-with-flags' => [
            'title' => 'Fun With Flags',
            'description' => 'Create a fun memory game.',
            'synopsis' => 'Develop your memory and pattern recognition skills by building an engaging flag-matching game. Learn VueJS reactivity, CSS animations, and game logic while creating colorful, interactive memory cards.',
            'bullets' => [
                'the basics of computer logic',
                'what a constant is, and what a variable is',
                'what a loop is and when to use it',
                'how to manage state to keep track of the application'
            ],
            'level' => 'Beginner',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / CSS'],
            'image' => '/images/courses/k8-B8e8PAJ9JRM-unsplash.jpg',
        ],

        'game-of-life' => [
            'title' => 'Conway\'s Game of Life',
            'description' => 'Build Conway\'s Game of Life.',
            'synopsis' => 'Explore cellular automata and emergent behavior by implementing Conway\'s Game of Life. Master P5.js for canvas rendering, VueJS for state management, and complex algorithmic thinking in this iconic simulation.',
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
            'synopsis' => 'Dive into casino game development by creating a fully-featured Black Jack game. Learn card game logic, dealer AI, betting systems, and sophisticated VueJS state management for complex game rules.',
            'level' => 'Intermediate',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / Tailwind CSS'],
            'image' => '/images/courses/tom-m-UWh8vs4ZMMM-unsplash.jpg',
        ],

        'convoy' => [
            'title' => 'Convoy Location Tracker',
            'description' => 'Use a map to keep track of friends in your convoy.',
            'synopsis' => 'Build a real-time location tracking system for managing convoys. Master Laravel APIs, map integration, WebSocket communications, and complex geolocation features for group coordination.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Laravel / Inertia.js', 'VueJS', 'HTML / Tailwind CSS', 'APIs'],
            'image' => '/images/courses/tamas-tuzes-katai-rEn-AdBr3Ig-unsplash.jpg',
        ],
        'game-of-lives-1' => [
            'title' => 'Multi-player Game of Life',
            'description' => 'Use Lua to remake this classic.',
            'synopsis' => 'Recreate Conway\'s Game of Life using Lua with real-time multiplayer capabilities. Learn game server architecture, Lua scripting, WebSocket integration, and distributed state synchronization.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Lua', 'WebSockets'],
            'image' => '/images/courses/cffc6424ce-lua.jpg',
        ],
        'game-of-lives-2' => [
            'title' => 'Multi-player Game of Life',
            'description' => 'Use P5.js to remake this classic.',
            'synopsis' => 'Build a sophisticated multiplayer Game of Life simulation using VueJS, P5.js, and NodeJS. Master real-time synchronization, WebSocket communication, and advanced canvas rendering techniques.',
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
            'synopsis' => 'Create an explosive multiplayer Bomberman game using Lua and WebSockets. Learn game physics, collision detection, power-up systems, and real-time multiplayer game mechanics.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Lua', 'WebSockets'],
            'image' => '/images/courses/Bomberman_game.png',
        ],
        'texas-hold-em' => [
            'title' => 'Texas Hold\'em Game',
            'description' => 'Build a classic Texas Hold\'em card game for multiple players.',
            'synopsis' => 'Develop a comprehensive Texas Hold\'em poker game with multiplayer support. Master complex game logic, betting algorithms, hand evaluation, and real-time player synchronization.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / Tailwind CSS', 'WebSockets', 'NodeJS'],
            'image' => '/images/courses/michal-parzuchowski-U8n_O7rEq7o-unsplash.jpg',
        ],
        'live-chat' => [
            'title' => 'Live Chat App',
            'description' => 'Use JavaScript to build a real-time live chat application.',
            'synopsis' => 'Build a feature-rich real-time chat application with VueJS and NodeJS. Learn WebSocket communication, message persistence, user authentication, and modern chat UI design patterns.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'NodeJS', 'HTML / Tailwind CSS', 'WebSockets'],
            'image' => '/images/courses/kuu-akura-pnK6Q-QTHM4-unsplash.jpg',
        ],
        'used-car-prices' => [
            'title' => 'Used Car Prices Predictor',
            'description' => 'Build an app that predicts used car prices using eBay.',
            'synopsis' => 'Create a machine learning-powered car price prediction system using eBay API data. Master data scraping, price analysis algorithms, API integration, and predictive modeling techniques.',
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Laravel / Inertia.js', 'APIs'],
            'image' => '/images/courses/obi-aZKJEvydrNM-unsplash.jpg',
        ],
        'battle-zone' => [
            'title' => 'Battle Zone Game',
            'description' => 'Create a 3D Battle Zone game using Babylon.js.',
            'synopsis' => 'Build an immersive 3D tank battle game using Babylon.js. Master 3D graphics programming, physics simulation, camera controls, and advanced game mechanics in a web-based 3D environment.',
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
