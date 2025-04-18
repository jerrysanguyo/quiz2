<?php

namespace App\Http\Controllers;

use App\Models\Disability;
use App\DataTables\CmsDataTable;
use App\Http\Requests\DisabilityRequest;
use App\Services\disabilityService;
use Illuminate\Support\Facades\Auth;

class DisabilityController extends Controller
{
    protected $disabilityServices;

    public function __construct(disabilityService $disabilityService)
    {
        $this->disabilityServices = $disabilityService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $page_title = 'Disability';
        $resource = 'disability';
        $columns = ['Id', 'Name', 'Remarks', 'Action'];
        $data = Disability::getAllDisabilities();

        return $dataTable->render('cms.index', compact(
            'dataTable',
            'page_title',
            'resource',
            'columns',
            'data'
        ));
    }

    public function store(DisabilityRequest $request)
    {
        $disability = $this->disabilityServices->store($request->validated());

        activity()
            ->performedOn($disability)
            ->causedBy(Auth::user())
            ->log('Added a disability: '. $disability->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.disability.index')
            ->with('success', 'Disability added successfully!');
    }
    
    public function update(DisabilityRequest $request, disability $disability)
    {
        $disability = $this->disabilityServices->update($request->validated(), $disability);

        activity()
            ->performedOn($disability)
            ->causedBy(Auth::user())
            ->log('Updated a disability: '.$disability->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.disability.index')
            ->with('success', 'Disability updated successfully!');
    }
    
    public function destroy(disability $disability)
    {
        $disability = $this->disabilityServices->destroy($disability);

        activity()
            ->performedOn($disability)
            ->causedBy(Auth::user())
            ->log('Deleted a disability: '.$disability->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.disability.index')
            ->with('success', 'Disability deleted successfully!');
    }
}
