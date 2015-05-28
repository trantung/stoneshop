<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        $now = Carbon\Carbon::now();
        User::insert(array(
                        'first_name'=>'tran',
                        'last_name'=>'tung',
                        'email'=>'trantunghn196@gmail.com',
                        'password'=>Hash::make('123456'),
                        'facebook_id'=>'tran',
                        'role_id'=>'tran',
                        'created_at'=>$now,
                        'updated_at'=>$now,

                        ));

    }
}
