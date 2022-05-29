<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Services\Domain\Question\UpdateQuestionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class UpdateQuestionController extends Controller
{
    private UpdateQuestionService $updateQuestionService;

    public function __construct(UpdateQuestionService $updateQuestionService)
    {
        $this->updateQuestionService = $updateQuestionService;
    }

    public function __invoke(UpdateQuestionRequest $request, Question $question): RedirectResponse
    {
        try {
            $this->updateQuestionService->update(
                $question,
                $request->get('content'),
                $request->get('replies'),
                $request->get('correct_reply_index')
            );

            return redirect()
                ->route('admin.questions.index')
                ->with('success', 'Question has been updated successfully.');
        } catch (Throwable $e) {
            Log::error('failed to update question', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
