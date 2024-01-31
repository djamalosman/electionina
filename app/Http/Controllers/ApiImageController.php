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
 * @OA\Post(
 *     path="/api/uploadimage",
 *     summary="Image Upload",
 *     tags={"Authentication"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 
 *                 @OA\Property(
 *                     property="photos",
 *                     type="array",
 *                     @OA\Items(
 *                         type="object",
 *                         @OA\Property(
 *                             property="photo",
 *                             type="string",
 *                             format="base64",
 *                         ),
 *                         @OA\Property(
 *                             property="filename",
 *                             type="string",
 *                         ),
 *                     ),   
 *                 ),
 *             )
 *         )
 *     ),
 *     @OA\Response(response="200", description="Image successfully uploaded"),
 *     @OA\Response(response="400", description="Bad Request"),
 * )
 */

public function uploadImage(Request $request)
{   
    try {
        $validator = Validator::make($request->all(), [
            'id_user' => 'required|integer',
            'id_tps' => 'required|integer',
            'photos' => 'required|array',
            'photos.*.photo' => 'required|string',
            'photos.*.filename' => 'required|string',
        ]);

        // Validasi input
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        DB::beginTransaction();

        foreach ($request->photos as $photo) {
            $imageData = base64_decode($photo['photo']);
            $imageName = $photo['filename'];

            // Save the image to a desired directory (you may need to adjust the path)
            $path = storage_path("app/public/images/$imageName");
            file_put_contents($path, $imageData);

            ImageModel::create([
                'image' => $path,
                'id_user' => $request->id_user,
                'id_tps' => $request->id_tps,
                'created_by' => Auth::user()->name,
                'modified_by' => Auth::user()->name,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'deletestatus' => 0,
            ]);
        }

        DB::commit();
        return response()->json(['message' => 'Image(s) successfully uploaded'], 200);
    } catch (\Throwable $th) {
        DB::rollBack();
        dd($th);
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}


}
