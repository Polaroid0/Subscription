<?php

namespace App\Services;

use App\Http\Enums\PaymentStatusEnum;
use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;

readonly class ProcessPaymentAndSubscriptionService
{
    /**
     * Constructor.
     *
     * @param SubscriptionPlan $plan
     * @param PaymentRequest $request
     * @param array $paymentResult
     */
    public function __construct(
        private SubscriptionPlan $plan,
        private PaymentRequest $request,
        private array $paymentResult
    ) {}

    /**
     * Process payment and subscription.
     *
     * @return void
     */
    public function processPayment(): void
    {
        $payment = Payment::query()->create([
            'user_id' => $this->request->user()->id,
            'transaction_id' => $this->paymentResult['transaction_id'],
            'card_holder_name' => $this->request->validated('card_holder_name'),
            'card_number' => $this->request->validated('card_number'),
            'card_exp' => $this->request->validated('card_exp'),
            'card_cvv' => $this->request->validated('card_cvv'),
            'amount' => $this->plan->price,
            'status' => PaymentStatusEnum::PAID->value,
        ]);

        Subscription::query()->create([
            'payment_id' => $payment->id,
            'user_id' => $this->request->user()->id,
            'subscription_plan_id' => $this->plan->id,
            'end_date' => now()->addMonth(),
        ]);
    }
}