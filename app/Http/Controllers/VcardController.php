<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use JeroenDesloovere\VCard\VCard;
use Symfony\Component\HttpFoundation\Response;

class VcardController extends Controller
{
    public function index($id) {


        $employee = Employees::where('id_no', $id)->get();
        $vcard = new VCard();

        // add personal data
        $vcard->addName($employee[0]->first_name." ".$employee[0]->middle_name." ".$employee[0]->last_name);
        $vcard->addJobtitle($employee[0]->position_title);
        $vcard->addEmail($employee[0]->email);
        $vcard->addPhoneNumber($employee[0]->employee_number, 'WORK');
        $vcard->addURL('www.aboitizeconomicestates.com');
        
        // return response($vcard->download())
        // ->header('Content-Type', 'text/x-vcard')
        // ->header('Content-Disposition', 'attachment; filename="'.$employee[0]->first_name.'_'.$employee[0]->last_name.'.vcf"');

        $response = new Response();
        $response->setContent($vcard->getOutput());
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/x-vcard');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $employee[0]->first_name." ".$employee[0]->middle_name . '.vcf"');
        $response->headers->set('Content-Length', mb_strlen($vcard->getOutput(), 'utf-8'));

        return $response;
    }
}