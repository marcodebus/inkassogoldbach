<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {




   public function __construct() {
       parent::__construct();
       $this->load->model('SQLQuery');
 	 }


	public function index()
	{
		$data['sql'] = $this->SQLQuery->Select('
SELECT a.Akte, a.Nachname, Sum(IF(z.Betrag Is Null,0,z.Betrag)) AS Zinszahlungen FROM Akten AS a LEFT JOIN (SELECT a1.Akte, a1.Nachname, z1.Betrag FROM Akten AS a1 LEFT JOIN Zahlungen AS z1 ON a1.Akte = z1.Akte WHERE (((z1.Art)=2))) AS z ON a.Akte = z.Akte GROUP BY a.Akte, a.Nachname');
    $this->load->view('welcome_message', $data);
	}
}
