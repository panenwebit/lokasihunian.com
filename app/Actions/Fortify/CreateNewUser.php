<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Profile;
use App\Models\Membership;
use App\Models\FollowUp;
use App\Models\UserActivity;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'username'  => ['required', 'string', 'max:255', 'unique:users'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => $this->passwordRules(),
        ])->validate();

        $justCreatedUser =  User::create([
            'username'  => strtolower($input['username']),
            'email'     => strtolower($input['email']),
            'password'  => Hash::make($input['password']),
        ]);

        $FollowUp = FollowUp::where('email', strtolower($input['email']))->where('email_registered', 'no')->get();
        if($FollowUp){
            $FollowUp = FollowUp::where('email', strtolower($input['email']))->where('email_registered', 'no')
            ->update(['email_registered'=>'yes', 'updated_at'=>date('Y-m-d H:i:s')]);
        }
        
        Profile::create([
            'username'          => strtolower($input['username']),
            'fullname'          => '',
            'photo'             => asset('assets/img/agen/user_default.png'),
            'address'           => '',
            'handphone_number'  => '',
            'wa_number'         => '',
            'about_me'          => '',
            'address_location'  => '',
        ]);

        $role = array($input['reg_as']);
        $justCreatedUser->syncRoles([$role]);

        Membership::create([
            'username'   => strtolower($input['username']),
            'package_id' => '1'
        ]);

        UserActivity::create([
            'do'    => 'Register',
            'description'      => 'Pendaftaran akun sebagai '.$input['reg_as'].' dengan username '.strtolower($input['username']),
            'route'        => '/register',
            'username'      => strtolower($input['username'])
        ]);

        return $justCreatedUser;
    }
}
