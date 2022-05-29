<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Services\Core\Reply\ReplyService;
use Illuminate\Support\Facades\Log;
use Throwable;

class EditQuestionController extends Controller
{
    private ReplyService $replyService;

    public function __construct(ReplyService $replyService)
    {
        $this->replyService = $replyService;
    }

    public function __invoke(Question $question)
    {
        try {
            $replies = $this->replyService->getAllByQuestion($question);

            return view('admin.questions.edit')
                ->with('question', $question)
                ->with('replies', $replies);
        } catch (Throwable $e) {
            Log::error('failed to show create question page', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
