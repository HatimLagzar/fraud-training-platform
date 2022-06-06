<?php

namespace App\Http\Controllers\Admin\Subscription;

use App\Http\Controllers\Controller;
use App\Services\Core\RequestCancelSubscription\RequestCancelSubscriptionService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShowRequestsToCancelController extends Controller
{
    private RequestCancelSubscriptionService $requestCancelSubscriptionService;

    public function __construct(RequestCancelSubscriptionService $requestCancelSubscriptionService)
    {
        $this->requestCancelSubscriptionService = $requestCancelSubscriptionService;
    }

    public function __invoke()
    {
        try {
            $requests = $this->requestCancelSubscriptionService->getAll();

            return view('admin.subscription.requests.index')
                ->with('requests', $requests);
        } catch (Throwable $e) {
            Log::error('failed to show requests to cancel page', [
                'error_message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}