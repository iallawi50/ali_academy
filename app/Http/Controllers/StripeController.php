<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Stripe\Charge;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function index()
    {
        return view("stripe.index");
    }
    public function store(Request $request, Course $course)
    {

       if(Gate::allows("has-course", $course)){
        return redirect()->route("courses.show", $course->id);
       }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'sar',
                        'product_data' => [
                            'name' => $course->title,
                            "description" => $course->description,

                        ],
                        'unit_amount'  => $course->price * 100,
                    ],
                    'quantity'   => 1,
                ],
            ],


            'mode'        => 'payment',
            'success_url' => route("checkout.success") . "?course_id=$course->id&session_id={CHECKOUT_SESSION_ID}",
            'cancel_url'  => route("courses.show", $course->id),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // return Session::all();
        $data = Session::retrieve($request->session_id);
        if(Session::retrieve($request->session_id)->payment_status == "paid")
        {
            Invoice::create([
                "user_id" => auth()->id(),
                "course_id" => $request->course_id,
                "payment_status" => $data->payment_status,
                "status" => $data->status,
                "amount" => $data->amount_total,
                "session_id" => $data->id
            ]);

            return redirect()->route("homepage")->with("flash.banner", __("Purchase successful"));
        }
    }
}
