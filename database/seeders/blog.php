<?php

namespace Database\Seeders;

use App\Models\blog as ModelsBlog;
use DeepCopy\f008\B;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class blog extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsBlog::factory(10)->create();
    }
}
