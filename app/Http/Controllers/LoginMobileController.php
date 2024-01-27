<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class LoginMobileController extends Controller
{
    /**
        * @OA\Info(
        *    title="Your super  ApplicationAPI",
        *    version="1.0.0",
        * )
     * @OA\Post(
     *     path="/api/loginmobile",
     *     summary="logins",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email", example=""),
     *             @OA\Property(property="password", type="string", format="password", example="")
     *         )
     *     ), 
     *     @OA\Response(response="200", description="Successful loginmobile"),
     *     @OA\Response(response="401", description="Unauthorized"),
     * )
     */
    public function loginmobile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
        // Cek data di database

        $user = User::where('email', $request->email)->first();
        if (!$user || Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }else {
            return response()->json(['message' => 'Login successful'], 200);
        }
    }
}
