<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
class ObatController extends Controller
{
    function index(Request $request)
    {

        $data =  Obat::where('deletestatus', 0)->get();
        $status = 2;
        return view('obat.index', compact('data','status'));
    }

    public  function Obat()
    {

        try {

            $current_date_time = new DateTime();

            $date_sequence = $current_date_time->format("dmy");


            //section generate the sequence of running number of trip sheet

            $lastTransactionId = Obat::orderBy('id', 'desc')->first();


            if (!$lastTransactionId)
                // We get here if there is no TripSheet at all
                // If there is no Trip sheet number set it to 0, which will be 1 at the end.
                $number = 0;
            else

                $number = substr($lastTransactionId->code, 4);




            return "O-"  . sprintf('%04d', intval($number) + 1);
        } catch (\Exception $e) {
            dd($e);
        }
    }
    function create()
    {
        $status = 2;
        return view('obat.create',compact('status'));
    }


    public function store(Request $request)
    {
        
        try {
            DB::beginTransaction();
            $getNumber = $this->Obat();
            
            $validatedData = $request->validate([
                'name' => ['required', Rule::unique('m_obat', 'name')]

            ]);
            //dd($validatedData);
            if ($validatedData) {
                Obat::create([
                    'code' => $getNumber,
                    'name' => $request->name,
                    'brand' => $request->brand,
                    'category' => $request->category,
                    'satuan' => $request->satuan,
                    'description'=>$request->description,
                    'created_by' => Auth::user()->name,            
                    'deletestatus' => 0,
                    

                ]);
                DB::commit();
                return response()->json([
                    'url' => url('Obat'),
                    'status' => 200,
                    'message' => 'Simpan Data Berhasil'
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'url' => url('Obat'),
                'status' => 400,
                'message' => $th->getMessage()
            ]);
        }
    }




    function edit($id)
    {

        $data = Obat::find($id);
        $status = 2;
        return view('obat.edit',compact('data','status'));
    }



    public function update($id, Request $request)
    {
        
        try {
            DB::beginTransaction();
            //$getNumber = GenerateNumberHelpers::Obat();
            //$validatedData = $request->validate([
            //     'brand' => ['required', Rule::unique('m_obat', 'brand')]

            // ]);
            // if ($validatedData) {
                
                   
            // }
             $flight = Obat::find($id);
                    //$flight->code =$getNumber;
                    $flight->name = $request->name;
                    $flight->brand = $request->brand;
                    $flight->category = $request->category;
                    $flight->satuan = $request->satuan;
                    $flight->description=$request->description;
                    $flight->updated_by = Auth::user()->name; 
                    $flight->save();
                    DB::commit();
                    
                return response()->json([
                    'url' => url('Obat'),
                    'message' => 'Update Data Berhasil'
                ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            // return response()->json([
            //     'url' => url('Obat'),
            //     'message' => 'Update Data Gagal!!'
            // ]);
        }

    }

    public function delete($id)
    {

        $current_date = new DateTime();
        Obat::where('id', $id)
            ->update([
                'deletestatus' => 1,               
            ]);
        return response()->json([
            'status' => 200,
            'message' => 'Delete Data Successfully'
        ]);
    }

}
