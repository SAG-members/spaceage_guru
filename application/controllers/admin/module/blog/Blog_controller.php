<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_controller extends Application {
	
	public function __construct()
	{
		parent::__construct();
		
		if(!$this->isLoggedIn()) { $this->redirectToLogin();}
		
		# Load Blog Post Model
		$this->load->model('admin/blog');
	}
	
	public function index()
	{				
		$data = array();
		$this->template->title('Manage Blogs');
		
		$data['blogs'] = $this->blog->getBlogs($this->session->userdata('id'), '', '', 0);
		$data['count'] = $this->blog->getBlogCount($this->session->userdata('id'));
		
		$this->template->render('blog/manage_blogs', $data);
		
	}
	
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
			$metaTitle = $points = $this->input->post('meta-title');
			$metaKeywords = $points = $this->input->post('meta-keywords');
			$metaDescription = $points = $this->input->post('meta-description');
			
			$lastId = $this->blog->createNewPost($userId, $title, $content, $anonymous, $visibility, $points, $metaTitle, $metaKeywords, $metaDescription);
			if($lastId) $this->message->setFlashMessage(Message::BLOG_POST_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::BLOG_POST_FAILURE);
			
			redirect('admin/blogs');
		}
		
		$this->template->title('Create New Blog');
		
		$this->template->render('blog/new_post');
	}
	
	public function edit_post()
	{
		$response = array();
		
		$postId = $this->uri->segment(3);
		
		if($this->input->post('post-title') && $this->input->post('post-content'))
		{
			$userId = $this->session->userdata('id');
			$title = $this->input->post('post-title');
			$content = $this->input->post('post-content');
			$anonymous = $this->input->post('anonymous') ? 1 : 0;
			$visibility = $this->input->post('visibility');
			$points = $this->input->post('points');
			$metaTitle = $this->input->post('meta-title');
			$metaKeywords = $this->input->post('meta-keywords');
			$metaDescription = $this->input->post('meta-description');
			
			$lastId = $this->blog->updatePost($userId, $postId, $title, $content, $anonymous, $visibility, $points, $metaTitle, $metaKeywords, $metaDescription);
			if($lastId) $this->message->setFlashMessage(Message::BLOG_POST_UPDATE_SUCCESS, array('id'=>'1'));
			else $this->message->setFlashMessage(Message::BLOG_POST_UPDATE_FAILURE);
		}
				
		$response['post'] = $this->blog->getPostById($postId);
		
		$this->template->title('Edit Blog');
		$this->template->render('blog/single_post', $response);
	}
	
	public function delete_post()
	{
		$postId = $this->uri->segment(3);
		
		$result = $this->blog->deleteBlogById($postId);
		
		if($result)$this->message->setFlashMessage(Message::BLOG_POST_DELETE_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::BLOG_POST_DELETE_FAILURE);
				
		redirect('admin/blogs');
	}
	
	public function publish_post()
	{
		$postIds = $this->input->post('post-ids');
				
		$result = $this->blog->publishPost($postIds);
		
		if($result)$this->message->setFlashMessage(Message::BLOG_POST_PUBLISHED_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::BLOG_POST_PUBLISHED_FAILURE);
		
		redirect('admin/blogs');
	}
	
	public function unpublish_post()
	{
		$postIds = $this->input->post('post-ids'); 
				
		$result = $this->blog->unPublishPost($postIds);
		
		if($result)$this->message->setFlashMessage(Message::BLOG_POST_UNPUBLISHED_SUCCESS, array('id'=>'1'));
		else $this->message->setFlashMessage(Message::BLOG_POST_UNPUBLISHED_FAILURE);
		
		redirect('admin/blogs');
	}
		
}
