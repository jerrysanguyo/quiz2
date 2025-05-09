<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\DataTables\CmsDataTable;
use App\Http\Requests\QuestionRequest;
use App\Services\QuestionService;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    protected $questionServices;

    public function __construct(QuestionService $questionService)
    {
        $this->questionServices = $questionService;
    }

    public function index(CmsDataTable $dataTable)
    {
        $page_title = 'Question';
        $resource = 'question';
        $columns = ['id', 'questions', 'choices', 'action'];
        $data = Question::getAllQuestions();

        return $dataTable->render('cms.index', compact(
            'dataTable',
            'page_title',
            'resource',
            'columns',
            'data'
        ));
    }

    public function store(QuestionRequest $request)
    {
        $question = $this->questionServices->store($request->validated());

        activity()
            ->performedOn($question)
            ->causedBy(Auth::user())
            ->log('Added a question: '. $question->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.question.index')
            ->with('success', 'Question added successfully!');
    }
    
    public function update(QuestionRequest $request, Question $question)
    {
        $question = $this->questionServices->update($request->validated(), $question);

        activity()
            ->performedOn($question)
            ->causedBy(Auth::user())
            ->log('Updated a question: '.$question->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.question.index')
            ->with('success', 'Question updated successfully!');
    }
    
    public function destroy(Question $question)
    {
        $question = $this->questionServices->destroy($question);

        activity()
            ->performedOn($question)
            ->causedBy(Auth::user())
            ->log('Deleted a question: '.$question->name);

        return redirect()
            ->route(Auth::user()->getRoleNames()->first() . '.question.index')
            ->with('success', 'Question deleted successfully!');
    }
}
