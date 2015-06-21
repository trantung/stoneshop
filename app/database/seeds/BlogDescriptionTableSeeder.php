<?php
class BlogDescriptionTableSeeder extends Seeder {

    public function run()
    {
        $now = Carbon\Carbon::now();
        BlogDescription::insert(
                        array(
                        'user_id'=>1,
                        'title'=>'title1',
                        'description'=>'day la chi tiet blog so 1 cua group1',
                        'created_at'=>$now,
                        'updated_at'=>$now
                        ));

    }
}
