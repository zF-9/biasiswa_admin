<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Excel;
use Redirect;
use App\User;
use App\applicant;
use App\upDocuments;
use App\payment_record;



class ExportExcelController extends Controller
{

    function excel()
    {
     $data_student = DB::table('applicants')->get()->toArray();
     $student_array[] = array('nama', 'nokp', 'trkhlahir', 'umur', 'tarafkahwin','telno', 'telnoPej', 'alamat', 'email', 'jabatan', 'tarikhlantik', 'tberkhidmat', 'jawatan', 'skim', 'Gred', 'TarafLantik', 'Tsahjwtn', 'Tahun1LPPT', 'Tahun2LPPT', 'Tahun3LPPT'  );
     foreach($data_student as $student)
     {
      $student_array[] = array(
  
            'nama' => $student->name,
            'nokp' => $student->nokp,
            'trkhlahir'=> $student->trklahir,
            'umur'=> $student->umur,
            'tarafkahwin'=> $student->tarafkahwin,
            'telno'=> $student->telno,
            'telnoPej'=> $student->telnoPej,
            'alamat'=> $student->alamat,
            'email'=> $student->email,
            'jabatan'=> $student->jabatan,
            'tarikhlantik'=> $student->tarikhlantik,
            'tberkhidmat'=> $student->tberkhidmat,
            'jawatan'=> $student->jawatan,
            'skim'=> $student->skim,
            'Gred'=> $student->Gred,
            'TarafLantik'=> $student->TarafLantik,
            'Tsahjwtn'=> $student->Tsahjwtn,
            'Tahun1LPPT'=> $student->Tahun1LPPT,
            'Tahun2LPPT'=> $student->Tahun2LPPT,
            'Tahun3LPPT'=> $student->Tahun3LPPT,
      );
     }
        Excel::create('Student Data', function($excel) use ($student_array){
        $excel->setTitle('Student Data');
        $excel->sheet('Student Data', function($sheet) use ($student_array){
        $sheet->fromArray($student_array, null, 'A1', false, false);
      });
     })->download('xlsx');
    }
}

?>

