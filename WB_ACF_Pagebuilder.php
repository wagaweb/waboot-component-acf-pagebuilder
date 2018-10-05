<?php
/**
 *  Component Name: WB ACF Pagebuilder
 *  Description: Waboot Pagebuilder
 *  Category: Utilities
 *  Tags: Pagebuilder
 *  Version: 1.0
 *  Author: Waga <dev@waga.it>
 *  Author URI: http://www.waga.it
 */

if ( !class_exists("\\WBF\\modules\\components\\Component") ) return;

use \WBF\components\assets\AssetsManager;

class WB_ACF_Pagebuilder extends \WBF\modules\components\Component{
	public function setup(){
		add_action('enqueue_scripts', [$this, 'styles'], 10, 1);
		add_action('admin_enqueue_scripts', [$this, 'adminStyles'], 10, 1);
		add_action('admin_enqueue_scripts', [$this, 'adminScript'], 10, 1);
		add_action('acf/save_post', [$this,'cleanEmptyAcfValues'],1);
		add_filter('the_content',[$this,'renderPageBuilderOnPostContent']);
		$this->registerPageBuilderFields();
	}

	/**
	 * Enqueue our scripts
     * @throws Exception
	 */
	public function scripts() {
		$scripts = [
            'imagesloaded_js' => [
                'uri' => $this->directory_uri . '/assets/dist/js/imagesloaded.pkgd.min.js',
                'path' => $this->directory . '/assets/dist/js/imagesloaded.pkgd.min.js',
                'deps' => ['jquery'],
                'enqueue' => true,
                'type' => 'js',
                'in_footer' => true
            ],
            'inview_js' => [
                'uri' => $this->directory_uri . '/assets/vendor/in-view/in-view.min.js',
                'path' => $this->directory . '/assets/vendor/in-view/in-view.min.js',
                'deps' => ['jquery'],
                'enqueue' => true,
                'type' => 'js',
                'in_footer' => true
            ],
            'rellax_js' => [
                'uri' => $this->directory_uri . '/assets/vendor/rellax/rellax.min.js',
                'path' => $this->directory . '/assets/vendor/rellax/rellax.min.js',
                'deps' => ['jquery','inview_js'],
                'enqueue' => true,
                'type' => 'js',
                'in_footer' => true
            ],
            'parallax' => [
                'uri' => $this->directory_uri . '/assets/vendor/jquery.parallax-1.1.3.js',
                'path' => $this->directory . '/assets/vendor/jquery.parallax-1.1.3.js',
                'deps' => ['jquery'],
                'enqueue' => true,
                'type' => 'js',
                'in_footer' => true
            ],
            'wb_pagebuilder_js' => [
                'uri' => $this->directory_uri . '/assets/dist/js/pagebuilder.js',
                'path' => $this->directory . '/assets/dist/js/pagebuilder.js',
                'deps' => ['jquery', 'parallax', 'jquery-ui-core', 'owlcarousel-js','jquery-masonry','jquery-ui-tabs', 'jquery-ui-accordion','imagesloaded_js','inview_js','rellax_js'],
                'enqueue' => true,
                'type' => 'js',
                'in_footer' => true
            ],
		];

		$am = new AssetsManager($scripts);
		$am->enqueue();
	}

    /**
     * Enqueue our styles
     * @throws Exception
     */
	public function styles(){
        $styles = [
            'wbpagebuilder_css' => [
                'uri' => $this->directory_uri . '/assets/dist/css/wbpagebuilder.css',
                'path' => $this->directory . '/assets/dist/css/wbpagebuilder.css',
                'deps' => ['owlcarousel-css'],
            ]
        ];

        $am = new AssetsManager($styles);
        $am->enqueue();
    }

    /**
     * Enqueue our styles to admin
     * @throws Exception
     */
    public function adminStyles(){
        $styles = [
            'admin_css' => [
                'uri' => $this->directory_uri . '/assets/dist/css/admin.css',
                'path' => $this->directory . '/assets/dist/css/admin.css',
            ],
        ];

        $am = new AssetsManager($styles);
        $am->enqueue();
    }

    /**
     * Enqueue our javascript to admin
     * @throws Exception
     */
    public function adminScript(){
        $scripts = [
            'admin_js' => [
                'uri' => $this->directory_uri . '/assets/dist/js/admin-js.js',
                'path' => $this->directory . '/assets/dist/js/admin-js.js',
                'deps' => ['jquery'],
                'enqueue' => true,
                'type' => 'js',
                'in_footer' => true
            ],
        ];

        $am = new AssetsManager($scripts);
        $am->enqueue();
    }

