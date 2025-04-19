<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\DataTables\CmsDataTable;

class LogsController extends Controller
{
    public function index(CmsDataTable $dataTable)
    {
        $page_title = 'Activity logs';
        $resource = 'log';
        $columns = ['When', 'User', 'Description', 'Model', 'Action'];
        $data = Activity::with('causer')
                        ->latest()
                        ->get();

        return $dataTable->render('logs.index', compact(
            'dataTable',
            'page_title',
            'resource',
            'columns',
            'data'
        ));
    }
}
