<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
    	$this->call(ServiceTableSeeder::class);
    	$this->call(PartnerTableSeeder::class);
        $this->call(ActualityTableSeeder::class);
        $this->call(ApplicantTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(AccreditationTableSeeder::class);
        $this->call(ReferenceTableSeeder::class);
        
    }
}
