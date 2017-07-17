<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'name' => 'pagination-product',
                'title' => 'pagination product',
                'value' => '4',
                'description' => 'paginate for hot product',
                'validate_rule' => 'numeric|required',
            ],
            [
                'name' => 'paginate-blog',
                'title' => 'paginate blog',
                'value' => '2',
                'description' => 'paginate for blog',
                'validate_rule' => 'numeric|required',
            ],
            [
                'name' => 'paginate-search',
                'title' => 'paginate search',
                'value' => '32',
                'description' => 'paginate for search',
                'validate_rule' => 'numeric|required',
            ]
        ]);
    }
}
