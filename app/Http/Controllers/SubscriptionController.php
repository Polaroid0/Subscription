<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Http\Resources\SubscriptionResource;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Services\DummyPaymentService;
use App\Services\ProcessPaymentAndSubscriptionService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class SubscriptionController extends Controller
{
    /**
     * Return a list of plans with view.
     *
     * @return Response
     */
    public function index(): Response
    {
        $plans = SubscriptionPlan::all();

        return Inertia::render('Subscription/Index', [
            'plans' => $plans,
        ]);
    }

    /**
     * Return a status view with subscription and payments.
     *
     * @return Response
     */
    public function status(): Response
    {
        $subscription = Subscription::query()
            ->with([
                'subscriptionPlan',
            ])
            ->where('user_id', auth()->id())
            ->where('end_date', '>', now())
            ->latest()
            ->first();

        $payments = Payment::query()
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return Inertia::render('Subscription/Status', [
            'subscription' => $subscription ? SubscriptionResource::make($subscription) : null,
            'payments' => PaymentResource::collection($payments),
        ]);
    }

    /**
     * Process the payment and create a subscription.
     *
     * @param SubscriptionPlan $subscriptionPlan
     * @param PaymentRequest $request
     *
     * @return RedirectResponse
     */
    public function processPayment(SubscriptionPlan $subscriptionPlan, PaymentRequest $request): RedirectResponse
    {
        try {
            $paymentResult = (new DummyPaymentService())->processPayment();

            if ($paymentResult['success']) {
                (new ProcessPaymentAndSubscriptionService($subscriptionPlan, $request, $paymentResult))->processPayment();

                Log::info('Payment processed successfully', [
                    'user_id' => auth()->id(),
                    'transaction_id' => $paymentResult['transaction_id'],
                ]);

                return redirect()->route('subscription.status');
            }

            Log::warning('Payment failed', [
                'user_id' => auth()->id(),
                'error' => $paymentResult['message'],
            ]);

            return back()->with('error', $paymentResult['message']);
        } catch (Exception $e) {
            Log::error('Payment processing error', [
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
            ]);

            return back()->with('errors', 'An error occurred while processing the payment');
        }
    }
}
