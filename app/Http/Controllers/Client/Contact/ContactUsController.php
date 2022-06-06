<?php

namespace App\Http\Controllers\Client\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendMailRequest;
use App\Services\Domain\Contact\ContactUsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class ContactUsController extends Controller
{

    private ContactUsService $contactUsService;

    public function __construct(ContactUsService $contactUsService)
    {
        $this->contactUsService = $contactUsService;
    }

    public function __invoke(SendMailRequest $request): RedirectResponse
    {
        try {
            $this->contactUsService->send(
                $request->get('name'),
                $request->get('email'),
                $request->get('subject'),
                $request->get('message'),
            );

            return redirect()
                ->back()
                ->with('success', __('Your message has been sent successfully.'));
        } catch (Throwable $e) {
            Log::error('failed to contact us', [
                'error_trace' => $e->getMessage()
            ]);

            return redirect()
                ->back()
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}