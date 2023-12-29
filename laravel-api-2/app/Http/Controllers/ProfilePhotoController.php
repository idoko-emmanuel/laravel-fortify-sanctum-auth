<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfilePhotoRequest;
use App\Actions\Profile\DeleteProfilePhoto;
use App\Actions\Profile\UpdateProfilePhoto;
use App\Http\Responses\DeletePhotoResponse;
use App\Http\Responses\UpdatePhotoResponse;


class ProfilePhotoController extends Controller
{
    /**
     * Update the user's profile photo.
     *
     * @param  \App\Http\Requests\ProfilePhotoRequest  $request
     * @param  \App\Actions\Profile\UpdateProfilePhoto  $updater
     * @return \App\Http\Responses\UpdatePhotoResponse
     */
    public function update(ProfilePhotoRequest $request, UpdateProfilePhoto $updater) : UpdatePhotoResponse
    {
        $updater->update($request->user(), $request->all());

        return app(UpdatePhotoResponse::class);

    }

    /**
     * Delete the user's profile photo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actions\Profile\DeleteProfilePhoto  $updater
     * @return \App\Http\Responses\DeletePhotoResponse
     */
    public function delete(Request $request, DeleteProfilePhoto $updater) : DeletePhotoResponse
    {
        $updater->delete($request->user());

        return app(DeletePhotoResponse::class);

    }
}
