<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PegawaiExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection()
    {
        return Pegawai::all();
    }

    public function headings(): array
    {
        return [
            'No', 'NIP', 'Nama', 'Tempat Lahir', 'Alamat', 
            'Tanggal Lahir', 'Jenis Kelamin', 'Golongan', 'Eselon', 
            'Jabatan', 'Tempat Tugas', 'Agama', 'Unit Kerja', 
            'No HP', 'NPWP'
        ];
    }

    public function map($pegawai): array
    {
        static $no = 0;
        $no++;

        return [
            $no, 
            $pegawai->nip,
            $pegawai->nama,
            $pegawai->tempat_lahir,
            $pegawai->alamat,
            \Carbon\Carbon::parse($pegawai->tgl_lahir)->format('d-m-Y'),
            $pegawai->jenis_kelamin,
            $pegawai->golongan,
            $pegawai->eselon,
            $pegawai->jabatan,
            $pegawai->tempat_tugas,
            $pegawai->agama,
            $pegawai->unit_kerja,
            $pegawai->no_hp,
            $pegawai->npwp,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Style untuk header
        $sheet->getStyle('A1:O1')->getFont()->setBold(true);
        $sheet->getStyle('A1:O1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
              ->getStartColor()->setARGB('00008B'); // Warna navy
        $sheet->getStyle('A1:O1')->getFont()->getColor()->setARGB('FFFFFF'); // Warna teks putih
        $sheet->getStyle('A:O')->getAlignment()->setHorizontal('center');

        // Mengatur lebar kolom secara otomatis
        $columns = range('A', 'O');

        foreach ($columns as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Membuat wrap text pada kolom-kolom tertentu
        $sheet->getStyle('D:D')->getAlignment()->setWrapText(true); // Tempat Lahir
        $sheet->getStyle('F:F')->getAlignment()->setWrapText(true); // Tanggal Lahir
        $sheet->getStyle('K:K')->getAlignment()->setWrapText(true); // Tempat Tugas
        $sheet->getStyle('M:M')->getAlignment()->setWrapText(true); // Unit Kerja

        return $sheet;
    }
}
