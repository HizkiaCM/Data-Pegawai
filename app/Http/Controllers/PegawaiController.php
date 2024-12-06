<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PegawaiExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:pegawai,nip',
            'nama' => 'required',
            // Validasi lainnya sesuai kebutuhan
        ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index')
                        ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id)
    {
        // Temukan pegawai berdasarkan ID
        $pegawai = Pegawai::find($id);

        $pegawai->nip = $request->input('nip');
        $pegawai->nama = $request->input('nama');
        $pegawai->tempat_lahir = $request->input('tempat_lahir');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->tgl_lahir = $request->input('tgl_lahir');
        $pegawai->jenis_kelamin = $request->input('jenis_kelamin');
        $pegawai->golongan = $request->input('golongan');
        $pegawai->eselon = $request->input('eselon');
        $pegawai->jabatan = $request->input('jabatan');
        $pegawai->tempat_tugas = $request->input('tempat_tugas');
        $pegawai->agama = $request->input('agama');
        $pegawai->unit_kerja = $request->input('unit_kerja');
        $pegawai->no_hp = $request->input('no_hp');
        $pegawai->npwp = $request->input('npwp');

        $pegawai->save();

        return redirect()->route('pegawai.index');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        
        return redirect()->route('pegawai.index')->with('success', 'Data pegawai berhasil dihapus');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $pegawai = Pegawai::query()
            ->when($search, function($query, $search) {
                return $query->where('nip', 'like', "%{$search}%")
                            ->orWhere('nama', 'like', "%{$search}%")
                            ->orWhere('tempat_lahir', 'like', "%{$search}%")
                            ->orWhere('alamat', 'like', "%{$search}%")
                            ->orWhere('tgl_lahir', 'like', "%{$search}%")
                            ->orWhere('jenis_kelamin', 'like', "%{$search}%")
                            ->orWhere('golongan', 'like', "%{$search}%")
                            ->orWhere('eselon', 'like', "%{$search}%")
                            ->orWhere('jabatan', 'like', "%{$search}%")
                            ->orWhere('tempat_tugas', 'like', "%{$search}%")
                            ->orWhere('agama', 'like', "%{$search}%")
                            ->orWhere('unit_kerja', 'like', "%{$search}%")
                            ->orWhere('no_hp', 'like', "%{$search}%")
                            ->orWhere('npwp', 'like', "%{$search}%");
            })
            ->get();

        return view('search', compact('pegawai'));
    }

    public function selectPegawai()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.select', compact('pegawais'));
    }

    public function showUploadForm($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.upload', compact('pegawai'));
    }

    public function uploadFoto(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|exists:pegawai,id',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pegawai = Pegawai::findOrFail($request->pegawai_id);

        if ($request->hasFile('foto')) {
            if ($pegawai->foto && file_exists(public_path('images/' . $pegawai->foto))) {
                unlink(public_path('images/' . $pegawai->foto));
            }

            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $pegawai->foto = $filename;
            $pegawai->save();
        }

        return redirect()->route('pegawai.upload.select')->with('success', 'Foto berhasil diupload.');
    }

    public function export(Request $request)
    {
        $ids = $request->input('ids');
        return Excel::download(new PegawaiExport($ids), 'pegawai.xlsx');
    }

    public function filterByUnitKerja($unitKerja)
    {
        $pegawai = Pegawai::where('unit_kerja', $unitKerja)->get();

        return view('pegawai.index', compact('pegawai'));
    }

    public function showByUnitKerja()
    {
        $unitKerjas = Pegawai::distinct()->pluck('unit_kerja');
        $unitKerjaDipilih = request('unit_kerja');
        $pegawai = $unitKerjaDipilih ? Pegawai::where('unit_kerja', $unitKerjaDipilih)->get() : Pegawai::all();

        return view('pegawai.unit_kerja', compact('pegawai', 'unitKerjas', 'unitKerjaDipilih'));
    }

}


