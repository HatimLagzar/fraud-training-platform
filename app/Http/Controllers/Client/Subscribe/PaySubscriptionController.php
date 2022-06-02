<?php

namespace App\Http\Controllers\Client\Subscribe;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Throwable;

class PaySubscriptionController extends Controller
{
    const PLAN_STRIPE_ID = 'price_1L6H4aLFLr5fmzuyr6U5eLqC';

    public function __invoke(Request $request)
    {
        try {
            /** @var User $user */
            $user = auth()->user();

            if ($user->subscribed()) {
                return redirect()
                    ->route('dashboard.home')
                    ->with('error', 'You are already subscribed!');
            }

            $user->newSubscription('default', self::PLAN_STRIPE_ID)
                 ->create($request->get('paymentMethodId'));

            return redirect()
                ->route('dashboard.home')
                ->with('success', 'You have subscribed successfully.');
        } catch (IncompletePayment $e) {
            Log::error('failed to subscribe due to incomplete payment', [
                'error_message' => $e->getMessage(),
            ]);

            mail('lhatimdev@gmail.com', 'Failed Subscription Fraud Training', $e->getMessage());

            return redirect()
                ->back()
                ->with('error', 'Failed to subscribe due to incomplete payment.');
        } catch (Throwable $e) {
            Log::error('failed to subscribe', [
                'error_message' => $e->getMessage(),
                'error_trace'   => Str::limit($e->getTraceAsString(), 500)
            ]);

            return redirect()
                ->back()
                ->with('error', 'Error occurred, please retry later.');
        }
    }
}
