<?php

namespace App\Http\Responses;

use Laravel\Fortify\Fortify;
use App\Contracts\BaseResponse;

class SendEmailResponse implements BaseResponse
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
            'message' => 'email verification sent',
        ], 200)
        : back()->with('status', Fortify::VERIFICATION_LINK_SENT);
    }
}
