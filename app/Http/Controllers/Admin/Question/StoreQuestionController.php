<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuestionRequest;
use App\Services\Domain\Question\CreateQuestionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class StoreQuestionController extends Controller
{
    private CreateQuestionService $createQuestionService;

    public function __construct(CreateQuestionService $createQuestionService)
    {
        $this->createQuestionService = $createQuestionService;
    }

    public function __invoke(CreateQuestionRequest $request): RedirectResponse
    {
        try {
            $this->createQuestionService->create(
                $request->get('content'),
                $request->get('replies'),
                $request->get('correct_reply_index')
            );

            return redirect()
                ->route('admin.questions.index')
                ->with('success', 'Question has been added successfully.');
        } catch (Throwable $e) {
            Log::error('failed to create question', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
