<?php
class ShopTableSeeder extends Seeder {

    public function run()
    {
        $now = Carbon\Carbon::now();
        Shop::insert(array(
                        'user_id'=>1,
                        'name'=>'Shop bán đá phong thuỷ',
                        'description'=>'Bán đá phong thuỷ, đá quý',
                        'address'=>'Thanh Nhàn, Hà Nội',
                        'tel'=>'094-999-8587',
                        'mobile'=>'094-999-8587',
                        'image_url'=>'',
                        'lat'=>'20',
                        'long'=>'30',
                        'created_at'=>$now,
                        'updated_at'=>$now,

                        ));

    }
}