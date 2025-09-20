<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampah;

class SampahController extends Controller
{
    public function index()
    {
        $sampahs = Sampah::latest()->paginate(10);
        return view('sampah.index', compact('sampahs'));
    }
}