    /**
     * Register component options
     */
    public function register_options(){
        parent::register_options();
        $orgzr = \WBF\modules\options\Organizer::getInstance();

        $orgzr->set_group($this->name."_component");

        $orgzr->add_section('pagebuilder',_x('Pagebuilder','waboot'));

        $orgzr->set_section('pagebuilder');

        $post_types = \WBF\components\utils\Posts::get_filtered_post_types();

        $orgzr->add([
            'name' => __('Use page builder on these post types'),
            'id' => $this->name.'_allowed_post_types',
            'type' => 'multicheck',
            "options" => $post_types,
            "default" => ['page'],
        ]);

        $orgzr->reset_group();
        $orgzr->reset_section();
    }

    /**
     * Register ACF fields for the page builder
     */
    public function registerPageBuilderFields(){
        $allowedPostTypes = \Waboot\functions\get_option($this->name.'_allowed_post_types',[]);

        if(!is_array($allowedPostTypes)){
            $allowedPostTypes = [];
        }

        $fieldsLocations = [];

        if(!empty($allowedPostTypes)){
            $allowedPostTypes = array_filter($allowedPostTypes);

            foreach($allowedPostTypes as $slug => $value){
                $fieldsLocations[][] = [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => $slug
                ];
            }
        }

        require_once $this->directory.'/inc/register-layouts.php';
        require_once $this->directory.'/inc/register-fields.php';

    }

    /**
     * Renders the page builder HTML inside the post content
     *
     * @hooked 'the_content'
     *
     * @param $content
     * @return string
     * @throws Exception
     */
    public function renderPageBuilderOnPostContent($content){
        global $post;

        if(!$post instanceof \WP_Post){
        	return $content;
        }

        $pbContent = $this->getPageBuilderHtml($post->ID);

        if($pbContent === ''){
        	return $content;
        }

	    $canAppendPageBuilder = true;
	    if(!$canAppendPageBuilder){
	    	return $content;
	    }

	    $content .= $pbContent;

	    return $content;
    }

	/**
	 * Get the PageBuilder HTML
	 *
	 * @param $postId
	 *
	 * @return string
	 */
    public function getPageBuilderHtml($postId){
    	$post = get_post($postId);
    	if(!$post instanceof \WP_Post){
		    return '';
	    }

	    $postType = get_post_type($post);
	    if(!$this->postTypeCanHavePageBuilder($postType)){
		    return '';
	    }

	    try{
	        $v = new \WBF\components\mvc\HTMLView($this->directory.'/views/pagebuilder.php',null,false);
	        $pbContent = $v->get([
	        	'pageBuilderPostId' => $postId
	        ]);
	        return $pbContent;
	    }catch (\Exception $e){
	    	return '';
	    }
    }

	/**
	 * Get the PageBuilder HTML from a $postId
	 *
	 * @param $postId
	 *
	 * @return string
	 */
    public static function getPageBuilderHtmlFromPostId($postId){
	    $components = \WBF\modules\components\ComponentsManager::getAllComponents();
	    if(!isset($components['wb_acf_pagebuilder'])){
	    	return '';
	    }
	    $pbInstance = $components['wb_acf_pagebuilder'];
	    if(!$pbInstance instanceof self ){
	    	return '';
	    }
	    $pbContent = $pbInstance->getPageBuilderHtml($postId);
	    return $pbContent;
    }

    /**
     * @param $postType
     *
     * @return bool
     */
    public function postTypeCanHavePageBuilder($postType){
        $allowedPostTypes = \Waboot\functions\get_option($this->name.'_allowed_post_types',[]);
        $allowedPostTypes = array_keys(array_filter($allowedPostTypes));
        return in_array($postType,$allowedPostTypes);
    }

	/**
	 * @param $postId
	 *
	 * @hooked 'acf/save_post'
	 */
    public function cleanEmptyAcfValues($postId){
    	if(!isset($_POST['acf'])){
		    return;
	    }
    	if(!isset($_POST['acf']['field_wb_sections'])){
    		return;
	    }
	    $clear = function($data) use(&$clear){
    		foreach ($data as $key => $value){
    			if( $value === '' || (is_array($value) && count($value) === 0) ){
    				unset($data[$key]);
			    }elseif(is_array($value)){
				    $data[$key] = $clear($value);
			    }
		    }
		    return $data;
	    };
    	$parsedPostdata = [];
	    foreach ($_POST['acf']['field_wb_sections'] as $key => $values){
	    	if(is_array($values)){
			    $parsedPostdata[$key] = $clear($values);
		    }else{
	    		if($values !== ''){
	    			$parsedPostdata[$key] = $values;
			    }
		    }
	    }
	    $_POST['acf']['field_wb_sections'] = $parsedPostdata;
    }
}