<?php

namespace App\Exports;

use App\Models\GmailSale;
use Maatwebsite\Excel\Concerns\FromCollection;

class GmailSalesExport implements FromCollection
{
    public function collection()
    {
        return GmailSale::all(); // অথবা আপনি চাইলে filter করতে পারেন
    }
}
