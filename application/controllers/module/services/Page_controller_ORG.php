<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Page_controller extends Base 
{
	public function __construct()
	{
		parent::__construct();
// 		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
	}
		
	public function satan_clause_ltd()
	{	
		$this->template->title("Satan Clause Ltd");
		$this->template->render('satan-clause-ltd'); 
	}
	
	public function lean_canvas()
	{
		$this->template->title("Lean Canvas");
		$this->template->render('lean-canvas');
	}
	
	
}
