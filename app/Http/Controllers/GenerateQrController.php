<?php

namespace App\Http\Controllers;


use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use JeroenDesloovere\VCard\VCard;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

ini_set('max_execution_time', 3600); 

class GenerateQrController extends Controller
{
    public function index() {
        $employees = Employees::get()->toArray();
        
        foreach($employees as $employee) {
            $idno = $employee['id_no'];
            $fname = $employee['first_name'];
            $lname = $employee['last_name'];
            $mname = $employee['middle_name'];

            $qr_code_filename = $idno.'.png';

            $vcard = new VCard();

            // add personal data
            $vcard->addName($fname);
            $vcard->addJobtitle($employee['position_title']);
            $vcard->addEmail($employee['email']);
            $vcard->addPhoneNumber($employee['employee_number'], 'WORK');
            $vcard->addURL('www.aboitizeconomicestates.com');

            Storage::put('public/qrcodes/'.$qr_code_filename, QrCode::size(400)
                ->format('png')
                ->generate($vcard->getOutput())
            );
            
        }
    }   

    public function generate($id_no) {
        try {
        $employee = Employees::where('id_no', $id_no)->first()->toArray(); 
        
        
            $idno = $employee['id_no'];
            $fname = $employee['first_name'];
            $lname = $employee['last_name'];
            $mname = $employee['middle_name'];

            $qr_code_filename = $idno."-".$lname."_".$fname."_".$mname.'.png';
            
            Storage::put('public/qrcodes/'.$qr_code_filename, QrCode::size(200)
            ->format('png')
            // ->generate('https://cards.ladelapp.com/employee/vcard'.$idno));
            ->generate('https://aboitizeconomicestates.kugkugtech.com/employee/vcard/'.$idno));


            // return response()->download(storage_path('public/qrcodes/'.$qr_code_filename));

            $image = storage_path('app/public/qrcodes/'.$qr_code_filename);
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');   
            header('Content-Disposition: attachment; filename='.basename($image));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($image));
            readfile($image); 

        } catch(\Exception $e) {

        }
    }   
}