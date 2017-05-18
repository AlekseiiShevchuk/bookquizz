<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',			'device-id' => 'Device id',		],	],
		'books' => [		'title' => 'Books',		'created_at' => 'Time',		'fields' => [			'book-code' => 'Book code',			'author' => 'Author',			'title' => 'Title',			'description' => 'Description',			'images' => 'Images',		],	],
		'interviews' => [		'title' => 'Interviews',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'description' => 'Description',			'book' => 'Book',		],	],
		'interview-answers' => [		'title' => 'Interview answers',		'created_at' => 'Time',		'fields' => [			'text' => 'Text',			'interview' => 'Interview',		],	],
		'tests' => [		'title' => 'Tests',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'description' => 'Description',			'book' => 'Book',		],	],
		'test-answers' => [		'title' => 'Test answers',		'created_at' => 'Time',		'fields' => [			'text' => 'Text',			'test' => 'Test',			'is-correct' => 'Is this answer correct?',		],	],
		'user-test-answers' => [		'title' => 'User test answers',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'test-answer' => 'Test answer',			'test' => 'Test',		],	],
		'user-interview-answers' => [		'title' => 'User interview answers',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'interview-answer' => 'Interview answer',			'interview' => 'Interview',		],	],
	'qa_save' => 'Išsaugoti',
	'qa_update' => 'Atnaujinti',
	'qa_list' => 'Sąrašas',
	'qa_no_entries_in_table' => 'Įrašų nėra.',
	'qa_create' => 'Sukurti',
	'qa_edit' => 'Redaguoti',
	'qa_view' => 'Peržiūrėti',
	'custom_controller_index' => 'Papildomo Controller\'io puslapis.',
	'qa_logout' => 'Atsijungti',
	'qa_add_new' => 'Pridėti naują',
	'qa_are_you_sure' => 'Ar esate tikri?',
	'qa_back_to_list' => 'Grįžti į sąrašą',
	'qa_dashboard' => 'Pagrindinis',
	'qa_delete' => 'Trinti',
	'quickadmin_title' => 'Bookquizz Admin Panel v1',
];