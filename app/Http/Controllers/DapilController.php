<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\TpsModel;
use App\Models\User;
use App\Models\RtrwModel;
use App\Models\DapilModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class DapilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = 1;
        $data=DapilModel::where('deletestatus', 0)->get();
        return view('dapil.index', compact('data','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            
            DB::beginTransaction();   
                
            DapilModel::create([
                'provinsi' => $request->nameprov,
                'kota_kabupaten' => $request->namekk,
                'created_by' => Auth::user()->name,
                'modified_by' => Auth::user()->name,
                'updated_at' => Carbon::now(),
                'created_at' =>Carbon::now(),
                'deletestatus' => 0,
            ]);
             
                DB::commit();
                return response()->json([
                    'url' => url('dapil'),
                    'message' => 'Simpan Data Berhasil',
                    'status'=>200
                ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'url' => url('dapil'),
                'message' => $th->getMessage(),
                'status'=>400
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            $id=$request->iddapils;
            $flight = DapilModel::findOrFail($id);
            $flight->provinsi = $request->nameprovs;
            $flight->kota_kabupaten = $request->namekk;
            $flight->created_by = Auth::user()->name;
            $flight->modified_by = Auth::user()->name;
            $flight->created_at = Carbon::now();
            $flight->updated_at = Carbon::now(); 

            $flight->save();

            DB::commit();

            return response()->json([
                'url' => url('dapil'),
                'message' => 'Update Data Berhasil'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            //dd($th);
            return response()->json([
                'url' => url('dapil'),
                'message' => 'Update Data Gagal!!'
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
