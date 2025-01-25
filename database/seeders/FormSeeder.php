<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $form = Form::create([
            'title' => 'Contact Form'
        ]);

        $fields = [
            [
                'type' => 'text',
                'name' => 'name',
                'label' => 'Name',
                'placeholder' => 'Enter your name',
                'required' => true,
                'validation_rules' => [
                    'minLength' => 3
                ]
            ],
            [
                'type' => 'email',
                'name' => 'email',
                'label' => 'Email',
                'placeholder' => 'Enter your email',
                'required' => true,
                'validation_rules' => [
                    'pattern' => '^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$'
                ]
            ],
            [
                'type' => 'textarea',
                'name' => 'message',
                'label' => 'Message',
                'placeholder' => 'Enter your message',
                'required' => true,
                'validation_rules' => [
                    'minLength' => 10,
                    'maxLength' => 500
                ]
            ]
        ];

        foreach ($fields as $field) {
            $form->fields()->create($field);
        }
    }
}
