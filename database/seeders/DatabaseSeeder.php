<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Arturo Quiros',
            'username' => 'R2D2',
        ]);
        
        Post::factory(10)->create([
            'user_id' => $user->id,
        ]);
    }
}