<?php

namespace App\Exports;


use App\applicant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */

 
    public function collection()
    {
        return applicant::where('isApproved', '=', '1')
         ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')
         ->get( ['nama', 'nokp', 'trkhlahir', 'umur', 'tarafkahwin', 'telno', 'telnoPej', 'alamat', 'email', 'jabatan', 'tarikhlantik', 'tberkhidmat', 'jawatan', 'skim', 'Gred', 'TarafLantik', 'Tsahjwtn', 'Tahun1LPPT', 'Tahun2LPPT', 'Tahun3LPPT', 'startStudy', 'EndStudy', 'AkademikLvl', 'AkademikInfo', 'AppliedKursus', 'mod_pengajian', 'Uni_name', 'tmpt_study' ]);
     
    }
    public function headings(): array
    {
        return [
            'Name',
            'No KP',
            'Tarikh Lahir',
            'Umur',
            'Taraf Kahwin',
            'Nombor Telefon',
            'Nombor Telefon Pejabat',
            'Alamat',
            'Email',
            'Jabatan',
            'Tarikh Lantik',
            'Tarikh Berkhidmat',
            'Jawatan',
            'Skim',
            'Gred',
            'Taraf Lantik',
            'Tarikh Sah Jawatan',
            'Skt Tahun 1',
            'Skt Tahun 2',
            'Skt Tahun 3',
            'Tarikh Mula Belajar',
            'Tarikh Habis Belajar',
            'Taraf Kelayakan Akademik',
            'Nama Penuh Kelayakan',
            'Jenis Kelayakan Dipohon',
            'Mod Pengajian',
            'Nama Universiti',
            'Tempat Belajar',

        ];
    }
   // ['id','nama', 'nokp', 'trkhlahir', 'umur', 'tarafkahwin', 'telno', 'telnoPej', 'alamat', 'email', 'jabatan', 'tarikhlantik',
       //   'tberkhidmat', 'jawatan', 'skim', 'Gred', 'TarafLantik', 'Tsahjwtn',
       //   'Tahun1LPPT', 'Tahun2LPPT', 'Tahun3LPPT', 'startStudy', 'EndStudy', 'AkademikLvl',
         // 'AkademikInfo', 'AppliedKursus', 'mod_pengajian', 'Uni_name', 'tmpt_study' ] 'isApproved', '=', '1'

    
}
