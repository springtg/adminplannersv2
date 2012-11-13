<?php

session_start();

class paypalcart extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    private $_configs = null;

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('javascript');
        $this->load->library('session');
        $this->load->library('smarty3', '', 'smarty');
        include APPPATH . 'libraries/defu.php';
    }
    function paypalCancel(){
        
    }
    function paypalReturn(){
        
    }
    function paypalNotify(){
        
    }
    function index() {
        $config=array(
            "currencyCode"  =>"USD",
            "paypalID"      =>"khsale_1352425073_biz@gmail.com",
            "returnUrl"     =>base_url("admin-planners/paypalcart/paypalReturn"),
            "notifyUrl"     =>base_url("admin-planners/paypalcart/paypalNotify"),
            "cancelUrl"     =>base_url("admin-planners/paypalcart/paypalCancel"),
            "paypalsandbox" =>true,
            "paypalhttps"   =>true
        );
        $jcart=array(
            array(
                "id"=>"P500",
                "name"=>"LG P500 - Red",
                "price"=>"2.99",
                "qty"=>"1"
            ),
            array(
                "id"=>"GoogleNexus7",
                "name"=>"Google Nexus 7 - Case",
                "price"=>"5.99",
                "qty"=>"1"
            )
        );
        

        // Build the query string
        $queryString = "?cmd=_cart";
        $queryString .= "&upload=1";
        $queryString .= "&charset=utf-8";
        $queryString .= "&currency_code=" . urlencode($config['currencyCode']);
        $queryString .= "&business=" . urlencode($config['paypalID']);
        $queryString .= "&return=" . urlencode($config['returnUrl']);
        $queryString .= '&notify_url=' . urlencode($config['notifyUrl']);
        
        $count = 1;
        foreach ($jcart as $item) {
            $queryString .= '&item_number_' . $count . '=' . urlencode($item['id']);
            $queryString .= '&item_name_' . $count . '=' . urlencode($item['name']);
            $queryString .= '&amount_' . $count . '=' . urlencode($item['price']);
            $queryString .= '&quantity_' . $count . '=' . urlencode($item['qty']);

            // Increment the counter
            ++$count;
        }

        
        
        // Add the sandbox subdomain if necessary
        $sandbox = '';
        if ($config['paypalsandbox'] === true) {
            $sandbox = '.sandbox';
        }
        // Use HTTPS by default
        $protocol = 'https://';
        if ($config['paypalhttps'] == false) {
            $protocol = 'http://';
        }
        // Send the visitor to PayPal https://www.sandbox.paypal.com/cgi-bin/webscr
        
        $url=$protocol . 'www' . $sandbox . '.paypal.com/cgi-bin/webscr' . $queryString;
        echo "<a href='$url'>Buy now</a>";
        //@header("Location: $url");
        
    }

}

?>