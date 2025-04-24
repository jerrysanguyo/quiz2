<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Answer;
use App\Models\Disability;
use App\Models\Score;
use App\DataTables\CmsDataTable;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

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
        $columns = ['Id', 'Name', 'Email', 'Disability', 'action'];
        $subData  = Disability::getAllDisabilities();
        $data = User::getAllUsers();

        return $dataTable->render('cms.index', compact(
            'dataTable',
            'page_title',
            'resource',
            'columns',
            'subData',
            'data'
        ));
    }

    public function store(UserRequest $request)
    {
        $user = $this->userServices->store($request->validated());

        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->log('Added a user: '. $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.user.index')
            ->with('success', 'User added successfully!');
    }

    public function update(UserRequest $request, User $user)
    {
        $user = $this->userServices->update($request->validated(), $user);

        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->log('Updated a user: '. $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name);

        return redirect()
            ->to(URL::previous())
            ->with('success', 'User updated successfully!');
    }
    
    public function destroy(User $user)
    {
        $user = $this->userServices->destroy($user);

        activity()
            ->performedOn($user)
            ->causedBy(Auth::user())
            ->log('Deleted a user: '. $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.user.index')
            ->with('success', 'User deleted successfully!');
    }
    
    public function show(User $user)
    {
        // scoring for contestant
    }

    public function profile(User $user)
    {
        $results = Answer::getResultsForUser(Auth::user()->id);
        $totalQuestions = $results->count();
        $correctAnswers = $results->where('is_correct', true)->count();
        $scorePercent = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;
        $page_title = 'Profile';
        $resource = 'user';
        $record = User::getUser(Auth::user()->id);
        $subData  = Disability::getAllDisabilities();
        return view('profile.index', compact(
            'page_title',
            'record',
            'resource',
            'subData',
            'user',
            'results',
            'totalQuestions',
            'correctAnswers',
            'scorePercent',
        ));
    }
}
