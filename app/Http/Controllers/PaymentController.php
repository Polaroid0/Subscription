<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubscriptionPlanResource;
use App\Models\SubscriptionPlan;
use Inertia\Inertia;
use Inertia\Response;

class PaymentController extends Controller
{
    /**
     * Return selected plan.
     *
     * @param SubscriptionPlan $subscriptionPlan
     *
     * @return Response
     */
    public function show(SubscriptionPlan $subscriptionPlan): Response
    {
        return Inertia::render('Subscription/Payment', [
            'plan' => SubscriptionPlanResource::make($subscriptionPlan),
        ]);
    }
}
