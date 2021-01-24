<?php

namespace Database\Seeders;

use App\Models\WordType;
use Illuminate\Database\Seeder;

class WordTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WordType::insert([
            ['name' => 'noun'],
            ['name' => 'pronoun'],
            ['name' => 'verb'],
            ['name' => 'adjective'],
            ['name' => 'adverb'],
            ['name' => 'preposition'],
            ['name' => 'conjunction'],
            ['name' => 'interjection'],
        ]);
    }
}
