<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubscribersExport;
use App\Models\Subscription;

class ExcelController extends Controller
{
    public function makeAndDownloadExcelFile()
    {
        return Excel::download(new SubscribersExport, 'subscribers.xlsx');
    }
}
