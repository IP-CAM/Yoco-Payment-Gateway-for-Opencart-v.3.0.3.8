<?php
class ControllerExtensionPaymentYoco extends Controller {
	private $error = array();

    const PAYMENT_URL = "marketplace/extension";
	const YOCO_LANGUAGE = "extension/payment/yoco";
    public function getToken(){
		return $this->session->data['user_token'];
	}
    public function formatPaymentUrl($path){
		$token = $this->getToken();
		return $this->url->link(
			$path,
			'user_token=' . $token . '&type=payment',
			true
		);
	}

    public function formatUrl($path){
		$token = $this->getToken();
		return $this->url->link(
			$path,
			"user_token=$token",
			true
		);
	}


	public function index() {
		$this->load->language('extension/payment/yoco');

        $this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');
        $this->load->model( 'localisation/order_status' );
		$this->load->model( 'localisation/geo_zone' );
       
	
        if (  ( $this->request->server['REQUEST_METHOD'] == 'POST' ) && $this->validate() ) {
            $this->model_setting_setting->editSetting( 'payment_yoco', $this->request->post );
            $this->session->data['success'] = $this->language->get( 'text_success' );
			$url = $this->formatPaymentUrl(self::PAYMENT_URL);
            $this->response->redirect($url);
        }

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
		$data['text_test'] = $this->language->get('text_test');
		$data['text_live'] = $this->language->get('text_live');
		$data['text_all_zones'] = $this->language->get('text_all_zones');

		$data['entry_live_public_key'] = $this->language->get('entry_live_public_key');
		$data['entry_live_secret_key'] = $this->language->get('entry_live_secret_key');
		$data['entry_test_public_key'] = $this->language->get('entry_test_public_key');
        $data['entry_test_secret_key'] = $this->language->get('entry_test_secret_key');
	//	$data['entry_transaction_type'] = $this->language->get('entry_transaction_type');
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');

  

		$data['help_total'] = $this->language->get('help_total');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');
		$data['button_clear'] = $this->language->get('button_clear');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		
        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get( 'text_home' ),
            'href' => $this->formatUrl('common/dashboard'),
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get( 'text_extension' ),
            'href' => $this->formatPaymentUrl(self::PAYMENT_URL),
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get( 'heading_title' ),
            'href' => $this->formatUrl(self::YOCO_LANGUAGE),
        );
        
        //  $data['action'] = $this->url->link('extension/payment/instapaywebpay', 'token=' . $this->session->data['user_token'], true);
        
        //  $data['cancel'] = $this->url->link('marketplace/extension', 'token=' . $this->session->data['user_token'] . '&type=payment', true);
       $data['action'] = $this->formatUrl(self::YOCO_LANGUAGE);
       $data['cancel'] = $this->formatPaymentUrl(self::PAYMENT_URL);
        
    
        
        $data['payment_yoco_total'] = $this->checkPostValue("payment_yoco_total");
		$data['payment_yoco_order_status_id'] = $this->checkPostValue("payment_yoco_order_status_id");
		$data['payment_yoco_success_order_status_id'] = $this->checkPostValue("payment_yoco_success_order_status_id");
		$data['payment_yoco_failed_order_status_id'] = $this->checkPostValue("payment_yoco_failed_order_status_id");
		$data['payment_yoco_cancelled_order_status_id'] = $this->checkPostValue("payment_yoco_cancelled_order_status_id");
     //   $data['payment_yoco_creditcardmethod'] = $this->checkPostValue("payment_yoco_creditcardmethod");
	//	$data['payment_yoco_banktransfermethod'] = $this->checkPostValue("payment_yoco_banktransfermethod");
	//	$data['payment_yoco_chipsmethod'] = $this->checkPostValue("payment_yoco_chipsmethod");
	//	$data['payment_yoco_masterpass'] = $this->checkPostValue("payment_yoco_masterpass");
     //   $data['payment_yoco_payatdeposit'] = $this->checkPostValue("payment_yoco_payatdeposit");
		$data['payment_yoco_geozone_id'] = $this->checkPostValue("payment_yoco_geozone_id");
        
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
        
        $data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();
        $data['payment_yoco_status'] = $this->checkPostValue("payment_yoco_status");
		$data['payment_yoco_sort_order'] = $this->checkPostValue("payment_yoco_sort_order");
		$data['payment_yoco_live_public_key'] = $this->checkPostValue("payment_yoco_live_public_key");
		$data['payment_yoco_test_public_key'] = $this->checkPostValue("payment_yoco_test_public_key");
        $data['payment_yoco_live_secret_key'] = $this->checkPostValue("payment_yoco_live_secret_key");
		$data['payment_yoco_test_secret_key'] = $this->checkPostValue("payment_yoco_test_secret_key");
        $data['payment_yoco_testmode'] = $this->checkPostValue("payment_yoco_testmode");

        $this->template = 'extension/payment/yoco';
        $this->children = array(
            'common/header',
            'common/footer'
        );
        
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');
        
       // $this->response->setOutput($this->load->view('extension/payment/instapaywebpay', $data));
        $this->response->setOutput( $this->load->view( self::YOCO_LANGUAGE, $data ) );
    }
    public function checkPostValue($var){
		return isset($this->request->post["$var"])?$this->request->post["$var"]:$this->config->get( "$var" );
	}
    protected function validate()
    {
        if ( !$this->user->hasPermission( 'modify', self::YOCO_LANGUAGE ) ) {
            $this->error['warning'] = $this->language->get( 'error_permission' );
        }

        return !$this->error;
    }
 
}

    
