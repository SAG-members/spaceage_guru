<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
	private $CI; // To Hold CodeIgniter Instance
	private $title;
	private $template;
	private $view;
	private $script;
	private $style;
	private $siteHeader;
	private $siteFooter;
	private $siteNavigation;
	private $leftSideBar;
	private $rightSideBar;
	
	private $headerData;
	private $footerData;
	private $siteNavData;
	private $leftSideData;
	private $rightSideData;
	
	private $templateDir = '';
	private $layoutDir = '';
	private $moduleDir = '';

	
	const _PUBLIC_TEMPLATE_DIR = 'templates/public';
	const _PUBLIC_LAYOUT_DIR = 'templates/public/layouts';
	const _PUBLIC_MODULE_DIR = 'templates/public/module';
	
	const _PUBLIC_AVTAR_DIR = "assets/uploads/avtar/";
	const _PUBLIC_DOCUMENT_DIR = "assets/uploads/document/";
	const _PUBLIC_DATA_DOCUMENT_DIR = "assets/uploads/data_document/";
	
	const _ADMIN_TEMPLATE_DIR = 'templates/admin';
	const _ADMIN_LAYOUT_DIR = 'templates/admin/layouts';
	const _ADMIN_MODULE_DIR = 'templates/admin/module';
	const _ADMIN_ASSETS_DIR = 'assets/admin/';
	const _ADMIN_CSS_DIR = 'assets/admin/css/';
	const _ADMIN_JS_DIR = 'assets/admin/js/';
	const _ADMIN_IMG_DIR = 'assets/admin/img/';
	const _ADMIN_UPLOAD_DIR = 'assets/admin/uploads/';
	
	const _USER_TEMPLATE_DIR = 'templates/templates/gentelella-admin';
	const _USER_LAYOUT_DIR = 'templates/gentelella-admin/layouts';
	const _USER_MODULE_DIR = 'templates/gentelella-admin/module';
		
	public function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->helper('url');
	}
	
	public function title($title){$this->title = $title;}
	
	public function setSiteLayout($templateDir, $layoutDir, $moduleDir)
	{
		$this->templateDir = $templateDir;
		$this->layoutDir = $layoutDir;
		$this->moduleDir = $moduleDir;
	}
	
	public function setTemplate($template){$this->template = $template;}
	
	public function setHeader($siteHeader, $headerData)
	{
		$this->siteHeader = $siteHeader;
		$this->headerData = $headerData;
	}
	
	public function setFooter($siteFooter, $footerData)
	{
		$this->siteFooter = $siteFooter;
		$this->footerData = $footerData;
	}
	
	public function setNavigation($siteNavigation, $siteNavData)
	{
		$this->siteNavigation = $siteNavigation;
		$this->siteNavData = $siteNavData;
	}
	
	public function setLeftSideBar($leftSideBar, $leftSideData)
	{
		$this->leftSideBar = $leftSideBar;
		$this->leftSideData = $leftSideData;
	}
	
	public function setRightSideBar($rightSideBar, $rightSideData)
	{
		$this->rightSideBar = $rightSideBar;
		$this->rightSideData = $rightSideData; 
	}
	
	public function render($view, $data = array(), $default=true)
	{
		$params = array(); 
		
		$params['title'] = $this->title;
		$params['view'] = $this->moduleDir.'/'.$view;
		$params['siteHeader'] = $this->layoutDir.'/'.$this->siteHeader;
		$params['siteFooter'] = $this->layoutDir.'/'.$this->siteFooter;
		$params['siteNavigation'] = $this->layoutDir.'/'. $this->siteNavigation;
		$params['siteLeftSideBar'] = $this->layoutDir.'/'.$this->leftSideBar;
		$params['siteRightSideBar'] = $this->layoutDir.'/'.$this->rightSideBar;
		
		# Set Default Data For Header, Footer, Navigation And Sidebars
		
		$params['headerData'] = $this->headerData;
		$params['footerData'] = $this->footerData;
		$params['navData'] = $this->siteNavData;
		$params['leftSideData'] = $this->leftSideData;
		$params['rightSideData'] = $this->rightSideData;		
		 
		# Adding additional scripts per page
		if(!empty($this->script)) { $params['additionalScript'] = $this->script; }
		
		# Adding additional css per page
		if(!empty($this->style)) { $params['additionalStyle'] = $this->style; }
		
		foreach ($data as $key => $value)$params[$key] = $value;

		$this->CI->load->view($this->templateDir.'/'.$this->template, $params);
	}
	
	public function js($file){return base_url('web/js/'.$file);}
		
	public function css($file){return base_url('web/css/'.$file);}
		
	public function image($file){return base_url('web/images/'.$file);}
	
	public function upload($image){return base_url('web/uploads/'.$image);}
	
	public function setAdditionalScript(array $script){$this->script = $script;}

	public function setAdditionalStyle(array $style){$this->style = $style;}
	
	public function debug()
	{
		
	}
// 	public function getAdditionalScript(){return $this->script;}
// 	public function getAdditionalStyle(){return $this->style;}

}

