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
	'quickadmin_title' => 'Bookquizz Admin Panel v1',
];