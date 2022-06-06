<?php

namespace App\Http\Controllers\Client\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use App\Services\Core\Question\QuestionService;
use Illuminate\Support\Facades\Log;
use Throwable;

class AskQuizController extends Controller
{
    private QuestionService $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function __invoke()
    {
        try {
            /** @var User $user */
            $user = auth()->guard('web')->user();

            $question = $this->questionService->getAllNotSeenByUser($user)->first();
            if ( ! $question instanceof Question) {
                return redirect()
                    ->route('dashboard.home')
                    ->with('success', __('All questions answered!'));
            }

            return view('client.quiz.ask')
                ->with('question', $question);
        } catch (Throwable $e) {
            Log::error('failed to show question', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('home')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}
