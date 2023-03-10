<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use Illuminate\Http\Request;
use Carbon\Carbonx;
use Illuminate\Support\Facades\Auth;
use PDF;
use Excel;
use App\Exports\PengaduansExport;
use App\Models\Response;
// use App\Http\Controllers\PengaduanController\Auth;

class PengaduanController extends Controller
{
    public function exportPDF()
    {
        $data = Pengaduan::with('response')->get()->toArray();
        view()->share('pengaduans',$data);
        $pdf = PDF::loadView('dashboard.print',$data)->setPaper('a4', 'landscape');
        return $pdf->download('data_pengaduan_keseluruhan.pdf');
    }

    public function createdPDF($id)
    {
    $data = Pengaduan::with('response')->where('id',$id)->get()->toArray();
    view()->share('pengaduans',$data);
    $pdf = PDF::loadView('dashboard.print',$data);
    return $pdf->download('data_pengaduan.pdf');
}

    public function exportExcel()
    {
    $file_name = 'data_keseluruhan_pengaduan.xlsx';
    return Excel::download(new PengaduansExport,$file_name);
}


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $pengaduan = Pengaduan::orderBy('created_at', 'DESC')
        ->simplePaginate(2);
        return view ('dashboard.home', compact('pengaduan'));
    }

    public function auth(Request $request)
    {
       $request->validate([
        'email' => 'required|email:dns',
        'password' => 'required',
       ]);

       $user = $request->only('email', 'password');
       if(Auth::attempt($user)){
        if (Auth::user()->role == 'admin') {
            return redirect()->route('data');
        }elseif(Auth::user()->role == 'petugas') {
            return redirect()->route('data.petugas');
        }

       }else {
        return redirect()->back()->with('gagal', 'Gagal login, coba lagi!');
       }
    }


    
    public function login()
    {
        return view ('dashboard.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

        
    
    public function data(Request $request)
    {
        $search = $request->search;
        $pengaduans = Pengaduan::with('response')->Where('nama', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->get();
        return view ('dashboard.data', compact('pengaduans'));
    }

    public function petugas(Request $request)
    {
        $search = $request->search;
        $pengaduans = Pengaduan::with('response')->Where('nama', 'LIKE', '%' . $search . '%')->orderBy('created_at', 'DESC')->get();
        return view ('dashboard.petugas', compact('pengaduans'));
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'no' => 'required|max:13',
            'pengaduan' => 'required|min:5',
            'foto' => 'required|image|mimes:jpeg,jpg,png,svg,webp',
        ]);

        $image = $request->file('foto');
        $imgName = rand() . '.' . $image->extension();
        $path = public_path('assets/image/');
        $image->move($path, $imgName);

        Pengaduan::create([
            'nik'=> $request->nik,
            'nama' => $request->nama,
            'no' => $request->no,
            'pengaduan' => $request->pengaduan,
            'foto' => $imgName,
        ]);
        return redirect()->back()->with('succesUpdate', 'Edit Succes!!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(pengaduan $pengaduan)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pengaduan::where('id', $id)->firstOrFail();
        $image = public_path('assets/image/'.$data['foto']);
        unlink($image);
        $data->delete();
        Response::where('pengaduan_id',$id)->delete();
        return redirect()->back();
    }
}
