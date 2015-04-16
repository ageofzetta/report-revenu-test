<?php

// Init file contains several requires & composer autoload
require 'includes/init.php';
// Initialize Twig
Twig_Autoloader::register();



/* Routes closures | bento microframework
https://github.com/nramenta/bento#usage
*/

// On root
get('/', function()
{
	/* EasyCRUD PDO Wrapper Class:
	https://github.com/indieteq/PHP-MySQL-PDO-Database-Class#easycrud
	*/
	$db = new Db(); 							// Instantiate Db class wrapper 
	$products = $db->query("SELECT * FROM products ORDER BY `date` ASC");
	if (!$products) {
		//Call static function to render error view with message -> includes/class/view.php
		myResponse::renderError(csrf_field(), 'There are no records in the system ');
	}else{
		// Instantiate myResponse and render results  -> includes/class/view.php
		$response = new myResponse(csrf_field(),$products);
		// Check if user is trying to send via email
		if(!isset($_COOKIE['email'])) {
			$response->renderView();
		}else{
			$response->sendEmail('General');
		}
	}
});

get('/client/<client>/', function($client)
{
    	$db = new Db(); 							// Instantiate Db class wrapper 
    	$client = Utils::prepareString($client); 	// prepares string for query -> includes/class/tools.php
    	$products = $db->query("SELECT * FROM products WHERE `client` LIKE :client ORDER BY `date` ASC",array('client'=>"%$client%"));
		if (!$products) {
			//Call static function to render error view with message -> includes/class/view.php
			myResponse::renderError(csrf_field(), 'There are no results for your last query', $client);
		}else{
			// Instantiate myResponse and render results  -> includes/class/view.php
			$response = new myResponse(csrf_field(),$products);
			// Check if user is trying to send via email
			if(!isset($_COOKIE['email'])) {
				$response->renderView();
			}else{
				$response->sendEmail($client);
			}
		}
    
});

get('/product/<product>/', function($product)
{
    	$db = new Db(); 							// Instantiate Db class wrapper 
    	$product = Utils::prepareString($product); 	// prepares string for query -> includes/class/tools.php
    	$products = $db->query("SELECT * FROM products WHERE `product` LIKE :product ORDER BY `date` ASC",array('product'=>"%$product%"));
		if (!$products) {
			//Call static function to render error view with message -> includes/class/view.php
			myResponse::renderError(csrf_field(), 'There are no results for your last query', $product);
		}else{
			// Instantiate myResponse and render results  -> includes/class/view.php
			$response = new myResponse(csrf_field(),$products);
			// Check if user is trying to send via email
			if(!isset($_COOKIE['email'])) {
				$response->renderView();
			}else{
				$response->sendEmail($product);
			}
		}
    
});

get('/date/<*:query>/', function($query)
{
    $query = Utils::prepareString($query); 	// prepares string for query -> includes/class/tools.php
	if (($timestamp = strtotime($query)) === false) {
		//Call static function to render error view with message -> includes/class/view.php
		myResponse::renderError(csrf_field(), "but '$query' is not a valid date");
	} else {
    	$db = new Db(); 							// Instantiate Db class wrapper 
		$queryDate = date('Y-m-d', $timestamp);
    	$products = $db->query("SELECT * FROM products WHERE `date` LIKE :queryDate ORDER BY `id` ASC",array('queryDate'=>"%$queryDate%"));
		
		if (!$products) {
			//Call static function to render error view with message -> includes/class/view.php
			myResponse::renderError(csrf_field(), "There are no results to your last query");
		}else{
			// Instantiate myResponse and render results  -> includes/class/view.php
			$response = new myResponse(csrf_field(),$products);
			// Check if user is trying to send via email
			if(!isset($_COOKIE['email'])) {
				$response->renderView();
			}else{
				$response->sendEmail("Date $query");
			}
		}
		
	}
});

post('/product/delete/<#:id>', function($id)
{
	$id = Utils::prepareString($id);			// prepares string for query -> includes/class/tools.php
    $db = new Db(); 							// Instantiate Db class wrapper 
    $deleted = $db->query("DELETE FROM products WHERE `id` = :id ",array('id'=>"$id"));
	echo "deleted"; 
});
get('/product/edit/<#:id>/', function($id)
{
	$id = Utils::prepareString($id);			// prepares string for query -> includes/class/tools.php
    $db = new Db(); 							// Instantiate Db class wrapper 
	echo "deleted"; 
});

form('/search/', function()
{
	
    if (request_method('POST') && $_POST['query'] && $_POST['keyword']) {
    	
    	// Escape POST info
    	$query = Utils::friendlyPost($_POST['query']);
    	$keyword = Utils::friendlyPost($_POST['keyword']);

    	// Redirect accordingly (client,product,etc)
    	redirect("/$query/$keyword");

    }else{
    	
    	// if it does not have POST info redirect to index
    	redirect('/');
    }
});

error(404, function($message = null)
{
    myResponse::renderError(csrf_field(), "Error 404 - Page Not Found");
});

error(400, function($message = null)
{

    if ($message == 'csrf') {
    	$return = ', CSRF attempt detected!';
    }
    myResponse::renderError(csrf_field(), "Error 400 - Bad Request $return");

});
return run(__FILE__);