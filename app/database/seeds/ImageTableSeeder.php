<?php
class ImageTableSeeder extends Seeder {

    public function run()
    {
        $now = Carbon\Carbon::now();
        Image::insert(array(
                        'type'=>1,
                        'description'=>'Bán đá phong thuỷ, đá quý',
                        'image_url'=>'download.jpeg',
                        'status' =>1,
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        ));
        Image::insert(array(
                        'type'=>2,
                        'description'=>'Bán đá phong thuỷ, đá quý',
                        'image_url'=>'download.jpeg',
                        'status' =>1,
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        ));
        Image::insert(array(
                        'type'=>3,
                        'description'=>'Bán đá phong thuỷ, đá quý',
                        'image_url'=>'download.jpeg',
                        'status' =>1,
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        ));

    }
}
