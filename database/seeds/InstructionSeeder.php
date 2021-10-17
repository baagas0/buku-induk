<?php

use App\Instruction;
use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'slug'  => 'student_page',
                'value' => 'Untuk melihat data masing-masing siswa silahkan pilih melalui opsi Data Anak Table.',
            ],
            [
                'slug'  => 'pdf_management_page',
                'value' => 'Untuk membuat data silahkan pilih New Record. Tunggu sebentar dan pilih action detail untuk mendownload hasil generator.',
            ],
            [
                'slug'  => 'mapel_page',
                'value' => 'Letakan kursor anda di salah satu tombol section <b>Action</b> untuk melihat detail fungsi dari tombol.'
            ],
            [
                'slug'  => 'student_export_page',
                'value' => 'Halaman ini untuk mengekspor data siswa bedasarkan kelas dengan output berupa file excel untuk nantinya di edit dan diimport kedalam sistem.<br>Tujuannya adalah untuk mempermudah staff maupun guru dalam menginput data nilai dan data lainnya kedalam sistem.'
            ],
            [
                'slug'  => 'import_data_page',
                'value' => '1. Download template excel dari halaman <span class="text-primary">Export Data Siswa</span><br>2. Edit data file excel sesuai dengan data siswa<br>3. Lengkapi data di form jika ada<br>4. Drop file atau pilih file dibagian form <b>Upload File Excel</b><br>5. Tunggu dan klik submit<br><br>Setelah proses data sudah terproses dan otomatis masuk kesistem.'
            ],
            [
                'slug'  => 'analisis_page',
                'value' => 'Masukan data yang diperlukan seperti data semester, tahun pelajaran, mata pelajaran, kelas untuk menampilkan data nilai siswa permasing masing kelas',
            ],
        ];

        foreach ($data as $row) {
            Instruction::create($row);
        }
    }
}
