<?php

namespace Database\Seeders;
use App\Models\Tag;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel',
        ]);
        Tag::create([
            'name' => 'Docker',
            'slug' => 'docker',
        ]);
        Tag::create([
            'name' => 'Node.js',
            'slug' => 'node.js',
        ]);
    }
}
