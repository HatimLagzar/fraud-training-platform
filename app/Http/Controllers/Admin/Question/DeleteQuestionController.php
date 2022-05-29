<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Services\Core\Question\QuestionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class DeleteQuestionController extends Controller
{
    private QuestionService $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function __invoke(Question $question): RedirectResponse
    {
        try {
            $this->questionService->destroy($question);

            return redirect()
                ->route('admin.questions.index')
                ->with('success', 'Question has been removed successfully.');
        } catch (Throwable $e) {
            Log::error('failed to delete question', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
