<?php

use Yoco\YocoClient;
use Yoco\Exceptions\;
class ModelExtensionPaymentYoco extends Model
{

    public function getMethod( $address, $total )
    {
        $this->load->language( 'extension/payment/yoco' );

        $query = $this->db->query( "SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int) $this->config->get( 'payment_yoco_geo_zone_id' ) . "' AND country_id = '" . (int) $address['country_id'] . "' AND (zone_id = '" . (int) $address['zone_id'] . "' OR zone_id = '0')" );

        // if ( $this->config->get( 'payment_yoco_total' ) > 0 && $this->config->get( 'payment_yoco_total' ) > $total ) {
        //     $status = false;
        // } else
        if ( !$this->config->get( 'payment_yoco_geo_zone_id' ) ) {
            $status = true;
        } elseif ( $query->num_rows ) {
            $status = true;
        } else {
            $status = false;
        }

        $method_data = array();

        if ( $status ) {
            $method_data = array(
                'code'       => 'yoco',
                'title'      => 'Checkout with <img src="'.$this->config->get('config_ssl').'catalog/view/theme/default/image/yoco_logo.svg" alt="YOCO" title="YOCO" style="border: 0;height:30px;" />',
                'terms'      => '',
                'sort_order' => $this->config->get( 'payment_yoco_sort_order' ),
            );
        }

      

        return $method_data;
    }

    public  function log_to_file($data) {
        $this->logger(($data));
		$dateTime  = new DateTime();
		$date = $dateTime->format( 'Ymd' );
		$time = $dateTime->format( 'H:i:s' );
       file_put_contents('/var/www/logs/yoko_return_'.$date.'.log','['.$time.'] '.  implode("\n          ", $data) . "\n", FILE_APPEND);
		$output = json_encode($data);
		file_put_contents('/var/www/logs/yoko_json_'.$date.'.log','['.$time.'] '.  $output . "\n", FILE_APPEND);
    }

    public function logger($message) {
		//if ($this->config->get('payment_g2apay_debug') == 1) {
			$log = new Log('yoco.log');
			$backtrace = debug_backtrace();
			$log->write('Origin: ' . $backtrace[6]['class'] . '::' . $backtrace[6]['function']);
			$log->write(print_r($message, 1));
		//}
	}

    public function PostPayment($secret_key, $private_key,$token, $amountInCents, $currency, $metadata = [], $retry = false) {
		//if ($this->config->get('payment_g2apay_debug') == 1) {
            $client = new YocoClient($secret_key, $private_key);	
		try{
			// use the token received from the Web SDK
	return $client->charge($token, $amountInCents, $currency, $metadata);
		} catch (ApiKeyException $e) {
			$this->log_to_file("API keys incorrect: " . $e->getMessage());
		} catch (DeclinedException $e) {
			$this->log_to_file("Charge declined with error: " . $e->getMessage());
		} catch (InternalException $e) {
			$this->log_to_file("Unknown error: " . $e->getMessage());
		}
			
		//}
	}

	public function addHistory($order_id, $order_status_id, $comment) {

        $this->db->query("UPDATE `" . DB_PREFIX . "order` SET order_status_id = '" . (int)$order_status_id . "', date_modified = NOW() WHERE order_id = '" . (int)$order_id . "'");

        $this->db->query("INSERT INTO " . DB_PREFIX . "order_history SET order_id = '" . (int)$order_id . "', order_status_id = '" . (int)$order_status_id . "', notify = '0', comment = '" . $this->db->escape($comment) . "', date_added = NOW()");
	}

    public function addCustomerHistory($customer_id,  $comment) {


        $this->db->query("INSERT INTO " . DB_PREFIX . "customer_history SET customer_id = '" . (int)$customer_id . "', comment = '" . $this->db->escape($comment) . "', date_added = NOW()");
	}
   
    public function addCustomerTransaction($customer_id, $description, $amount = '', $order_id = 0) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "customer_transaction SET customer_id = '" . (int)$customer_id . "', order_id = '" . (float)$order_id . "', description = '" . $this->db->escape($description) . "', amount = '" . (float)$amount . "', date_added = NOW()");
	}

}
