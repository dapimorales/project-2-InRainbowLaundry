<?php

namespace App\Http\Controllers;

use App\Models\Service; // Penting: Biar bisa ambil data dari tabel
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Ambil data dari table services
        $services = Service::all(); 
        
        // Buka file index yang ada di folder resources/views/services/
        return view('services.index', compact('services'));
    }
}