<?php
class BlogDescriptionTableSeeder extends Seeder {

    public function run()
    {
        $now = Carbon\Carbon::now();
        BlogDescription::insert(
                        array(
                        'user_id'=>1,
                        'title'=>'title1'
                        'description'=>'day la chi tiet blog so 1 cua group1',
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        ));
        BlogDescription::insert(
                        array(
                        'user_id'=>1,
                        'title'=>'title2'
                        'description'=>'day la chi tiet blog so 2 cua group1',
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        ));
        BlogDescription::insert(
                        array(
                        'user_id'=>2,
                        'title'=>'title3'
                        'description'=>'day la chi tiet blog so 1 cua group2',
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        )
        );

    }
}
