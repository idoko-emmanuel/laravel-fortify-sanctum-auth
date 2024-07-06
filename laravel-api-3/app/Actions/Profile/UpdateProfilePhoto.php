<?php

namespace App\Actions\Profile;

use App\Models\User;
use App\Contracts\UpdatesUserPhoto;
use Illuminate\Support\Facades\Validator;

class UpdateProfilePhoto implements UpdatesUserPhoto
{
    /**
     * Validate and update the given user's photo.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validate();

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }
    
    }
}
