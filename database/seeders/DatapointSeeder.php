<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatapointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datapoints')->truncate();
        $json = File::get("database/data/datapoints.json");
        $data = json_decode($json);
    
        foreach ($data as $obj) {
            
            DB::table('datapoints')->insert(array(
                'name' => $obj->name,
                /* 'question' => $obj->question, */
                'category_id' => $obj->category_id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ));
        }
    }
}
