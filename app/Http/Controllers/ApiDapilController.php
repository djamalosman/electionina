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

}
