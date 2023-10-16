<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Font;

class DataKandidatExport implements FromView
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    public function view() : View{
        return view('superadmin.manajemenuser.excelkandidat', [
            'kandidat'=> User::where('role_id', 3)->get()
        ]);
    }

    public function registerEvents(): array
    {
    return [
        AfterSheet::class => function(AfterSheet $event) {
            $count = 1;
            foreach ($this->collection() as $row) {
                $url = $row->foto;
                $cell = "D".$count;
                $event->sheet->getCell($cell)->getHyperlink()->setUrl('http://127.0.0.1:8000/foto/'.$url);
                $font = $event->sheet->getStyle($cell)->getFont();
                $font->getColor()->setARGB(Color::COLOR_BLUE);
                $font->setUnderline(Font::UNDERLINE_SINGLE);
                $count++;
            }
        },
    ];
}

}
