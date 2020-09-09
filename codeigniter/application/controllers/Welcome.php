<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {




   public function __construct() {
       parent::__construct();
       $this->load->model('SQLQuery');
 	 }


	public function index()
	{
		$data['sql'] = $this->SQLQuery->Select('SELECT Akten.Akte, Akten.Nachname, (IFNULL(SUM(Zahlungen.Betrag),0) ) AS Zinszahlungen FROM Akten LEFT JOIN Zahlungen ON Akten.Akte = Zahlungen.Akte AND Zahlungen.Art = 2 GROUP BY Akten.Akte ');
    $this->load->view('welcome_message', $data);
	}
}
