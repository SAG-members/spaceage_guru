<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Application
{
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { redirect($this->redirectToLogin()); }
	}
	
	public function index()
	{
		$response = array();
		
		$postId = $this->uri->segment(2);
		
		# Load Blog Post Model
		$this->load->model('blog_post','blog');
		$response['post'] = $this->blog->getPostById($postId);
		
		# Load Blog Post Comment Model
		$this->load->model('blog_post_comment','blogPostCommentObj');
		$response['comments'] = $this->blogPostCommentObj->getCommentsById($postId);
		
		$this->template->title('Blog | Satan Clause');
		$this->template->render('blog/single_post', $response);
	}
	
	public function get_post_by_slug()
	{
		$response = array();
		
		$slug = $this->uri->segment(2);
		
		# Load Blog Post Model
		$this->load->model('blog_post','blog');
		$response['post'] = $this->blog->getPostBySlug($slug);
		
		# Load Blog Post Comment Model
		$this->load->model('blog_post_comment','blogPostCommentObj');
		$response['comments'] = $this->blogPostCommentObj->getCommentsById($response['post']['id']);
		
		$this->template->title('Blog | Satan Clause');
		$this->template->render('blog/single_post', $response);
	}
	
	/* Create new post */
	
	public function new_post()
	{
		if($this->input->post('post-title') && $this->input->post('post-content'))
		{
			$userId = $this->session->userdata('id');
			$title = $this->input->post('post-title');
			$content = $this->input->post('post-content');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$visibility = $this->input->post('visibility');
			$points = $this->input->post('points');
						
			# Load Blog Post Model
			$this->load->model('blog_post','bpObj');
			
			$lastId = $this->bpObj->createNewPost($userId, $title, $content, $anonymous, $visibility, $points);
			if($lastId) $this->message->setFlashMessage(Message::BLOG_POST_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::BLOG_POST_FAILURE);
		}
		
		$this->template->title('New Post | Satan Clause');
		
		$additionalScripts = array('plugin/summernote/summernote.js','summernote.js');
		$additionalStyles = array('summernote/summernote.css');
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->setAdditionalStyle($additionalStyles);
		
		$this->template->setAdditionalScript($additionalScripts);
		$this->template->render('blog/new_post');	
	}
	
	public function post_comment()
	{
		$postId = $this->input->post('post-id');
		$comment = $this->input->post('post-comment');
		$anonymous = $this->input->post('anonymous') ? 0 : 1;
		$userId = $this->session->userdata('id');
		
		$this->load->model('blog_post_comment','blogPostObj');
		
		if($this->blogPostObj->createNewComment($userId, $postId, $comment, $anonymous))$this->message->setFlashMessage(Message::BLOG_POST_COMMENT_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::BLOG_POST_COMMENT_FAILURE);
		
		redirect(base_url('index.php/blog/'.$postId));
		
	}
}
