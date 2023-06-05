<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\App;
class ReportController extends Controller
{
    //

    public function Approved($id)
    {
        $report = Report::find($id);
        $report->status = 'approved';
        $report->save();
        return redirect()->back();
    }

    public function Rejected($id)
    {
        $report = Report::find($id);
        $report->status = 'rejected';
        $report->save();
        return redirect()->back();
    }

    public function Pending($id)
    {
        $report = Report::find($id);
        $report->status = 'pending';
        $report->save();
        return redirect()->back();
    }

    //print Pdf Report
    public function printPdf($id)
    {
    }
}
