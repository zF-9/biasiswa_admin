<?php

namespace App\Http\Controllers;

use Mail;
use Redirect;
use App\applicant;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

class MailController extends Controller {

   public function succeed_email($data_i) {

        $student_data = applicant::where('user_id', $data_i)
                        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();
        $email = $student_data->pluck('email');
        $email_test = $email[0];

        $nama = $student_data->pluck('nama');
        $nama_string = $nama[0];
        $uni = $student_data->pluck('Uni_name');
        $email = $student_data->pluck('email');
        $email_string = $email[0];
        $sYear = $student_data->pluck('startStudy');
        $eYear = $student_data->pluck('EndStudy');
        $mod = $student_data->pluck('mod_pengajian');
        $course = $student_data->pluck('course');

      $data = array('name'=>$nama[0], 'Uni_name'=>$uni[0], 'course' => $course[0], 'mod_pengajian'=>$mod[0], 'sYear' => $sYear[0], 'eYear' => $eYear[0]);
    
      Mail::send('mail.suratlulus', $data, function($message) use ($email_string, $nama_string){

         $message->to($email_string, $nama_string)->subject
            ('Keputusan Permohonan Biasiswa');
         $message->from('bpknsav2@gmail.com','Biasiswa Admin');
      });

      //echo "HTML Email Sent. Check your inbox.";
      return Redirect::Route('board')->withErrors(__('Email telah berjaya dihantar'));

   }

   public function failed_email($data_i) {

        $student_data = applicant::where('user_id', $data_i)
                        ->join('info__pengajians', 'info__pengajians.applicant_id', 'applicants.user_id')->get();

        $email = $student_data->pluck('email');
        $email_test = $email[0];

        $nama = $student_data->pluck('nama');
        $nama_string = $nama[0];
        $uni = $student_data->pluck('Uni_name');
        $email = $student_data->pluck('email');
        $email_string = $email[0];
        $sYear = $student_data->pluck('startStudy');
        $eYear = $student_data->pluck('EndStudy');
        $mod = $student_data->pluck('mod_pengajian');
        $course = $student_data->pluck('course');

      $data = array('name'=>$nama[0], 'Uni_name'=>$uni[0], 'course' => $course[0], 'mod_pengajian'=>$mod[0], 'sYear' => $sYear[0], 'eYear' => $eYear[0]);

      Mail::send('mail.suratgagal', $data, function($message) use ($email_string, $nama_string){

         $message->to($email_string, $nama_string)->subject
            ('Keoutusan Permohonan Biasiswa');
         $message->from('bpknsav2@gmail.com','Biasiswa Admin');
      });

      //echo "HTML Email Sent. Check your inbox.";
      return Redirect::Route('board')->withErrors(__('Email telah berjaya dihantar'));
   }

   public function attachment_email() {
      $data = array('name'=>"User");
      Mail::send('mail.lulus-mail', $data, function($message) {
         $message->to('faezashley1503@gmail.com', 'Biasiswa System')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('bpknsav2@gmail.com','Biasiswa Admin');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }

   public function basic_email() {
      $data = array('name'=>"User");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('abc@gmail.com', 'Biasiswa System')->subject
            ('Laravel Basic Testing Mail');
         $message->from('bpknsav2@gmail.com','Biasiswa Admin');
      });
      echo "Basic Email Sent. Check your inbox.";
   }

}

