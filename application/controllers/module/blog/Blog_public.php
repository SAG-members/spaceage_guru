<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_public extends Application
{
	const POST_PAGINATION_LIMIT = 4;
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
	}
	
	public function index()
	{
		$response = array();
		
		$this->load->model('blog_post','blog');
		$response['posts'] = $this->blog->getPosts(static::POST_PAGINATION_LIMIT);
		$response['count'] = $this->blog->getPostCount();
		
		$this->template->title('Blog | Satan Clause');
		$this->template->render('blog/blog', $response);		
	}
}
