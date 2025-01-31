<?php
namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validate the input fields
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'salary_ref_number' => ['required', 'integer'],
            'gender' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();



        // Create the user with the provided input
        return User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'salary_ref_number' => $input['salary_ref_number'],
            'gender' => $input['gender'],
            'dob' => $input['dob'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'profile_photo_path' => $input['profile_photo_path'] ?? null,
            'department_id' => $input['department_id'] ?? null,
            'supervisor_id' => $input['supervisor_id'] ?? null,
        ])->assignRole('staff');



    }
}
