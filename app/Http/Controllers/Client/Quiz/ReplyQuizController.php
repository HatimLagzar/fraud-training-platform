<?php

namespace App\Http\Controllers\Client\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReplyQuizRequest;
use App\Models\Question;
use App\Models\Reply;
use App\Models\User;
use App\Services\Core\Question\QuestionService;
use App\Services\Core\Reply\ReplyService;
use App\Services\Domain\Quiz\ReplyQuizService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ReplyQuizController extends Controller
{
    private QuestionService $questionService;
    private ReplyQuizService $replyQuizService;
    private ReplyService $replyService;

    public function __construct(
        QuestionService $questionService,
        ReplyQuizService $replyQuizService,
        ReplyService $replyService
    ) {
        $this->questionService  = $questionService;
        $this->replyQuizService = $replyQuizService;
        $this->replyService     = $replyService;
    }

    public function __invoke(ReplyQuizRequest $request, ?string $locale, Question $question)
    {
        try {
            /** @var User $user */
            $user = auth()->guard('web')->user();

            $reply = $this->replyService->findById($request->get('reply_id'));
            if ( ! $reply instanceof Reply) {
                return redirect()
                    ->back()
                    ->with('error', 'Reply not found!');
            }

            $question = $this->questionService->findById($question->getId());

            $userResponse = $this->replyQuizService->reply($user, $question, $reply);

            return view('client.quiz.result')
                ->with('question', $question)
                ->with('userResponse', $userResponse);
        } catch (Throwable $e) {
            Log::error('failed to reply to question', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
