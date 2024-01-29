<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class ApiImageController extends Controller
{
   /**
     * @OA\Info(
     *    title="Your super ApplicationAPI",
     *    version="1.0.0",
     * )
     * @OA\Post(
     *     path="",
     *     summary="imageupload",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="id_user",
     *                     type="integer",
     *                      example="",
     *                 ),
     *                 @OA\Property(
     *                     property="id_tps",
     *                     type="integer",
     *                     example="",
     *                 ),
     *                 @OA\Property(
     *                     property="image",
     *                     type="string",
     *                     format="binary",
     *                 ),
     *             )
     *         )
     *     ),
     *     @OA\Response(response="200", description="Successful login"),
     *     @OA\Response(response="401", description="Unauthorized"),
     * )
     */
    public function Uploadimage(Request $request)
    {
        
        try {
                $validator = Validator::make($request->all(), [
                    'image' => 'required|image',
                    'id_tps' => 'id_tps',
                    'id_user' => 'id_user',
                ]);
                
                // Validasi input
                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()], 400);
                }
                DB::beginTransaction();   
                        
                    ImageModel::create([
                        'image' => $request->image,
                        'id_user' => $request->id_user,
                        'id_tps' => $request->id_tps,
                        'created_by' => Auth::user()->name,
                        'modified_by' => Auth::user()->name,
                        'updated_at' => Carbon::now(),
                        'created_at' =>Carbon::now(),
                        'deletestatus' => 0,
                    ]);
                    DB::commit();
                    return response()->json(['message' => 'Simapan Image berhasil'], 200);
            }catch (\Throwable $th) {
                DB::rollBack();
                dd($th);
                return response()->json(['error' => $validator->errors()], 400);
            }
    }

}
