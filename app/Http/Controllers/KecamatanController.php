<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\KecamatanModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class KecamatanController extends Controller
{
    public function index()
    {
        $status = 1;
        $dapil =  DB::table('dapil')->select('dapil.id as dapilid','dapil.provinsi','dapil.kota_kabupaten')->get();
        $data = DB::table('kecamatan')
        ->join('dapil', 'dapil.id', '=', 'kecamatan.id_dapil')
        ->select('dapil.provinsi', 'dapil.kota_kabupaten','kecamatan.nama_kecamatan','kecamatan.id as idcamat','kecamatan.modified_by','kecamatan.updated_at')
        ->orderBy('kecamatan.updated_at', 'desc')
        ->get();
        return view('camat.index', compact('data','status','dapil'));
    }
    public function create(Request $request)
    {
        try {
            
            DB::beginTransaction();   
                
            KecamatanModel::create([
                'nama_kecamatan' => $request->camat,
                'id_dapil' => $request->iddapil,
                'created_by' => Auth::user()->name,
                'modified_by' => Auth::user()->name,
                'updated_at' => Carbon::now(),
                'created_at' =>Carbon::now(),
                'deletestatus' => 0,
            ]);
             
                DB::commit();
                return response()->json([
                    'url' => url('camat'),
                    'message' => 'Simpan Data Berhasil',
                    'status'=>200
                ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'url' => url('camat'),
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
