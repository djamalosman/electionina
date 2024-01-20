<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use DateTime;
use DateTimeZone;
use App\Models\Pasien;
use App\Models\Obat;
use App\Models\Schedule;
use App\Models\ScheduleDetail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GenerateNumberHelpers;
use Validator;
use Twilio\Rest\Client;
use App\Providers\RouteServiceProvider;
use App\Traits\WablasTrait;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        
        $datadbe = DB::table(function($query) {
            $query->select(
                'm_pasien.name as namapasien',
                'm_pasien.phone as nomortelepon',
                'm_obat.name as namaobat',
                'm_obat.description as descriptionobat',
                't_schedule.description',
                't_schedule_detail.aturanpakai',
                't_schedule_detail.stardate',
                't_schedule_detail.enddate',
                't_schedule_detail.Qty_hari',
                't_schedule_detail.datepagi',
                't_schedule_detail.datesiang',
                't_schedule_detail.datemalam',
                't_schedule_detail.id'
            )
            ->from('m_pasien')
            ->join('t_schedule', 't_schedule.id_pasien', '=', 'm_pasien.id')
            ->join('t_schedule_detail', 't_schedule_detail.transactionnumber', '=', 't_schedule.transactionnumber')
            ->join('m_obat', 'm_obat.id', '=', 't_schedule_detail.id_obat')
            ->where('t_schedule.deletestatus', 0)
            ->where('t_schedule_detail.status', 0)
            ->groupBy(

                'm_pasien.name',
                'm_pasien.phone',
                'm_obat.name',
                'm_obat.description',
                't_schedule.description',
                't_schedule_detail.aturanpakai',
                't_schedule_detail.stardate',
                't_schedule_detail.enddate',
                't_schedule_detail.Qty_hari',
                't_schedule_detail.datepagi',
                't_schedule_detail.datesiang',
                't_schedule_detail.datemalam',
                't_schedule_detail.id'
            );
        }, 'sub')
        ->distinct()
        ->get();
                $status = 2;
                $limit = $datadbe->count();
                $timezone = new DateTimeZone('Asia/Jakarta');
                $datetime = new DateTime('now', $timezone);
                $timenow = $datetime->format('H:i:00');
                $datenow = $datetime->format('Y-m-d H:i:00');
                $kumpulan_data = [];
                $timenowgnthri = $datetime->format('H:i');
                $gantiHari="00:00";
                if($timenowgnthri == $gantiHari) {
                    ScheduleDetail::query()->update(['status' => 1]);
                }
               
                $hitung = 0;
                foreach ($datadbe as  $value) 
                {
                    $pesan = 'Kepada ibu/bapak, pemberitahuan meminum obat "' . $value->namaobat . '" pada hari ini, untuk aturan pakainya sebagai berikut: "' . $value->aturanpakai . '"';
                    
                    if($timenow == $value->datepagi || $timenow == $value->datesiang || $timenow == $value->datemalam )
                    {
                        $data['phone'] = $value->nomortelepon;
                        $data['message'] = $pesan;
                        array_push($kumpulan_data, $data);
                        
                        // if (++$hitung >= $limit) {
                        //     //break;
                        //     return view('jadwal.index', compact('status'));
                        // }
                       
                        WablasTrait::sendText($kumpulan_data);
                        ScheduleDetail::where('id', $value->id)
                            ->update([
                                'status' => 1,               
                            ]);
                            //dd($dt);
                        
                        return view('jadwal.index', compact('status'));

                    }
                    else{
                        
                        return view('jadwal.index', compact('status'));
                    }
                }
                return view('jadwal.index', compact('status'));
         
    }
    
}
