<?php

use Omnipay\Omnipay;

class PayPalController extends BaseController {

    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Express');
        $this->gateway->setUsername('csc_api1.csc-app.info');
        $this->gateway->setPassword('1407734273');
        $this->gateway->setSignature('A4iCcjpHlJ2GLA7UgerFhkvlf6GqATQIaHnfHdoppyhFVRDK-sVJz3K1');
        $this->gateway->setTestMode(true);
    }

    public function paymentCreditCard()
    {
        $title = 'Payment CreditCard Page';
        return View::make('paypal.payment-creditcard', compact('title'));
    }

    public function paymentPayPal()
    {
        $title = 'Payment PayPal Page';
        return View::make('paypal.payment-paypal', compact('title'));
    }

    public function buyWithPayPal()
    {
        $applicant = DB::table('applicants')
                        ->select('applicants.id', 'applicants.new_exam_level', 'applicants.controlno')
                        ->where('controlno', Input::get('controlNumber'))
                        ->first();

        if ( isset($applicant) )
        {
            $response = $this->gateway->purchase([
                'cancelUrl'     =>  'http://dev.csc/cancel-payment',
                'returnUrl'     =>  'http://dev.csc/success-payment/' . $applicant->id,
                'description'   =>  'CSC - ' . $applicant->new_exam_level . ' Exam',
                'amount'        =>  '500.00',
                'currency'      =>  'PHP'
            ])->send();

            $response->redirect();
        }
        else
        {
            return Redirect::back()->withMessage('Control # does not exist. Try again.');
        }

    }

    public function buyWithCreditCard()
    {
        $applicant = DB::table('applicants')
                        ->select('applicants.id', 'applicants.new_exam_level')
                        ->where('controlno', Input::get('controlNumber'))
                        ->first();

        $formData = [
            'firstName'     =>  Input::get('firstName'),
            'lastName'      =>  Input::get('lastName'),
            'number'        =>  Input::get('number'),
            'expiryMonth'   =>  Input::get('expiryMonth'),
            'expiryYear'    =>  Input::get('expiryYear'),
            'cvv'           =>  Input::get('cvv')
        ];

        $response = $this->gateway->purchase([
            'cancelUrl'     =>  'http://dev.csc/cancel-payment',
            'returnUrl'     =>  'http://dev.csc/success-payment/' . $applicant->id,
            'description'   =>  'CSC - ' . $applicant->new_exam_level . ' Exam',
            'amount'        =>  '500.00',
            'currency'      =>  'PHP',
            'card'          =>  $formData
        ])->send();

        $response->redirect();
    }

    public function successPayment($applicantId)
    {
        $transactionNumber = Input::get('token');
        // Make this customize using DB::table('applicants')
        $applicant = Applicant::find($applicantId);
        $applicant->paid_status = 1;
        $applicant->save();

        $payment = Payment::find($applicantId);
        $payment->transaction_number = $transactionNumber;
        $payment->paid_date = date('Y-m-d');
        $payment->save();

        $testing = DB::table('testing_centers')
                            ->select('testing_centers.location')
                            ->where('testing_centers.id', $applicant->testing_centers_location_id)
                            ->first();

        $title = 'Success Payment Page';
        return View::make('paypal.success-payment', compact('title', 'transactionNumber', 'applicant', 'testing'));
    }

}