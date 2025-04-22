<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\User;
use App\Http\Requests\ScoreRequest;
use App\Services\ScoreService;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    protected $scoreServices;

    public function __construct(ScoreService $scoreService)
    {
        $this->scoreServices = $scoreService;
    }
    
    public function scoreStore(ScoreRequest $request, User $user)
    {
        $score = $this->scoreServices->store($request->validated(), $user);

        activity()
            ->performedOn($score)
            ->causedBy(Auth::user())
            ->log('This user: '. Auth::user()->first_name . ' ' . Auth::user()->last_name . ' added a ' . $score->remarks . ' score to user: '. $score->user->first_name .' '. $score->user->last_name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.dashboard')
            ->with('success','Successfully added a score!');
    }

    public function update(ScoreRequest $request, Score $score)
    {
        $score = $this->scoreServices->update($request->validated(), $score);

        activity()
            ->performedOn($score)
            ->causedBy(Auth::user())
            ->log('This user: '. Auth::user()->first_name . ' ' . Auth::user()->last_name . ' updated a ' . $score->remarks . ' score to user: '. $score->user->first_name .' '. $score->user->last_name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.dashboard')
            ->with('success','Successfully updated a score!');
    }
    
    public function destroy(Score $score)
    {
        $score = $this->scoreServices->destroy($score);

        activity()
            ->performedOn($score)
            ->causedBy(Auth::user())
            ->log('This user: '. Auth::user()->first_name . ' ' . Auth::user()->last_name . ' deleted a ' . $score->remarks . ' score to user: '. $score->user->first_name .' '. $score->user->last_name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.dashboard')
            ->with('success','Successfully deleted a score!');
    }
}
