<?php

namespace App\Http\Controllers;

use App\Models\UserMobileModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon; 

class UserMobilelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $status = 1;
        
        $data = DB::table('usermobile')
        ->select('usermobile.name as usernameMobile','usermobile.email','usermobile.id as iduserMobile','usermobile.updated_at','usermobile.password')
        ->orderBy('usermobile.updated_at', 'desc')
        ->get();
        return view('usermobile.index', compact('data','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'email' => 'required',
                'password' => 'required'
            ]);
            DB::beginTransaction();   
                
            UserMobileModel::create([
                'name' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'updated_at' => Carbon::now(),
                'created_at' =>Carbon::now(),
                'deletestatus' => 0,

            ]);
             
                DB::commit();
                return response()->json([
                    'url' => url('usermobile'),
                    'message' => 'Simpan Data Berhasil',
                    'status'=>200
                ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'url' => url('usermobile'),
                'message' => $th->getMessage(),
                'status'=>400
            ]);
        }
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
            $validator = Validator::make($request->all(), [
                'iduserx' => 'required',
                'nameuserx' => 'required',
                'emailx' => 'required',
                'passwordx' => 'required'
            ]);
            DB::beginTransaction();
            $id = $request->iduserx;
            $flight = UserMobileModel::find($request->iduserx);
                        $flight->name = $request->nameuserx;
                        $flight->email = $request->emailx;
                        $flight->password = Hash::make($request->password);
                        $flight->created_at = Carbon::now();
                        $flight->updated_at = Carbon::now(); 
                        $flight->update();
                        DB::commit();
                        return response()->json([
                            'url' => url('usermobile'),
                            'message' => 'Update Data Berhasil',
                            'status'=>200
                        ]);
        }catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'url' => url('usermobile'),
                'message' => "Gagal Update Data",
                'status'=>400
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
