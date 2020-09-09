<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {




   public function __construct() {
       parent::__construct();
       $this->load->model('SQLQuery');
 	 }


	public function index()
	{
		$data['data'] = $this->SQLQuery->Select('SELECT Akten.Akte, Akten.Nachname, (IFNULL(SUM(Zahlungen.Betrag),0) ) AS Zinszahlungen FROM Akten LEFT JOIN Zahlungen ON Akten.Akte = Zahlungen.Akte AND Zahlungen.Art = 2 GROUP BY Akten.Akte ');
    echo json_encode( $data );
	}
}
