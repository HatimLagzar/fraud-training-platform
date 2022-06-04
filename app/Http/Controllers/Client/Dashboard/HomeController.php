<?php

namespace App\Http\Controllers\Client\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Core\Question\QuestionService;
use Illuminate\Support\Facades\Log;
use Throwable;

class HomeController extends Controller
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

            $questions = $this->questionService->getAllNotSeenByUser($user);

            return view('client.dashboard.home')
                ->with('questions', $questions);
        } catch (Throwable $e) {
            Log::error('failed to show dashboard home', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('home')
                ->with('error', 'Error occurred, please retry later.');
        }
    }
}
