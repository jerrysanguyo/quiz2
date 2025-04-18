<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\DataTables\CmsDataTable;
use App\Http\Requests\QuestionRequest;
use App\Services\QuestionService;
use Illuminate\Http\Request;

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
        $data = Question::getAllQuestions();

        return $dataTable->render('cms.view', compact(
            'dataTable',
            'page_title',
            'resource',
            'data'
        ));
    }
    
    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show(Question $question)
    {
        //
    }
    
    public function edit(Question $question)
    {
        //
    }
    public function update(Request $request, Question $question)
    {
        //
    }
    
    public function destroy(Question $question)
    {
        //
    }
}
