<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hitech\IndonesiaLaravel\Models\City;
use Hitech\IndonesiaLaravel\Models\Village;
use Hitech\IndonesiaLaravel\Models\District;
use Hitech\IndonesiaLaravel\Models\Province;
use Hitech\IndonesiaLaravel\Services\IndonesiaService;

class CompanyController extends Controller
{

    protected $indonesia;

    public function __construct()
    {
        $this->indonesia = new IndonesiaService();
    }

    public function index(Request $request)
    {
        $provinces = Province::all(['kode', 'nama']);
        $user = Auth::user();
        return view('company.index', compact('user', 'provinces'));
    }

    public function getCities(Request $request)
    {
        $cities = City::where('kode_provinsi', $request->kode_provinsi)->get(['kode', 'nama']);
        return response()->json($cities);
    }

    public function getDistricts(Request $request)
    {
        $districts = District::where('kode_kabupaten', $request->kode_kabupaten)->get(['kode', 'nama']);
        return response()->json($districts);
    }

    public function getVillages(Request $request)
    {
        $villages = Village::where('kode_kecamatan', $request->kode_kecamatan)->get(['kode', 'nama']);
        return response()->json($villages);
    }
}
