<?php
class BlogTableSeeder extends Seeder {

    public function run()
    {
        $now = Carbon\Carbon::now();
        Blog::insert(array(
                        'user_id'=>1,
                        'parent_id'=>0,
                        'name'=>'Blog1',
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        ));
        Blog::insert(array(
                        'user_id'=>1,
                        'parent_id'=>0,
                        'name'=>'Blog2',
                        'created_at'=>$now,
                        'updated_at'=>$now,
                        )
        );

    }
}
