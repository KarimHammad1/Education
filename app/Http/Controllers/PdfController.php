<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \PDF;

use Illuminate\Support\Facades\Auth;
use Datetime;
use App\Models\courses;
use App\Models\User;

class PdfController extends Controller
{
    public function create($id)
    {
        $u_id=Auth::user()->id;
        $course=courses::find($id);
        $user=User::find($u_id);
        $dt = new DateTime();
    	$data = [
            'user'=>$user,
            'course'=>$course,
            'dt'=>$dt
        ];
        //dd($data);
        $pdf = PDF::loadView('pdf',$data);
        return $pdf->download('Certification.pdf');
    }
}
