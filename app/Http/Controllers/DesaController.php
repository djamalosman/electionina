<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\DesaModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class DesaController extends Controller
{
    public function index()
    {
        $status = 1;
        $camat =  DB::table('kecamatan')->select('kecamatan.id as camatid','kecamatan.nama_desa')->get();
        $data = DB::table('desa')
        ->join('kecamatan ', 'kecamatan.id', '=', 'desa.id_kecamatan')
        ->select('desa.nama_desa','kecamatan.nama_kecamatan','desa.id as iddesa')
        ->orderBy('desa.updated_at', 'desc')
        ->get();
        return view('desa.index', compact('data','status'.'user'));
    }
    public function create(Request $request)
    {
        try {
            
            DB::beginTransaction();   
                
            KecamatanModel::create([
                'nama_desa' => $request->camat,
                'id_kecamatan' => $request->iddapil,
                'created_by' => Auth::user()->name,
                'modified_by' => Auth::user()->name,
                'updated_at' => Carbon::now(),
                'created_at' =>Carbon::now(),
                'deletestatus' => 0,
            ]);
             
                DB::commit();
                return response()->json([
                    'url' => url('desa'),
                    'message' => 'Simpan Data Berhasil',
                    'status'=>200
                ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'url' => url('desa'),
                'message' => $th->getMessage(),
                'status'=>400
            ]);
        }
    }
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $id=$request->idpartaix;
            $flight = PartaiModel::findOrFail($id);
            $flight->name_partai = $request->namepartaix;
            $flight->nomor_partai = $request->nomorpartaix;
            $flight->alamat = $request->alamatpartaix;
            $flight->created_by = Auth::user()->name;
            $flight->modified_by = Auth::user()->name;
            $flight->created_at = Carbon::now();
            $flight->updated_at = Carbon::now(); 

            $flight->save();

            DB::commit();

            return response()->json([
                'url' => url('partai'),
                'message' => 'Update Data Berhasil'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            //dd($th);
            return response()->json([
                'url' => url('partai'),
                'message' => 'Update Data Gagal!!'
            ]);
        }
    }
}
