<?php

namespace App\Actions\Profile;

use App\Contracts\DeleteUserPhoto;
use App\Models\User;

class DeleteProfilePhoto implements DeleteUserPhoto
{
    /**
     * delete the given user's photo.
     *
     * @param  array<string
     */
    public function delete(User $user): void
    {
        $user->deleteProfilePhoto();
    
    }
}
