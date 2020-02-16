<?php
$config = [
        'add_articles' => [
					                [
					                        'field' => 'title',
					                        'label' => 'Article Title',
					                        'rules' => 'required|alpha',
					                ],
					                [
					                        'field' => 'body',
					                        'label' => 'Article Description',
					                        'rules' => 'required',
					                ]
                
                ],
         'admin_login'  		=>[
         							[
         								'field' => 'username',
					                        'label' => 'Name',
					                        'rules' => 'required|alpha',
         							],
         							[
         								'field' => 'password',
					                        'label' => 'Enter Password',
					                        'rules' => 'required',
         							],

         						]
        ];
?>