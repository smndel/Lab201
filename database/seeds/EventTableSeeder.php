<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
         ['value'=>'2300', 'start_date'=>'2017-10-12', 'end_date'=>'2017-09-15'],
         ['value'=>'200', 'start_date'=>'2017-10-13', 'end_date'=>'2017-09-25'],
         ['value'=>'3000', 'start_date'=>'2017-09-23', 'end_date'=>'2017-09-24'],
         ['value'=>'230', 'start_date'=>'2017-09-19', 'end_date'=>'2017-09-27'],
        ];
        \DB::table('events')->insert($data);
    }
}
