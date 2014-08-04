<?php

use Omnipay\Omnipay;

class PayPalController extends BaseController {

    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Express');
        $this->gateway->setUsername('probux0214-facilitator_api1.gmail.com');
        $this->gateway->setPassword('1407047087');
        $this->gateway->setSignature('AFcWxV21C7fd0v3bYYYRCpSSRl31AMmbxO2zNqoK5cDMjvwzQ6JGPQ6N');
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
                        ->select('applicants.id', 'applicants.new_exam_level')
                        ->where('controlno', Input::get('controlNumber'))
                        ->first();

        $response = $this->gateway->purchase([
            'cancelUrl'     =>  'http://dev.csc/cancel-payment',
            'returnUrl'     =>  'http://dev.csc/success-payment/' . $applicant->id,
            'description'   =>  'CSC - ' . $applicant->new_exam_level . ' Exam',
            'amount'        =>  '500.00',
            'currency'      =>  'PHP'
        ])->send();

        $response->redirect();
    }

    public function buyWithCreditCard()
    {
        $controlNumber = Input::get('controlNumber');

        $applicant = DB::table('applicants')
                        ->select('applicants.id')
                        ->where('controlno', $controlNumber)
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
            'returnUrl'     =>  'http://dev.csc/success-payment/' . $applicant->id,
            'description'   =>  'CSC - Professional Exam',
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

        $title = 'Success Payment Page';
        return View::make('paypal.success-payment', compact('title', 'transactionNumber', 'applicant'));
    }

//    public function successPayment()
//    {
//        $response = $this->gateway->purchase([
//            'cancelUrl'     =>  'http://dev.csc/cancel-payment',
//            'returnUrl'     =>  'http://dev.csc/success-payment',
//            'description'   =>  'CSC - Professional Exam',
//            'amount'        =>  500.00,
//            'currency'      =>  'PHP'
//        ])->send();
//
//        $data = $response->getData();
//
//        if ($data['ACK'] == 'Success')
//        {
//            echo 'Yehey';
//        }
//        else
//        {
//            echo 'Im sad';
//        }
//
//    }
}