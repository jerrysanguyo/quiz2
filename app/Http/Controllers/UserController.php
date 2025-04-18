<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\DataTables\CmsDataTable;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userServices;

    public function __construct(UserService $userService)
    {
        $this->userServices = $userService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $page_title = 'User';
        $resource = 'user';
        $columns = ['Id', 'Name', 'Email', 'action'];
        $data = User::getAllUsers();

        return $dataTable->render('cms.index', compact(
            'dataTable',
            'page_title',
            'resource',
            'columns',
            'data'
        ));
    }

    public function store(UserRequest $request)
    {
        $user = $this->userServices->store($request->validated());

        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->log('Added a user: '. $user->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.user.index')
            ->with('success', 'User added successfully!');
    }
    
    public function show(User $user)
    {
        //
    }

    public function update(UserRequest $request, User $user)
    {
        $user = $this->userServices->update($request->validated(), $user);

        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->log('Updated a user: '. $user->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.user.index')
            ->with('success', 'User updated successfully!');
    }
    
    public function destroy(User $user)
    {
        $user = $this->userServices->destroy($user);

        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->log('Deleted a user: '. $user->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.user.index')
            ->with('success', 'User deleted successfully!');
    }
}
