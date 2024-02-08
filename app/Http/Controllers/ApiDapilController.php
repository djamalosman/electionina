<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\DapilModel;
use App\Models\KecamatanModel;
use App\Models\DesaModel;
use App\Models\RtrwModel;
use App\Models\TpsModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon; 
class ApiDapilController extends Controller
{
 
    /**
     * @OA\Info(
     *    title="Your super Application API",
     *    version="1.0.0",
     * )
     * @OA\Get(
     *     path="/dapil",
     *     summary="Get Dapil",
     *     tags={"Authentication"},
     *     @OA\Response(response="200", description="Successful retrieval of Dapil data"),
     *     @OA\Response(response="401", description="Unauthorized"),
     * )
     */
    public function dapil()
    {
        try {
            $data = DB::table('dapil')
                ->select('dapil.id as id_dapil', 'dapil.provinsi as namaProvinsi')
                ->orderBy('dapil.updated_at', 'desc')
                ->get();

            $result = [];

            // Jika Anda ingin mengakses data dari semua baris
            foreach ($data as $row) {
                $result[] = [
                    'id_dapil' => $row->id_dapil,
                    'provinsi' => $row->namaProvinsi
                ];
            }

            return response()->json(['data' => $result], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
    /**
     * @OA\Info(
     *    title="Your super Application API",
     *    version="1.0.0",
     * )
     * @OA\Get(
     *     path="/kota",
     *     summary="Get kota",
     *     tags={"Dapil"},
     *     @OA\Response(response="200", description="Successful retrieval of Dapil data"),
     *     @OA\Response(response="401", description="Unauthorized"),
     * )
     */
    public function kota()
    {
        try {
            $data = DB::table('dapil')
                ->select('dapil.id as id_dapil','dapil.kota_kabupaten as namaKota')
                ->orderBy('dapil.updated_at', 'desc')
                ->get();

            $result = [];

            // Jika Anda ingin mengakses data dari semua baris
            foreach ($data as $row) {
                $result[] = [
                    'id_dapil' => $row->id_dapil,
                    'kota_kabupaten' => $row->namaKota,
                ];
            }

            return response()->json(['data' => $result], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
        * @OA\Info(
        *    title="Your super  ApplicationAPI",
        *    version="1.0.0",
        * )
     * @OA\Post(
     *     path="   ",
     *     summary="insertDetailDapil",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"id_dapil"},
     *             @OA\Property(property="id_dapil", type="int", format="number", example="")
     *         )
     *     ), 
     *     @OA\Response(response="200", description="Successful loginmobile"),
     *     @OA\Response(response="401", description="Unauthorized"),
     * )
     */

    public function insertDetailDapil(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'idProv' => 'required|idProv'
            ]);
    
            // Validasi input
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }
    
            DB::beginTransaction();
    
            $image = DetailDapilModel::create([
                'id_user' => $request->id_user,
                'id_tps' => $request->id_tps,
                'id_rtrw' => $request->id_rtrw,
                'id_desa' => $request->id_desa,
                'id_kecamatan' => $request->id_kecamatan,
                'id_dapil' => $request->id_dapil,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'status_input' => 1,
            ]);

            // Add uploaded image details to the response data
            $uploadedImages[] = [
                'filename' => $image->image
            ];
    
            DB::commit();
    
            // Include uploaded image details in the response
            return response()->json(['message' => 'Image(s) successfully uploaded', 'uploaded_images' => $uploadedImages], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

}
