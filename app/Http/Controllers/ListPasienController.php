<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Schedule;
use App\Models\ScheduleDetail;
use App\Models\DetailObat;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
use Validator;
use DateTimeZone;
class ListPasienController extends Controller
{
    function index(Request $request)
    {
       
        
        $status = 4;
        // $data = Schedule::join('m_pasien', 'm_pasien.id', '=', 't_schedule.id_pasien')
        //       ->leftJoin('t_schedule_detail', 't_schedule_detail.transactionnumber', '=', 't_schedule.transactionnumber')
        //       ->leftJoin('m_obat', 'm_obat.id', '=', 't_schedule_detail.id_obat')
        //       ->where('t_schedule.deletestatus', 0)
        //       ->where('m_pasien.code',Auth::user()->code_pasien)
        //       ->get(['t_schedule.id','t_schedule.transactionnumber','m_pasien.name','t_schedule.description','m_obat.name as obatname',
        //               't_schedule_detail.datepagi','t_schedule_detail.datesiang','t_schedule_detail.datemalam','Qty_hari'
        //     ]);

            $detail = DB::select("
            SELECT abc.* from (SELECT a.id,m_pasien.name as pasien,a.transactionnumber,a.stardate,a.enddate,a.datepagi AS jam,
            obat.id AS id_obat,obat.name AS obat_name,a.Qty_hari as qty FROM t_schedule_detail a
            LEFT JOIN t_schedule AS b ON a.transactionnumber  =b.transactionnumber
            LEFT JOIN m_obat AS obat ON a.id_obat  =obat.id
            LEFT JOIN m_pasien on b.id_pasien=m_pasien.id
            WHERE m_pasien.code = '".Auth::user()->code_pasien."' AND a.datepagi != '00:00:00'
            
            UNION ALL
            
            SELECT  a.id,m_pasien.name as pasien, a.transactionnumber,a.stardate,a.enddate,a.datesiang AS jam,obat.id AS id_obat,obat.name AS obat_name,a.Qty_hari as qty FROM t_schedule_detail a
            LEFT JOIN t_schedule AS b ON a.transactionnumber  =b.transactionnumber
            LEFT JOIN m_obat AS obat ON a.id_obat  =obat.id
            LEFT JOIN m_pasien on b.id_pasien=m_pasien.id
            WHERE m_pasien.code  = '".Auth::user()->code_pasien."' AND a.datesiang != '00:00:00'
            
            UNION ALL
            
            SELECT  a.id,m_pasien.name as pasien,a.transactionnumber,a.stardate,a.enddate,a.datemalam AS jam,obat.id AS id_obat,obat.name AS obat_name,a.Qty_hari as qty FROM t_schedule_detail a
            LEFT JOIN t_schedule AS b ON a.transactionnumber  =b.transactionnumber
            LEFT JOIN m_obat AS obat ON a.id_obat  =obat.id
            LEFT JOIN m_pasien on b.id_pasien=m_pasien.id
            WHERE m_pasien.code  = '".Auth::user()->code_pasien."' AND a.datemalam != '00:00:00'
            )
            abc 
            WHERE CURDATE() BETWEEN stardate AND enddate and
            concat(id,CURDATE(),id_obat,jam) not in (select concat(id,CURDATE(),id_obat,jam) from t_history_obat )
            ORDER BY jam 
            
            ");
            
    

        return view('listpasien.index', compact('detail','status'));
    }
    
    function edit($id,$id_obat,$jam)
    {


        $data = DB::select("
        SELECT abc.* from (SELECT a.id,a.transactionnumber,a.stardate,a.enddate,a.datepagi AS jam,
            obat.id AS id_obat,obat.name AS obat_name,a.Qty_hari as qty FROM t_schedule_detail a
            LEFT JOIN t_schedule AS b ON a.transactionnumber  =b.transactionnumber
            LEFT JOIN m_obat AS obat ON a.id_obat  =obat.id
            LEFT JOIN m_pasien on b.id_pasien=m_pasien.id
            WHERE m_pasien.code = '".Auth::user()->code_pasien."' AND a.datepagi != '00:00:00'
            
            UNION ALL
            
            SELECT  a.id, a.transactionnumber,a.stardate,a.enddate,a.datesiang AS jam,obat.id AS id_obat,obat.name AS obat_name,a.Qty_hari as qty FROM t_schedule_detail a
            LEFT JOIN t_schedule AS b ON a.transactionnumber  =b.transactionnumber
            LEFT JOIN m_obat AS obat ON a.id_obat  =obat.id
            LEFT JOIN m_pasien on b.id_pasien=m_pasien.id
            WHERE m_pasien.code  = '".Auth::user()->code_pasien."' AND a.datesiang != '00:00:00' and a.id not in (select id_schedule_detail from t_history_obat)
            
            UNION ALL
            
            SELECT  a.id,a.transactionnumber,a.stardate,a.enddate,a.datemalam AS jam,obat.id AS id_obat,obat.name AS obat_name,a.Qty_hari as qty FROM t_schedule_detail a
            LEFT JOIN t_schedule AS b ON a.transactionnumber  =b.transactionnumber
            LEFT JOIN m_obat AS obat ON a.id_obat  =obat.id
            LEFT JOIN m_pasien on b.id_pasien=m_pasien.id
            WHERE m_pasien.code  = '".Auth::user()->code_pasien."' AND a.datemalam != '00:00:00'
            )
            abc 
          
            

            ORDER BY jam");

        
            return view('listpasien.edit', compact('data'));
    }

     public function store(Request $request)
     {
        
       // dd($request->jam);
        try {
           DB::beginTransaction();
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $fileName);
            
            DetailObat::create([
                'id_obat'=>$request->id_obat,
                'id_schedule_detail'=>$request->id,
                'jam'=>$request->jam,
                'path'=>$fileName

            ]);
                DB::commit();
                return response()->json([
                    'url' => url('listpasien'),
                    'message' => 'Upload image  Berhasil'
                ]);
           
        } catch (\Throwable $th) {
            DB::rollBack();
            
            return response()->json([
                'url' => url('listpasien'),
                'message' => 'Upload image Gagal!!'
            ]);
        }
     }

}
