<?php

return [

    'users' => [
        [
            'name' => 'Sharif Khan',
            'email' => 'sharif.khan@stupidly.uk',
            'admin' => true,
            'email_verified_at' => true,
            'tutor' => [
                'title' => 'Web Developer',
                'bio' => 'Sharif has over 25 years of experience in the web development industry. He has worked for a variety of clients, from startups to large corporations, in many capacities. He is passionate about teaching and helping others learn to code, and has spent much of his time teaching home-educated children.',
                'links' => [
                    [
                        'name' => 'My Website',
                        'type' => 'url',
                        'value' => 'https://www.sharifkhan.co.uk',
                    ],
                    [
                        'name' => 'Email Me',
                        'type' => 'email',
                        'value' => 'sharif.khan@stupidly.uk',
                    ],
                    [
                        'name' => 'Phone Me',
                        'type' => 'phone',
                        'value' => '+447515382159',
                    ],
                    [
                        'name' => 'WhatsApp Me',
                        'type' => 'whatsapp',
                        'value' => '+447515382159',
                    ],
                ],
            ]
        ],
        [
            'name' => 'Test Student',
            'email' => 'sharif.khan@mac.com',
            'email_verified_at' => true,
        ],
        [
            'name' => 'Free Student',
            'email' => 'sharif.khan@gmail.com',
            'email_verified_at' => true,
            'free' => true,
        ],
    ],

    'skills' => [
        'HTML / CSS',
        'HTML / Tailwind CSS',
        'VueJS',
        'P5.js',
    ],

    'courses' => [
        'flappy-bird' => [
            'title' => 'Flappy Bird Game',
            'synopsis' => 'Build a classic Flappy Bird game Scratch.',
            'description' => 'Learn the fundamentals of game development by recreating the classic Flappy Bird game. You\'ll learn game state management and interactive UI design while building a fully functional fun game.',
            'bullets' => [
                'how to code visually',
                'what a constant is, and what a variable is',
                'the basics of computer logic',
                'what a condition is and the different ways to code it',
                'how to import and use images in Scratch'
            ],
            'requirements' => [
                'use a computer with a keyboard and mouse',
                'have access to the website scratch.mit.edu',
            ],
            'level' => 'Scratch',
            'tutor' => 'Sharif Khan',
            'skills' => ['Scratch'],
            'image' => '/images/courses/flappy.jpeg',
            'preview' => '',
            
        ],
        'tic-tac-toe' => [
            'title' => 'Tic Tac Toe Game',
            'synopsis' => 'Build a classic Tic Tac Toe game using VueJS, HTML, and CSS.',
            'description' => 'Learn the fundamentals of game development by recreating the classic Tic Tac Toe game. You\'ll master VueJS components, game state management, and interactive UI design while building a fully functional two-player game.',
            'bullets' => [
                'what a constant is, and what a variable is',
                'the basics of computer logic',
                'what a condition is and the different ways to code it',
                'how to import and use images'
            ],
            'requirements' => [
                'use a computer with a keyboard and mouse',
                'have access to the website play.vuejs.org',
            ],
            'level' => 'Beginner',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / CSS'],
            'image' => '/images/courses/solstice-hannan--yhBOqHOr0c-unsplash.jpg',
            'preview' => 'https://www.youtube.com/embed/aqz-KE-bpKQ?si=byy4vWLPje2zWu5F',
            'lessons' => [
                [
                    'available_at' => '2026-01-26 13:30:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-02 13:30:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-09 13:30:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-16 13:30:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-23 13:30:00',
                    'title' => 'Lesson 5',
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
                'how to import and use images'
            ],
            'requirements' => [
                'use a computer with a keyboard and mouse',
                'have access to the website play.vuejs.org',
            ],
            'level' => 'Beginner',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / CSS'],
            'image' => '/images/courses/k8-B8e8PAJ9JRM-unsplash.jpg',
            'lessons' => [
                [
                    'available_at' => '2026-01-28 13:30:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-04 13:30:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-11 13:30:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-18 13:30:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-25 13:30:00',
                    'title' => 'Lesson 5',
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
            'requirements' => [
                'use a computer with a keyboard and mouse',
                'download and install a code editor',
                'download and install Node.js',
            ],
            'level' => 'Intermediate',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'P5.js', 'HTML / Tailwind CSS'],
            'image' => '/images/courses/SpaceshipFormation.gif',
            'lessons' => [
                [
                    'available_at' => '2026-01-26 15:00:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-02 15:00:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-09 15:00:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-16 15:00:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-23 15:00:00',
                    'title' => 'Lesson 5',
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
            'requirements' => [
                'use a computer with a keyboard and mouse',
                'download and install a code editor',
                'download and install Node.js and related tools',
            ],
            'level' => 'Intermediate',
            'tutor' => 'Sharif Khan',
            'skills' => ['VueJS', 'HTML / Tailwind CSS'],
            'image' => '/images/courses/tom-m-UWh8vs4ZMMM-unsplash.jpg',
            'lessons' => [
                [
                    'available_at' => '2026-01-28 15:00:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-04 15:00:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-11 15:00:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-18 15:00:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-25 15:00:00',
                    'title' => 'Lesson 5',
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
            'requirements' => [
                'use a computer with a keyboard and mouse',
                'download and install a code editor',
                'download and install Node.js and related tools',
                'download and install Laravel and related tools',
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
            // 'lessons' => [
            //     [
            //         'available_at' => '2026-01-29 09:30:00',
            //         'title' => 'Lesson 1',
            //     ],
            //     [
            //         'available_at' => '2026-02-05 09:30:00',
            //         'title' => 'Lesson 2',
            //     ],
            //     [
            //         'available_at' => '2026-02-12 09:30:00',
            //         'title' => 'Lesson 3',
            //     ],
            //     [
            //         'available_at' => '2026-02-19 09:30:00',
            //         'title' => 'Lesson 4',
            //     ],
            //     [
            //         'available_at' => '2026-02-26 09:30:00',
            //         'title' => 'Lesson 5',
            //     ],
            // ],
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
            'lessons' => [
                [
                    'available_at' => '2026-01-29 09:30:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-05 09:30:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-12 09:30:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-19 09:30:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-26 09:30:00',
                    'title' => 'Lesson 5',
                ],
            ],
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
                    'available_at' => '2026-01-29 11:00:00',
                    'title' => 'Lesson 1',
                ],
                [
                    'available_at' => '2026-02-05 11:00:00',
                    'title' => 'Lesson 2',
                ],
                [
                    'available_at' => '2026-02-12 11:00:00',
                    'title' => 'Lesson 3',
                ],
                [
                    'available_at' => '2026-02-19 11:00:00',
                    'title' => 'Lesson 4',
                ],
                [
                    'available_at' => '2026-02-26 11:00:00',
                    'title' => 'Lesson 5',
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
    ],

];
