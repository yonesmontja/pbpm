<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function index()
    {
        $audits = \OwenIt\Auditing\Models\Audit::with('user')
        ->orderBy('created_at', 'desc')->take(500)->get();
        return view('audit.audits', ['audits' => $audits]);
    }
}