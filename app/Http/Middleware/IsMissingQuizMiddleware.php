<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\Core\Question\QuestionService;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsMissingQuizMiddleware
{
    private QuestionService $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     *
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = auth()->guard('web')->user();

        $questions = $this->questionService->getAllNotSeenByUser($user);

        if ($questions->count() > 0) {
            return redirect()
                ->route('dashboard.quiz.ask')
                ->with('error', 'You are missing some important training, please take the quick quiz.');
        }

        return $next($request);
    }
}
