<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Storage;
use PDF;
use App\{
    Kelas,
    Student,
    ThPelajaran,
    Upd,
    UpdScore,
    Aspek,
    AspekScore,
    Ketidakhadiran,
    KetidakhadiranScore,
    Kegiatan,
    Prestasi,
    Kelulusan,
    Kelompok,
    RaporPdfExport,
    RaporPdfExportHistory,
};
use DB;

class MultiPdfGenerate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $dataPdf = $this->data;
        $token = $this->data['token'];
        $data['tahunpelajaran'] = json_decode($dataPdf['th_pelajaran']);
        $students = Student::where('kelas_id', $dataPdf['kelas_id'])->get();
        
        $RaporPdfExport = RaporPdfExport::where('token', $token)->first();
        RaporPdfExportHistory::create([
            'rapor_pdf_exports_id' => $RaporPdfExport->id,
            'title' => 'Perintah pembuatan data e-rapor',
            'type' => 'alert',
        ]);

        $this->RaporPdfData([
            'status' => 'proccess',
            'count_job' => $students->count(),
        ]);

        foreach ($students as $key => $student) {
            $data['nilai'] = DB::select("
                SELECT a.code,a.name as nmkel, b.name,b.id as nameid,  b.is_sub, c.name as subname, c.id as subnameid
                from kelompoks a 
                left join mapels b on a.id=b.kelompok_id
                left join sub_mapels c on b.id = c.mapel_id
                ");

            $data['upds'] = UpdScore::where([
                'student_id'        => $student->id,
            ])
            ->whereIn('th_pelajaran', $data['tahunpelajaran'])
            ->get()
            ->groupBy('upd_id');

            $data['aspeks'] = Aspek::get();

            $data['ketidakhadirans'] = Ketidakhadiran::get();

            $data['kegiatans'] = Kegiatan::get();

            $data['kelulusans'] = Kelulusan::where([
                'student_id'        => $student->id,
            ])
            ->get();
            $data['kelompoks'] = Kelompok::with('mapel')->get();
            $data['student'] = $student;

            RaporPdfExport::where('token', $token)->first()
            ->increment('on_going_job', 1);

            $pdf = PDF::loadView('pdf.nilai.try', $data);
            $pdf->setOption('page-width', '210');
            $pdf->setOption('page-height', '330');

            Storage::put('public/pdf/'.$token.'/'.$student->nis.' - '.$student->name.'.pdf', $pdf->output());

            RaporPdfExportHistory::create([
                'rapor_pdf_exports_id' => $RaporPdfExport->id,
                'student_id' => $student->id,
                'title' => 'Membuat E-rapor PDF',
                'type' => 'student',
            ]);
        }

        $statusData = RaporPdfExport::where('token', $token)->first();
        $statusData->update([
            'status' => 'success'
        ]);
        RaporPdfExportHistory::create([
            'rapor_pdf_exports_id' => $RaporPdfExport->id,
            'title' => 'Pembuatan data e-rapor selesai',
            'type' => 'alert',
        ]);
    }

    /**
     * Handle a job failure.
     *
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(\Throwable  $exception) {
        $RaporPdfExport = RaporPdfExport::where('token', $this->data['token'])->first();

        RaporPdfExportHistory::create([
            'rapor_pdf_exports_id' => $RaporPdfExport->id,
            'title' => 'Proses Pembuatan PDF Gagal',
            'type' => 'alert',
        ]);

        $RaporPdfExport->update([
            'status' => 'error'
        ]);
    }

    public function RaporPdfData($data) {
        $RaporPdfExport = RaporPdfExport::where('token', $this->data['token']);
        $RaporPdfExport->update($data);
    }
}
