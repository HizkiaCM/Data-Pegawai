<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nip', 
        'nama', 
        'tempat_lahir', 
        'alamat', 
        'tgl_lahir', 
        'jenis_kelamin', 
        'golongan', 
        'eselon', 
        'jabatan', 
        'tempat_tugas', 
        'agama', 
        'unit_kerja', 
        'no_hp', 
        'npwp',
        'foto'
    ];

    public function downloadPdf()
    {
        $pegawais = Pegawai::all(); // Mengambil semua data pegawai dari database

        // Memuat view pegawai_pdf dengan data pegawais
        $pdf = PDF::loadView('pegawai.pegawai_pdf', compact('pegawais'));

        // Mengunduh file PDF dengan nama pegawai.pdf
        return $pdf->download('pegawai.pdf');
    }
}
