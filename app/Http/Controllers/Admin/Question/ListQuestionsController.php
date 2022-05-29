<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Services\Core\Question\QuestionService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ListQuestionsController extends Controller
{
    private QuestionService $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function __invoke()
    {
        try {
            $questions = $this->questionService->getAll();

            return view('admin.questions.index')
                ->with('questions', $questions);
        } catch (Throwable $e) {
            Log::error('failed to list questions page', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
