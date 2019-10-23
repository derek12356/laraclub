<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => 'Share',
                'description' => 'Share a story.',
            ],
            [
                'name'        => 'Tutorial',
                'description' => 'Development tutorials.',
            ],
            [
                'name'        => 'QA',
                'description' => 'Questions and answers.',
            ],
            [
                'name'        => 'Notice',
                'description' => 'Site notifications.',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}
