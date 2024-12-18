<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // array toDo in inglese con description
        $toDos = [
            [
                'user_id' => 1,
                'description' => 'Go to the gym',
            ],
            [
                'user_id' => 1,
                'description' => 'Buy groceries',
                'status' => 'pending'
            ],
            [
                'user_id' => 1,
                'description' => 'Call mom',
                'status' => 'pending',
            ],
            [
                'user_id' => 1,
                'description' => 'Call dad',
                'status' => 'pending',
            ],
            [
                'user_id' => 1,
                'description' => 'Call grandma',
                'status' => 'pending',
            ]
        ];

        foreach ($toDos as $todo) {
            $newToDo = new Todo();
            $newToDo->fill($todo);
            $newToDo->save();
        }
    }
}
