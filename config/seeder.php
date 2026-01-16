<?php

return [

    'users' => [
        [
            'name' => 'Sharif Khan',
            'email' => 'sharif.khan@stupidly.uk',
            'tutor' => true,
            'title' => 'Web Developer',
        ],
        [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'tutor' => false,
        ],
    ],

    'courses' => [
        'tic-tac-toe' => [
            'title' => 'Tic Tac Toe Game',
            'synopsis' => 'Build a classic Tic Tac Toe game using VueJS, HTML, and CSS.',
            'description' => 'Learn the fundamentals of game development by recreating the classic Tic Tac Toe game. You\'ll master VueJS components, game state management, and interactive UI design while building a fully functional two-player game.',
            'bullets' => [
                'what a constant is, and what a variable is',
                'the basics of computer logic',
                'what a loop is and when to use it',
                'what a condition is and the different ways to code it',
            ],
            'level' => 'Beginner',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / CSS'],
            'image' => '/images/courses/solstice-hannan--yhBOqHOr0c-unsplash.jpg',
            'preview' => 'https://www.youtube.com/embed/aqz-KE-bpKQ?si=byy4vWLPje2zWu5F',
            'lessons' => [
                [
                    'available_at' => '2026-01-16 14:30:00',
                    'title' => 'Lesson 0',
                ],
                [
                    'available_at' => '2026-01-26 09:30:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-02 09:30:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-09 09:30:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-16 09:30:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-23 09:30:00',
                    'title' => 'Lesson 5',
                ],
                [
                    'available_at' => '2026-03-02 09:30:00',
                    'title' => 'Lesson 6',
                ],
                [
                    'available_at' => '2026-03-09 09:30:00',
                    'title' => 'Lesson 7',
                ],
                [
                    'available_at' => '2026-03-16 09:30:00',
                    'title' => 'Lesson 8',
                ],
                [
                    'available_at' => '2026-03-23 09:30:00',
                    'title' => 'Lesson 9',
                ],
                [
                    'available_at' => '2026-03-30 09:30:00',
                    'title' => 'Lesson 10',
                ],
                [
                    'available_at' => '2026-04-06 09:30:00',
                    'title' => 'Lesson 11',
                ],
                [
                    'available_at' => '2026-04-13 09:30:00',
                    'title' => 'Lesson 12',
                ],
                [
                    'available_at' => '2026-04-20 09:30:00',
                    'title' => 'Lesson 13',
                ],
            ],
        ],
        'fun-with-flags' => [
            'title' => 'Fun With Flags',
            'synopsis' => 'Create a fun memory game.',
            'description' => 'Develop your memory and pattern recognition skills by building an engaging flag-matching game. Learn VueJS reactivity, and game logic while creating colorful, interactive memory cards.',
            'bullets' => [
                'the basics of computer logic',
                'what a constant is, and what a variable is',
                'what a loop is and when to use it',
                'how to manage state to keep track of the application',
            ],
            'level' => 'Beginner',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / CSS'],
            'image' => '/images/courses/k8-B8e8PAJ9JRM-unsplash.jpg',
            'lessons' => [
                [
                    'available_at' => '2026-01-27 09:30:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-03 09:30:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-10 09:30:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-17 09:30:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-24 09:30:00',
                    'title' => 'Lesson 5',
                ],
                [
                    'available_at' => '2026-03-03 09:30:00',
                    'title' => 'Lesson 6',
                ],
                [
                    'available_at' => '2026-03-10 09:30:00',
                    'title' => 'Lesson 7',
                ],
                [
                    'available_at' => '2026-03-17 09:30:00',
                    'title' => 'Lesson 8',
                ],
                [
                    'available_at' => '2026-03-24 09:30:00',
                    'title' => 'Lesson 9',
                ],
                [
                    'available_at' => '2026-03-31 09:30:00',
                    'title' => 'Lesson 10',
                ],
                [
                    'available_at' => '2026-04-07 09:30:00',
                    'title' => 'Lesson 11',
                ],
                [
                    'available_at' => '2026-04-14 09:30:00',
                    'title' => 'Lesson 12',
                ],
                [
                    'available_at' => '2026-04-21 09:30:00',
                    'title' => 'Lesson 13',
                ],
            ],
        ],

        'game-of-life' => [
            'title' => 'Conway\'s Game of Life',
            'synopsis' => 'Build Conway\'s Game of Life.',
            'description' => 'Explore cellular automata and emergent behavior by implementing Conway\'s Game of Life. Master P5.js for canvas rendering, VueJS for state management, and applied algorithmic thinking in this iconic simulation.',
            'bullets' => [
                'how to simulate cellular automata',
                'rendering with P5.js',
                'managing state with VueJS',
                'implementing algorithmic logic',
            ],
            'level' => 'Intermediate',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'P5.js', 'HTML / Tailwind CSS'],
            'image' => '/images/courses/SpaceshipFormation.gif',
            'lessons' => [
                [
                    'available_at' => '2026-01-26 11:00:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-02 11:00:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-09 11:00:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-16 11:00:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-23 11:00:00',
                    'title' => 'Lesson 5',
                ],
                [
                    'available_at' => '2026-03-02 11:00:00',
                    'title' => 'Lesson 6',
                ],
                [
                    'available_at' => '2026-03-09 11:00:00',
                    'title' => 'Lesson 7',
                ],
                [
                    'available_at' => '2026-03-16 11:00:00',
                    'title' => 'Lesson 8',
                ],
                [
                    'available_at' => '2026-03-23 11:00:00',
                    'title' => 'Lesson 9',
                ],
                [
                    'available_at' => '2026-03-30 11:00:00',
                    'title' => 'Lesson 10',
                ],
                [
                    'available_at' => '2026-04-06 11:00:00',
                    'title' => 'Lesson 11',
                ],
                [
                    'available_at' => '2026-04-13 11:00:00',
                    'title' => 'Lesson 12',
                ],
                [
                    'available_at' => '2026-04-20 11:00:00',
                    'title' => 'Lesson 13',
                ],
            ],
        ],
        'black-jack' => [
            'title' => 'Black Jack Game',
            'synopsis' => 'Learn to build a classic Black Jack card game.',
            'description' => 'Dive into playing card game development by creating a fully-featured Black Jack game. Learn card game logic, dealer AI, betting systems, and sophisticated VueJS state management for complex game rules.',
            'bullets' => [
                'card game logic and rules',
                'handling dealer logic',
                'managing betting systems',
                'complex state management',
            ],
            'level' => 'Intermediate',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / Tailwind CSS'],
            'image' => '/images/courses/tom-m-UWh8vs4ZMMM-unsplash.jpg',
            'lessons' => [
                [
                    'available_at' => '2026-01-27 11:00:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-03 11:00:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-10 11:00:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-17 11:00:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-24 11:00:00',
                    'title' => 'Lesson 5',
                ],
                [
                    'available_at' => '2026-03-03 11:00:00',
                    'title' => 'Lesson 6',
                ],
                [
                    'available_at' => '2026-03-10 11:00:00',
                    'title' => 'Lesson 7',
                ],
                [
                    'available_at' => '2026-03-17 11:00:00',
                    'title' => 'Lesson 8',
                ],
                [
                    'available_at' => '2026-03-24 11:00:00',
                    'title' => 'Lesson 9',
                ],
                [
                    'available_at' => '2026-03-31 11:00:00',
                    'title' => 'Lesson 10',
                ],
                [
                    'available_at' => '2026-04-07 11:00:00',
                    'title' => 'Lesson 11',
                ],
                [
                    'available_at' => '2026-04-14 11:00:00',
                    'title' => 'Lesson 12',
                ],
                [
                    'available_at' => '2026-04-21 11:00:00',
                    'title' => 'Lesson 13',
                ],
            ],
        ],

        'convoy' => [
            'title' => 'Convoy Location Tracker',
            'synopsis' => 'Use a map to keep track of friends in your convoy while travelling.',
            'description' => 'Build a real-time location tracking system for managing convoys. Master Laravel APIs, map integration, and complex geolocation features for group coordination.',
            'bullets' => [
                'real-time location tracking',
                'integrating maps and geolocation',
                'building APIs with Laravel',
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
                'WebSocket integration',
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
                'optimizing performance',
            ],
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'P5.js', 'WebSockets', 'NodeJS'],
            'image' => '/images/courses/cffc6424ce-vue.png',
            'lessons' => [
                [
                    'available_at' => '2026-01-26 14:00:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-02 14:00:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-09 14:00:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-16 14:00:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-23 14:00:00',
                    'title' => 'Lesson 5',
                ],
                [
                    'available_at' => '2026-03-02 14:00:00',
                    'title' => 'Lesson 6',
                ],
                [
                    'available_at' => '2026-03-09 14:00:00',
                    'title' => 'Lesson 7',
                ],
                [
                    'available_at' => '2026-03-16 14:00:00',
                    'title' => 'Lesson 8',
                ],
                [
                    'available_at' => '2026-03-23 14:00:00',
                    'title' => 'Lesson 9',
                ],
                [
                    'available_at' => '2026-03-30 14:00:00',
                    'title' => 'Lesson 10',
                ],
                [
                    'available_at' => '2026-04-06 14:00:00',
                    'title' => 'Lesson 11',
                ],
                [
                    'available_at' => '2026-04-13 14:00:00',
                    'title' => 'Lesson 12',
                ],
                [
                    'available_at' => '2026-04-20 14:00:00',
                    'title' => 'Lesson 13',
                ],
            ],
        ],
        'super-bomberman' => [
            'title' => 'Super Bomberman Game',
            'synopsis' => 'Build a multi-player version of the classic Bomberman game.',
            'description' => 'Create an explosive multiplayer Bomberman game using Lua and WebSockets. Learn game physics, collision detection, power-up systems, and real-time multiplayer game mechanics.',
            'bullets' => [
                'game physics and collision detection',
                'handling power-up systems',
                'multiplayer game mechanics',
                'Lua programming for games',
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
                'real-time player synchronization',
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
                'modern chat UI design',
            ],
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'NodeJS', 'HTML / Tailwind CSS', 'WebSockets'],
            'image' => '/images/courses/kuu-akura-pnK6Q-QTHM4-unsplash.jpg',
        ],

        'battle-zone' => [
            'title' => 'Battle Zone Game',
            'synopsis' => 'Create a 3D Battle Zone game using Babylon.js.',
            'description' => 'Build an immersive 3D tank battle game using Babylon.js. Master 3D graphics programming, physics simulation, camera controls, and advanced game mechanics in a web-based 3D environment.',
            'bullets' => [
                '3D graphics with Babylon.js',
                'physics simulation in 3D',
                'managing 3D camera controls',
                'building immersive environments',
            ],
            'level' => 'Advanced',
            'tutor' => 'Sharif Khan',
            'skills' => ['Babylon.js'],
            'image' => '/images/courses/paul-pastourmatzis-5FGsEWRn2NQ-unsplash.jpg',
            'lessons' => [
                [
                    'available_at' => '2026-01-26 15:30:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-02 15:30:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-09 15:30:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-16 15:30:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-23 15:30:00',
                    'title' => 'Lesson 5',
                ],
                [
                    'available_at' => '2026-03-02 15:30:00',
                    'title' => 'Lesson 6',
                ],
                [
                    'available_at' => '2026-03-09 15:30:00',
                    'title' => 'Lesson 7',
                ],
                [
                    'available_at' => '2026-03-16 15:30:00',
                    'title' => 'Lesson 8',
                ],
                [
                    'available_at' => '2026-03-23 15:30:00',
                    'title' => 'Lesson 9',
                ],
                [
                    'available_at' => '2026-03-30 15:30:00',
                    'title' => 'Lesson 10',
                ],
                [
                    'available_at' => '2026-04-06 15:30:00',
                    'title' => 'Lesson 11',
                ],
                [
                    'available_at' => '2026-04-13 15:30:00',
                    'title' => 'Lesson 12',
                ],
                [
                    'available_at' => '2026-04-20 15:30:00',
                    'title' => 'Lesson 13',
                ],
            ],
        ],
    ],

    'months' => [
        [
            'started_at' => '2026-01-01',
            'fee' => 100,
        ],
        [
            'started_at' => '2026-02-01',
            'fee' => 2900,
        ],
        [
            'started_at' => '2026-03-01',
            'fee' => 2900,
        ],
        [
            'started_at' => '2026-04-01',
            'fee' => 2900,
        ],
        [
            'started_at' => '2026-05-01',
            'fee' => 2900,
        ],
        [
            'started_at' => '2026-06-01',
            'fee' => 2900,
        ],
        [
            'started_at' => '2026-07-01',
            'fee' => 900,
        ],
        [
            'started_at' => '2026-08-01',
            'fee' => 900,
        ],
        [
            'started_at' => '2026-09-01',
            'fee' => 2900,
        ],
        [
            'started_at' => '2026-10-01',
            'fee' => 2900,
        ],
        [
            'started_at' => '2026-11-01',
            'fee' => 2900,
        ],
        [
            'started_at' => '2026-12-01',
            'fee' => 900,
        ],
    ],

];
