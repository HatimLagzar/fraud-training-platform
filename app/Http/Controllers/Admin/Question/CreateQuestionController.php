<?php

namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Throwable;

class CreateQuestionController extends Controller
{
    public function __invoke()
    {
        try {
            return view('admin.questions.create');
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
