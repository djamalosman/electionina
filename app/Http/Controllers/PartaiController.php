<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\PartaiModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class PartaiController extends Controller
{
    public function index()
    {
        $status = 1;
        $data=PartaiModel::where('deletestatus', 0)->get();
        return view('partai.index', compact('data','status'));
    }
    public function create(Request $request)
    {
        try {
            
            DB::beginTransaction();   
                
            PartaiModel::create([
                'name_partai' => $request->namepartai,
                'nomor_partai' => $request->nomorpartai,
                'alamat' => $request->alamatpartai,
                'created_by' => Auth::user()->name,
                'modified_by' => Auth::user()->name,
                'updated_at' => Carbon::now(),
                'created_at' =>Carbon::now(),
                'deletestatus' => 0,
            ]);
             
                DB::commit();
                return response()->json([
                    'url' => url('partai'),
                    'message' => 'Simpan Data Berhasil',
                    'status'=>200
                ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'url' => url('partai'),
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
