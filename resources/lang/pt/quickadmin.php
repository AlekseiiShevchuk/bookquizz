<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',			'device-id' => 'Device id',		],	],
		'books' => [		'title' => 'Books',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',			'book-code' => 'Book code',			'author' => 'Author',			'description' => 'Description',			'front-cover' => 'Front cover',			'back-cover' => 'Back cover',			'extra-images' => 'Extra images',		],	],
		'quizzes' => [		'title' => 'Quizzes',		'created_at' => 'Time',		'fields' => [			'type' => 'Type (test or just interview)',			'question' => 'Question',			'description' => 'Description',			'book' => 'Book',		],	],
		'possible-answers' => [		'title' => 'Possible answers',		'created_at' => 'Time',		'fields' => [			'text' => 'Text',			'quiz' => 'Quiz',			'is-correct' => 'Is correct (if this is a test-quiz, you should choose at least one correct answer)',		],	],
		'user-answers' => [		'title' => 'User answers',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'user-answer' => 'User answer',			'quiz' => 'Quiz',		],	],
	'qa_create' => 'Criar',
	'qa_save' => 'Salvar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Visualizar',
	'qa_update' => 'Atualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sem entradas na tabela',
	'custom_controller_index' => 'Índice de Controller personalizado.',
	'qa_logout' => 'Sair',
	'qa_add_new' => 'Novo',
	'qa_are_you_sure' => 'Tem certeza?',
	'qa_back_to_list' => 'Voltar',
	'qa_dashboard' => 'Painel',
	'qa_delete' => 'Excluir',
	'quickadmin_title' => 'Bookquizz Admin Panel v2',
];