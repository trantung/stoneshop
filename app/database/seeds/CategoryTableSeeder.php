<?php
class CategoryTableSeeder extends Seeder {

    public function run()
    {
        $now = Carbon\Carbon::now();
        Category::insert(array(
                        'shop_id'=>1,
                        'parent_id'=>0,
                        'name'=>'Đá',
                        'description'=>'category không có sub',
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        ));

        Category::insert(array(
                        'shop_id'=>1,
                        'parent_id'=>0,
                        'name'=>'Kính',
                        'description'=>'category có sub',
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        ));

        Category::insert(array(
                        'shop_id'=>1,
                        'parent_id'=>2,
                        'name'=>'Kính mắt thời trang',
                        'description'=>'sub-cate',
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        ));
        Category::insert(array(
                        'shop_id'=>1,
                        'parent_id'=>2,
                        'name'=>'Kính thuốc',
                        'description'=>'sub cate kinh',
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        ));

    }
}
