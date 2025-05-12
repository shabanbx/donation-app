<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Stripe\StripeClient;

class DonationForm extends Component
{
    public int    $step          = 1;
    public string $donationType  = 'one_time';  // one_time or monthly
    public string $name          = '';
    public string $email         = '';
    public string $campaign      = 'Night Bright';
    public ?float $amount        = null;
    public bool   $anonymous     = false;
    public bool   $showMessage   = false;
    public string $message       = '';

    public $hello = '';

    // Step 2
    #[Validate('required', message: 'Payment Method is required.')]
    public  $paymentMethod = null; // 0.00 for no fee, 0.029 for Stripe fee

    public float  $tip           = 0.12;      // 12% default
    public bool   $allowContact  = false;
    // 12% default

    protected function rulesStep1()
    {
        return [
            'name'     => 'required|min:2',
            'email'    => 'required|email:filter',
            'campaign' => 'required',
            'amount'   => 'required|numeric|min:1',
        ];
    }

    protected function rulesStep2()
    {
        return [
            'paymentMethod' => 'required',
        ];
    }

    public function nextStep()
    {
        $this->validate($this->rulesStep1());
        $this->step = 2;
    }

    public function previousStep()
    {
        $this->step = 1;
    }

    public function submit()
    {
        $this->validate($this->rulesStep2());



        // if ($this->paymentMethod == 0.00) {
        //     return;
        // }

        $stripe = new StripeClient(config('services.stripe.secret'));

        // 2) Create a Checkout Session
        $session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'mode'                 => 'payment',
            'line_items'           => [[
                'price_data' => [
                    'currency'     => 'usd',
                    'unit_amount'  => (int) round($this->getTotalProperty() * 100),
                    'product_data' => [
                        'name' => 'Missionary Donation',
                    ],
                ],
                'quantity' => 1,
            ]],
            'success_url' => config('services.stripe.success_url'),
            'cancel_url'  => config('services.stripe.cancel_url'),
        ]);

        // 3) Redirect the user to Stripe Checkout
        return redirect()->to($session->url);
    }

    public function toggleMessage()
    {
        $this->showMessage = ! $this->showMessage;
    }



    public function getTotalProperty(): float
    {
        $base   = $this->amount  ?? 0;
        $tipAmt = $base * $this->tip;
        $feeAmt = $base * $this->paymentMethod ?? 0;
        return $base + $tipAmt + $feeAmt;
    }

    public function render()
    {
        return view('livewire.donation-form', [
            'total' => $this->getTotalProperty(),
        ]);
    }
}
