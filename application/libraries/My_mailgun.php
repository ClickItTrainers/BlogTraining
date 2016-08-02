<?php
include("./vendor/autoload.php");
use Mailgun\Mailgun;
class My_mailgun
{
    function __construct() 
    {
        

    }
  
    public function send($user, $to)
    {
				$mg = new Mailgun("key-28e1d7ad1f75eb5e57fc31e8ad82ba0d");
				$domain = "sandbox39c07cb722944b80b3b9f9cb1987df70.mailgun.org";
				$mg->sendMessage($domain, array(
				'from'=>'admin@menablog.com',
				'to'=> $to,
				'subject' => 'El usuario '.$user.' comentó tu entrada',
				'text' => 'El usuario '.$user.' comentó tu entrada, revisala cuanto antes.'));
    }
  
  
}