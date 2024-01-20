<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
use Illuminate\Support\Facades\Hash;
class PasienController extends Controller
{
    function index(Request $request)
    {

        $data =  Pasien::where('deletestatus', 0)->get();
        $status = 3;
        return view('pasien.index', compact('data','status'));
    }


    function create()
    {
        $status = 3;
        return view('pasien.create',compact('status'));
    }

        public  function Pasien()
        {

            try {

                $current_date_time = new DateTime();

                $date_sequence = $current_date_time->format("dmy");


                //section generate the sequence of running number of trip sheet

                $lastTransactionId = Pasien::orderBy('id', 'desc')->first();


                if (!$lastTransactionId)
                    // We get here if there is no TripSheet at all
                    // If there is no Trip sheet number set it to 0, which will be 1 at the end.
                    $number = 0;
                else

                    $number = substr($lastTransactionId->code, 4);




                return "P-"  . sprintf('%04d', intval($number) + 1);
            } catch (\Exception $e) {
                dd($e);
            }
        }
    public function store(Request $request)
    {
    
        try {
            DB::beginTransaction();
            $getNumber = $this->Pasien();
            $validatedData = $request->validate([
                'name' => ['required', Rule::unique('m_pasien', 'name')]

            ]);
            if ($validatedData) {
                Pasien::create([
                    'code' => $getNumber,
                    'name' => $request->name,
                    'alamat' => $request->alamat,
                    'tempat' => $request->tempat,
                    'tgllahir' => $request->tgllahir,
                    'kota' => $request->kota,
                    'ktp' => $request->ktp,
                    'phone' => $request->phone,
                    'created_by' => Auth::user()->name,            
                    'deletestatus' => 0,

                ]);
                
                User::create([
                    'code_pasien' => $getNumber,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' =>Hash::make($request->password)
                ]);
             
                DB::commit();
                return response()->json([
                    'url' => url('Pasien'),
                    'message' => 'Simpan Data Berhasil',
                    'status'=>200
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'url' => url('Pasien'),
                'message' => $th->getMessage(),
                'status'=>400
            ]);
        }
    }




    function edit($id)
    {

        $data = Pasien::find($id);
        $user = User::where('code_pasien', $data->code)->first();
        //dd($user);
        $status = 3;
        return view('pasien.edit',compact('data','status','user'));
    }



    public function update($id,Request $request)
    {
        try {
            DB::beginTransaction();
            
            $flight = Pasien::find($id);
                    $flight->name = $request->name;
                    $flight->alamat = $request->alamat;
                    $flight->tempat = $request->tempat;
                    $flight->tgllahir = $request->tgllahir;
                    $flight->kota=$request->kota;
                    $flight->ktp=$request->ktp;
                    $flight->phone=$request->phone;
                    $flight->updated_by = Auth::user()->name; 
                    $flight->save();
            
            $user = User::where('code_pasien', $flight->code)->first();
            
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->password = Hash::make($request->password);
                    $user->save();
                DB::commit();
                return response()->json([
                    'url' => url('Pasien'),
                    'message' => 'Update Data Berhasil'
                ]);
           
        } catch (\Throwable $th) {
            DB::rollBack();
            //dd($th);
            return response()->json([
                'url' => url('Pasien'),
                'message' => 'Update Data Gagal!!'
            ]);
        }

    }

    public function delete($id)
    {

        $current_date = new DateTime();
        Pasien::where('id', $id)
            ->update([
                'deletestatus' => 1,               
            ]);
        return response()->json([
            'status' => 200,
            'message' => 'Delete Data Successfully'
        ]);
    }

}
