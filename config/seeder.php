<?php

use Carbon\Carbon;

return [

    'users' => [
        [
            'name' => 'Sharif Khan',
            'email' => 'sharif.khan@stupidly.uk',
            'tutor' => true
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
            'synopsis' => 'Create a fun memory game.',
            'description' => 'Develop your memory and pattern recognition skills by building an engaging flag-matching game. Learn VueJS reactivity, CSS animations, and game logic while creating colorful, interactive memory cards.',
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
            'synopsis' => 'Build Conway\'s Game of Life.',
            'description' => 'Explore cellular automata and emergent behavior by implementing Conway\'s Game of Life. Master P5.js for canvas rendering, VueJS for state management, and complex algorithmic thinking in this iconic simulation.',
            'bullets' => [
                'how to simulate cellular automata',
                'rendering with P5.js',
                'managing state with VueJS',
                'implementing algorithmic logic'
            ],
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
            'synopsis' => 'Learn to build a classic Black Jack card game.',
            'description' => 'Dive into casino game development by creating a fully-featured Black Jack game. Learn card game logic, dealer AI, betting systems, and sophisticated VueJS state management for complex game rules.',
            'bullets' => [
                'card game logic and rules',
                'handling dealer logic',
                'managing betting systems',
                'complex state management'
            ],
            'level' => 'Intermediate',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / Tailwind CSS'],
            'image' => '/images/courses/tom-m-UWh8vs4ZMMM-unsplash.jpg',
        ],

        'convoy' => [
            'title' => 'Convoy Location Tracker',
            'synopsis' => 'Use a map to keep track of friends in your convoy.',
            'description' => 'Build a real-time location tracking system for managing convoys. Master Laravel APIs, map integration, WebSocket communications, and complex geolocation features for group coordination.',
            'bullets' => [
                'real-time location tracking',
                'integrating maps and geolocation',
                'WebSocket communication',
                'building APIs with Laravel'
            ],
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Laravel / Inertia.js', 'VueJS', 'HTML / Tailwind CSS', 'APIs'],
            'image' => '/images/courses/tamas-tuzes-katai-rEn-AdBr3Ig-unsplash.jpg',
        ],
        'game-of-lives-1' => [
            'title' => 'Multi-player Game of Life',
            'synopsis' => 'Use Lua to remake this classic.',
            'description' => 'Recreate Conway\'s Game of Life using Lua with real-time multiplayer capabilities. Learn game server architecture, Lua scripting, WebSocket integration, and distributed state synchronization.',
            'bullets' => [
                'Lua scripting basics',
                'game server architecture',
                'real-time multiplayer networking',
                'WebSocket integration'
            ],
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Lua', 'WebSockets'],
            'image' => '/images/courses/cffc6424ce-lua.jpg',
        ],
        'game-of-lives-2' => [
            'title' => 'Multi-player Game of Life',
            'synopsis' => 'Use P5.js to remake this classic.',
            'description' => 'Build a sophisticated multiplayer Game of Life simulation using VueJS, P5.js, and NodeJS. Master real-time synchronization, WebSocket communication, and advanced canvas rendering techniques.',
            'bullets' => [
                'multiplayer game synchronization',
                'advanced canvas rendering',
                'real-time data exchange',
                'optimizing performance'
            ],
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
                    'title' => 'Lesson 4'
                ],
            ]
        ],
        'super-bomberman' => [
            'title' => 'Super Bomberman Game',
            'synopsis' => 'Build a multi-player version of the classic Bomberman game.',
            'description' => 'Create an explosive multiplayer Bomberman game using Lua and WebSockets. Learn game physics, collision detection, power-up systems, and real-time multiplayer game mechanics.',
            'bullets' => [
                'game physics and collision detection',
                'handling power-up systems',
                'multiplayer game mechanics',
                'Lua programming for games'
            ],
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Lua', 'WebSockets'],
            'image' => '/images/courses/Bomberman_game.png',
        ],
        'texas-hold-em' => [
            'title' => 'Texas Hold\'em Game',
            'synopsis' => 'Build a classic Texas Hold\'em card game for multiple players.',
            'description' => 'Develop a comprehensive Texas Hold\'em poker game with multiplayer support. Master complex game logic, betting algorithms, hand evaluation, and real-time player synchronization.',
            'bullets' => [
                'poker game rules and logic',
                'hand evaluation algorithms',
                'betting and pot management',
                'real-time player synchronization'
            ],
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / Tailwind CSS', 'WebSockets', 'NodeJS'],
            'image' => '/images/courses/michal-parzuchowski-U8n_O7rEq7o-unsplash.jpg',
        ],
        'live-chat' => [
            'title' => 'Live Chat App',
            'synopsis' => 'Use JavaScript to build a real-time live chat application.',
            'description' => 'Build a feature-rich real-time chat application with VueJS and NodeJS. Learn WebSocket communication, message persistence, user authentication, and modern chat UI design patterns.',
            'bullets' => [
                'real-time data transfer with WebSockets',
                'user authentication flows',
                'persisting messages to database',
                'modern chat UI design'
            ],
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'NodeJS', 'HTML / Tailwind CSS', 'WebSockets'],
            'image' => '/images/courses/kuu-akura-pnK6Q-QTHM4-unsplash.jpg',
        ],
        'used-car-prices' => [
            'title' => 'Used Car Prices Predictor',
            'synopsis' => 'Build an app that predicts used car prices using eBay.',
            'description' => 'Create a machine learning-powered car price prediction system using eBay API data. Master data scraping, price analysis algorithms, API integration, and predictive modeling techniques.',
            'bullets' => [
                'scraping data from APIs',
                'analyzing pricing trends',
                'predictive modeling basics',
                'integrating with eBay API'
            ],
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Laravel / Inertia.js', 'APIs'],
            'image' => '/images/courses/obi-aZKJEvydrNM-unsplash.jpg',
        ],
        'battle-zone' => [
            'title' => 'Battle Zone Game',
            'synopsis' => 'Create a 3D Battle Zone game using Babylon.js.',
            'description' => 'Build an immersive 3D tank battle game using Babylon.js. Master 3D graphics programming, physics simulation, camera controls, and advanced game mechanics in a web-based 3D environment.',
            'bullets' => [
                '3D graphics with Babylon.js',
                'physics simulation in 3D',
                'managing 3D camera controls',
                'building immersive environments'
            ],
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

    'months' => [
        [
            'started_at' => '2025-12-01'
        ],
        [
            'started_at' => '2026-01-01'
        ],
    ]

];
