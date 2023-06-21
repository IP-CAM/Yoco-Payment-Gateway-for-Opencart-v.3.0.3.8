<?php
// Heading
$_['heading_title'] = 'YOCO';

// Text
$_['text_extension'] = 'Extensions';
$_['text_success'] = 'Success: You have modified Yoco account details!';
$_['text_edit'] = 'Edit Yoco';
$_['text_yoco_checkout'] = 'Checkout with <a href="https://www.yoco.com/za/" target="_blank"><img src="catalog/view/theme/default/image/yoco_logo.svg" alt="YOCO" title="YOCO" style="border: 1px solid #EEEEEE;height:30px;" /></a>';

// Entry
$_['entry_merchant_uuid'] = 'Merchant UUID';
$_['entry_merchant_account_uuid'] = 'Merchant Account UUID';
$_['entry_security_key'] = 'Security Key';
$_['entry_test'] = 'Test Mode';
$_['entry_order_status'] = 'Order Status';
$_['entry_pending_status'] = 'Pending Status';
$_['entry_failed_status'] = 'Failed Status';
$_['entry_canceled_status'] = 'Canceled Status';
$_['entry_geo_zone'] = 'Geo Zone';
$_['entry_status'] = 'Status';
$_['entry_sort_order'] = 'Sort Order';

// Help
$_['help_merchant_uuid'] = 'The merchant UUID provided by Yoco.';
$_['help_merchant_account_uuid'] = 'The merchant account UUID provided by Yoco.';
$_['help_security_key'] = 'The security key provided by Yoco.';
$_['help_test'] = 'Use the test (sandbox) environment to process transactions.';
$_['help_order_status'] = 'The status of the order when the transaction is successfully completed.';
$_['help_pending_status'] = 'The status of the order when the transaction is pending.';
$_['help_failed_status'] = 'The status of the order when the transaction has failed.';
$_['help_canceled_status'] = 'The status of the order when the transaction is canceled.';

// Error
$_['error_permission'] = 'Warning: You do not have permission to modify YOCO!';
$_['error_merchant_uuid'] = 'Merchant UUID is required!';
$_['error_merchant_account_uuid'] = 'Merchant Account UUID is required!';
$_['error_security_key'] = 'Security Key is required!';

//Transaction statuses
$_['text_instapaywebpay_pending'] = 'Pending';
$_['text_instapaywebpay_processing'] = 'Processing';
$_['text_instapaywebpay_paid'] = 'Paid';
$_['text_instapaywebpay_failed'] = 'Failed';

//Payment form
$_['text_instapaywebpay_title'] = 'YOCO';
$_['text_instapaywebpay_description'] = 'Pay securely with YOCO';
$_['text_instapaywebpay_checkout'] = 'Pay via YOCO';

//Payment form fields
$_['text_instapaywebpay_payment_method'] = 'Payment method';
$_['text_instapaywebpay_card_number'] = 'Card number';
$_['text_instapaywebpay_expiry_date'] = 'Expiry date';
$_['text_instapaywebpay_cvv'] = 'CVV';
$_['text_instapaywebpay_pin'] = 'PIN';
$_['text_instapaywebpay_password'] = 'Password';
$_['text_instapaywebpay_token'] = 'Token';
$_['text_instapaywebpay_otp'] = 'OTP';

//Payment form buttons
$_['text_instapaywebpay_pay'] = 'Pay';
$_['text_instapaywebpay_confirm'] = 'Confirm payment';
$_['text_instapaywebpay_cancel'] = 'Cancel';

//Payment form errors
$_['error_instapaywebpay_invalid_card_number'] = 'Invalid card number';
$_['error_instapaywebpay_invalid_expiry_date'] = 'Invalid expiry date';
$_['error_instapaywebpay_invalid_cvv'] = 'Invalid CVV';
$_['error_instapaywebpay_invalid_pin'] = 'Invalid PIN';
$_['error_instapaywebpay_invalid_password'] = 'Invalid password';
$_['error_instapaywebpay_invalid_token'] = 'Invalid token';
$_['error_instapaywebpay_invalid_otp'] = 'Invalid OTP';
$_['error_instapaywebpay_payment_failed'] = 'Payment failed';

//Admin panel
$_['text_instapaywebpay_order_tab'] = 'YOCO';
$_['text_instapaywebpay_transaction_reference'] = 'Transaction Reference';
$_['text_instapaywebpay_transaction_amount'] = 'Transaction Amount';
$_['text_instapaywebpay_transaction_currency'] = 'Transaction Currency';
$_['text_instapaywebpay_transaction_status'] = 'Transaction Status';
$_['text_instapaywebpay_transaction_date_added'] = 'Date Added';

// Text
$_['text_title'] = 'YOCO';
$_['text_testmode'] = 'Warning: The payment gateway is in \'Test Mode\'. Your account will not be charged.';
$_['text_card_details'] = 'Card Details';
$_['text_eft_details'] = 'Instant EFT Details';
$_['text_masterpass_details'] = 'Masterpass Details';
$_['text_chips_details'] = 'CHIPS Details';
$_['text_payat_details'] = 'Pay@ Details';

// Entry
$_['entry_card_number'] = 'Card number';
$_['entry_expiration_date'] = 'Expiration date (MM/YYYY)';
$_['entry_cvv'] = 'CVV';
$_['entry_masterpass_email'] = 'Masterpass Email';
$_['entry_masterpass_password'] = 'Masterpass Password';

// Button
$_['button_confirm'] = 'Confirm';

// Statuses
$_['instapaywebpay_order_statuses'] = [
    'instapaywebpay_success_status_id' => 2,
    'instapaywebpay_pending_status_id' => 1,
    'instapaywebpay_failed_status_id' => 10
];

// Transaction statuses
$_['instapaywebpay_transaction_statuses'] = [
    'pending' => 'Pending',
    'processed' => 'Processed',
    'failed' => 'Failed',
    'cancelled' => 'Cancelled'
];

// Error messages
$_['error_instapaywebpay_missing_merchant_uuid'] = 'Merchant UUID is missing';
$_['error_instapaywebpay_missing_security_key'] = 'Security key is missing';
$_['error_instapaywebpay_missing_merchant_account_uuid'] = 'Merchant Account UUID is missing';
$_['error_instapaywebpay_invalid_response'] = 'Invalid response received from payment gateway';
$_['error_instapaywebpay_failed_transaction'] = 'Transaction failed';
$_['error_instapaywebpay_invalid_payment_method'] = 'Invalid payment method';
$_['error_instapaywebpay_missing_order_id'] = 'Order ID is missing';
$_['error_instapaywebpay_missing_currency'] = 'Currency is missing';
$_['error_instapaywebpay_missing_amount'] = 'Amount is missing';
$_['error_instapaywebpay_missing_customer'] = 'Customer is missing';
$_['error_instapaywebpay_missing_customer_first_name'] = 'Customer first name is missing';
$_['error_instapaywebpay_missing_customer_last_name'] = 'Customer last name is missing';
$_['error_instapaywebpay_missing_customer_email'] = 'Customer email is missing';
$_['error_instapaywebpay_missing_customer_phone'] = 'Customer phone is missing';
$_['error_instapaywebpay_invalid_payment_data'] = 'Invalid payment data';
$_['error_instapaywebpay_invalid_instapay_response'] = 'Invalid Instapay response';

?>
