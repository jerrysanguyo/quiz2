<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\DataTables\CmsDataTable;
use App\Http\Requests\PermissionRequest;
use App\Services\PermissionService;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    protected $permissionServices;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionServices = $permissionService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $page_title = 'Permission';
        $resource = 'permission';
        $columns = ['Id', 'Name', 'Guard name', 'Action'];
        $data = Permission::getAllPermissions();

        return $dataTable->render('cms.index', compact(
            'dataTable',
            'page_title',
            'resource',
            'columns',
            'data'
        ));
    }

    public function store(PermissionRequest $request)
    {
        $permission = $this->permissionServices->store($request->validated());

        activity()
            ->performedOn($permission)
            ->causedBy(Auth::user())
            ->log('Added a permission: '. $permission->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.permission.index')
            ->with('success', 'Permission added successfully!');
    }
    
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission = $this->permissionServices->update($request->validated(), $permission);

        activity()
            ->performedOn($permission)
            ->causedBy(Auth::user())
            ->log('Updated a permission: '.$permission->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.permission.index')
            ->with('success', 'Permission updated successfully!');
    }
    
    public function destroy(Permission $permission)
    {
        $permission = $this->permissionServices->destroy($permission);

        activity()
            ->performedOn($permission)
            ->causedBy(Auth::user())
            ->log('Deleted a permission: '.$permission->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.permission.index')
            ->with('success', 'Permission deleted successfully!');
    }
}
