<?php
echo '<pre>';
require_once('./ApiService.php');

$payload = array(
  'partnerTransaction' => '1523695648',
  'desc' => "Thanh toán giao dịch",
  'ipnUrl' => "https://domain.com/ipn",
  'redirectUrl' => "https://domain.com/success",
  'failedUrl' => "https://domain.com/fail",
  'amount' => 10000
);

$domain = 'https://sbx-gapi.payme.vn';
$xApiClient = '28209420';
$secretKey = '24961f69cb337f08b63457317d5c97b5';

$apiService = new ApiService('', $xApiClient, $secretKey, $domain);
$result = $apiService->createPaymentWeb($payload);
print_r($result);

echo '<br>';
$payloadQuery = array(
  'partnerTransaction' => '1523695648',
);
$resultQuery = $apiService->query($payloadQuery);
print_r($resultQuery);

echo '<br>';
$payloadRefund = array(
  'partnerTransaction' => '8965314569',
  'transaction' => "5838702517",
  'reason' => "Hết voucher",
  'amount' => 10000
);
$resultRefund = $apiService->refund($payloadRefund);
print_r($resultRefund);

?>