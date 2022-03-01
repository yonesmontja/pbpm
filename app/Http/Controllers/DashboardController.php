<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Siswa;
use App\Models\User;
use PDF;

class DashboardController extends Controller
{
    //
    public function index()
    {
    	
    	return view('dashboards.index');
    }	
}
