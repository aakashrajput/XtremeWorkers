<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RazorpayController extends Controller
{
    public function wallet()
    {
        return view('PaymentGateway.wallet');
    }

    public function paymentrequest(Request $request)
    {
        $AmountInUsd = $request->input('AmountInUsd');
        $convertUSDtoINR = round(env("USDtoINR", "75.50")) * $AmountInUsd + 30;

        $mode = "Test";
        $secretKey = env("Cashfree_Test_Secret");
        $appId = env("Cashfree_Test_ID");
        $orderId = $request->input('orderId');
        $orderAmount = round($convertUSDtoINR);
        $orderCurrency = $request->input('orderCurrency');
        $orderNote = $request->input('orderNote');
        $customerName = $request->input('customerName');
        $customerPhone = $request->input('customerPhone');
        $customerEmail = $request->input('customerEmail');
        $returnUrl = "http://localhost:8000/paymentresponse";
        $notifyUrl = "http://localhost:8000/paymentrequest";
        $postData = array( 
            "appId" => $appId, 
            "orderId" => $orderId, 
            "orderAmount" => $orderAmount, 
            "orderCurrency" => $orderCurrency, 
            "orderNote" => $orderNote, 
            "customerName" => $customerName, 
            "customerPhone" => $customerPhone, 
            "customerEmail" => $customerEmail,
            "returnUrl" => $returnUrl, 
            "notifyUrl" => $notifyUrl,
          );

          if($orderAmount >= 500) {
            ksort($postData);
            $signatureData = "";
            foreach ($postData as $key => $value){
                $signatureData .= $key.$value;
            }
            $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
            $signature = base64_encode($signature);
        
            if ($mode == "PROD") {
              $url = "https://www.cashfree.com/checkout/post/submit";
            } else {
              $url = "https://test.cashfree.com/billpay/checkout/post/submit";
            }
        } else {
                return back()->with('status','Please enter amount more then or equal to 500 INR');
        }
            return view('PaymentGateway.pay')->with(compact('mode', 'secretKey','appId', 'orderId', 'orderAmount', 'orderCurrency', 'orderNote', 'customerName', 'customerPhone', 'customerEmail', 'returnUrl', 'notifyUrl', 'signature', 'url'));
    }


    public function paymentresponse(Request $request)
    {
         $secretkey = "d0f79ade54a5d6003caac4d2a70834d282f9e673";
		 $orderId = $request->input('orderId');
		 $orderAmount = $request->input('orderAmount');
		 $referenceId = $request->input('referenceId');
		 $txStatus = $request->input('txStatus');
		 $paymentMode = $request->input('paymentMode');
		 $txMsg = $request->input('txMsg');
		 $txTime = $request->input('txTime');
         $signature = $request->input('signature');
         $FinalAmount = (($orderAmount - 30)/round(env("USDtoINR", "75.50")));
        $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
		$hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
		$computedSignature = base64_encode($hash_hmac);
		if ($signature == $computedSignature) {
            return view('PaymentGateway.result')->with(compact('FinalAmount'));
        }

    }
}
