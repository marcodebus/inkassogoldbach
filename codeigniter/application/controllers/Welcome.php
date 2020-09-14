<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {




   public function __construct() {
       parent::__construct();
       $this->load->model('SQLQuery');
 	 }


	public function index()
	{
		$data['sql'] = $this->SQLQuery->Select('SELECT Akte, Nachname , ( select COALESCE(sum(Betrag),0) from Zahlungen WHERE Art = 2 and Zahlungen.Akte = Akten.Akte ) from Akten');
    $this->load->view('welcome_message', $data);
	}
}
