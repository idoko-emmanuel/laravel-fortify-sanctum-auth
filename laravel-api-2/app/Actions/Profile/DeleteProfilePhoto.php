<?php

namespace App\Actions\Profile;

use App\Contracts\BaseResponse;
use App\Models\User;

class DeleteProfilePhoto implements BaseResponse
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
