<?php

namespace App\Http\Responses;

use App\Contracts\BaseResponse;

class UpdatePhotoResponse implements BaseResponse
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        return $request->wantsJson()
                    ? response()->json([
                        'message' => 'Profile photo updated',
                    ], 200)
                    : back()->with('status', 'profile photo updated');
    }
}
