<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\DataTables\CmsDataTable;
use App\Http\Requests\RoleRequest;
use App\Services\RoleService;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    protected $roleServices;

    public function __construct(RoleService $roleService)
    {
        $this->roleServices = $roleService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $page_title = 'Role';
        $resource = 'role';
        $columns = ['Id', 'Name', 'Guard name', 'Action'];
        $data = Role::getAllRoles();

        return $dataTable->render('cms.index', compact(
            'dataTable',
            'page_title',
            'resource',
            'columns',
            'data'
        ));
    }

    public function store(RoleRequest $request)
    {
        $role = $this->roleServices->store($request->validated());

        activity()
            ->performedOn($role)
            ->causedBy(Auth::user())
            ->log('Added a role: '. $role->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.role.index')
            ->with('success', 'Role added successfully!');
    }
    
    public function update(RoleRequest $request, Role $role)
    {
        $role = $this->roleServices->update($request->validated(), $role);

        activity()
            ->performedOn($role)
            ->causedBy(Auth::user())
            ->log('Updated a Role: '.$role->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.role.index')
            ->with('success', 'Role updated successfully!');
    }
    
    public function destroy(Role $role)
    {
        $role = $this->roleServices->destroy($role);

        activity()
            ->performedOn($role)
            ->causedBy(Auth::user())
            ->log('Deleted a role: '.$role->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.role.index')
            ->with('success', 'Role deleted successfully!');
    }
}
