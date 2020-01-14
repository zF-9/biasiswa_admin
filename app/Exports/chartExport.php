<?php

namespace App\Exports;

use DB;
use App\Dokumen_result;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class chartExport implements FromCollection, WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $doc = DB::table('dokumen_results')
        ->join('users', 'users.id', 'dokumen_results.document_id')
        ->get(['name', 'date_penyerahan', 'perkara', 'tempoh', 'tuntutan']);
        return $doc;
    }

    public function headings(): array
    {
        return [

            
            'Nama Penuntut',
            'Tarikh Penyerahan',
            'Perkara',
            'Tempoh Tuntutan',
            'Jumlah Tuntutan (RM)',

        ];
    }
}
