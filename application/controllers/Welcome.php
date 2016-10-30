<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Welcome
 *
 * @author sonjoy
 */
class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('tank_auth');
        $this->lang->load('tank_auth');
    }
    //put your code here
    function index() {
        $results = $this->db->select('*')
                        ->from('issuereturn')
                        ->join('users', 'issuereturn.UserId = users.id', 'left')
                        ->get()->result();
        foreach ($results as $result) {
            $expiry_date = $result->ExpiryDate;
            $recent_date = Date('Y-m-d H:i:s');
            $email_check = $result->EmailCheck;
            $email['site_name'] = $this->config->item('website_name', 'tank_auth');
            $email['item'] = $result->Title;
            $message = "
<html>
<head>
<title>Welcome to SAC Online Library Management System</title>
</head>
<body>
<h2 style='font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;'>Hi ! <br />Attention Please ! </h2>
Your borrowed resouce '" . $email['item'] . "' from this library will be expired today !!<br />
    <br />
We are requsting you to return the resource to the librain within today .
<br />
<br />

Thanks for using SAC Online Library Management System.
<br />
<br />
Regards
<br />'" . $email['site_name'] . "
</body>
</html>
";

// Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
            $headers .= 'From: SAC Online Library Management System <webmaster@your-site.com>' . "\r\n";
            $headers .= 'Cc: webmaster@your-site.com' . "\r\n";
//            $this->load->view('email/expired_email-html.php', $email)

            if ($recent_date > $expiry_date && $email_check == 0) {                   
                mail("$result->email", 'SAC Online Library Management System', $message, $headers);
                $this->db->set('EmailCheck', '1');     
                $this->db->where('IssueReturnId', $result->IssueReturnId);
                $this->db->update('issuereturn'); 
                
            }
        }
        echo '<h2>Mail has been sent to those who`s borrowed time has been expired</h2>';
    }

}
