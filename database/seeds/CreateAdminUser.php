<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $user = User::updateOrCreate(['email' =>'daycith1@gmail.com'],[
            'name' => 'Jose',
            'email' => 'daycith1@gmail.com',
            'password' => app('hash')->make('Zaq12wsx!')
        ] );    
        
        $user->assignRole('Super Admin');
    }
}
