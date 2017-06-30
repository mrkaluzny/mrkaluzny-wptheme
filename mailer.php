<?php
# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
require 'config.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun($api_key);
$domain = $domain_mg;
$message = 'Name: ' . $_POST[name] . '\n' . 'Email: ' . $_POST[email] . '\n' . 'Message: ' . $_POST[message] . '\n';

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Wojciech Kałużny <hello@mrkalzuny.com>',
    'to'      => 'Wojciech Kałużny <wk@mrkaluzny.com>',
    'subject' => 'New contact from mrklauzny.com!',
    'text'    => $message
));
?>
