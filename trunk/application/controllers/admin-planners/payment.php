<?php
session_start();

class payment extends CI_Controller {

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

    //1920201203545
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('javascript');
        $this->load->library('session');
        $this->load->library('smarty3', '', 'smarty');
        $this->load->model('admin-planners/setting_model', 'setting_model');
        include APPPATH . 'libraries/defu.php';
    }

    function pay2() {
        $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        $paypal_id = 'khpay_1352425525_biz@gmail.com';
        ?>
        <form action='<?= $paypal_url ?>' method='post' name='frmPayPal1'>
            <input type='hidden' name='business' value='<?= $paypal_id ?>'>
            <input type='hidden' name='cmd' value='_xclick'>

            <input type='hidden' name='item_name' value='Nexus 4 fake'>
            <input type='hidden' name='item_number' value='nexus4face'>
            <input type='hidden' name='amount' value='3'>

            <input type='hidden' name='no_shipping' value='1'>
            <input type='hidden' name='currency_code' value='USD'>
            <input type='hidden' name='handling' value='0'>
            <input type='hidden' name='cancel_return' value='<?= base_url("admin-planners/payment/cancelPayment") ?>'>
            <input type='hidden' name='return' value='<?= base_url("admin-planners/payment/returnPayment") ?>'>
            <input type='hidden' name='return_method' value='1'/>
            

            <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form> 
        <?
    }

    function pay1() {
        $req = 'cmd=_notify-validate';

        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }

// post back to PayPal system to validate
        $header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
        $fp = fsockopen('ssl://www.paypal.com', 443, $errno, $errstr, 30);

// assign posted variables to local variables
        $item_name = "AlPha"; //$_POST['item_name'];
        $item_number = "12";
        $_POST['item_number'];
        $payment_status = "";
        $_POST['payment_status'];
        $payment_amount = $_POST['mc_gross'];
        $payment_currency = $_POST['mc_currency'];
        $txn_id = $_POST['txn_id'];
        $receiver_email = $_POST['receiver_email'];
        $payer_email = $_POST['payer_email'];

        if (!$fp) {
// HTTP ERROR
        } else {
            fputs($fp, $header . $req);
            while (!feof($fp)) {
                $res = fgets($fp, 1024);
                if (strcmp($res, "VERIFIED") == 0) {
                    echo($res);
// check the payment_status is Completed
// check that txn_id has not been previously processed
// check that receiver_email is your Primary PayPal email
// check that payment_amount/payment_currency are correct
// process payment
                } else if (strcmp($res, "INVALID") == 0) {
// log for manual investigation
                }
            }
            fclose($fp);
        }
    }

    function cancelPayment() {
        echo "cancel";
    }

    function returnPayment() {
        $_SESSION["item_no"] = $_GET['item_number'];
        $_SESSION["item_transaction"] = $_GET['tx']; // Paypal transaction ID
        $_SESSION["item_price"] = $_GET['amt']; // Paypal received amount
        $_SESSION["item_currency"] = $_GET['cc']; // Paypal received currency type
        print_r($_SESSION);
        echo "return";
        return;
    }

}
?>