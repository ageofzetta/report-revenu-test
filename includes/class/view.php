<?php

/**
   * 
   */
   class myResponse
   {
    private $csrf_field;
    private $products;
   	private $img;

   	function __construct($csrf_field,$products) {
      $this->products = $products;
      $this->csrf_field = $csrf_field;
      
    }
    private function startTwig($template){

      /* I use Twig as template engine
      http://twig.sensiolabs.org/documentation */

      /// Initialize Twig
      $loader = new Twig_Loader_Filesystem('includes/templates');
      
      //For Developement
      $twig = new Twig_Environment($loader, array(
        'cache' => false,  'debug' => true,
      ));
      $twig->addExtension(new Twig_Extension_Debug());
      //For Developement

      /* Production (cached)
      $twig = new Twig_Environment($loader, array(
        'cache' => 'includes/compilation_cache'
        ));
      */

      // Load Template
      $template = $twig->loadTemplate($template);
      return $template;
    }
   	public static function renderError($csrf_field, $message, $query = '')
    {   
      /* I use Twig as template engine
      http://twig.sensiolabs.org/documentation */

      /// Initialize Twig
      $loader = new Twig_Loader_Filesystem('includes/templates');
      
      //For Developement
      $twig = new Twig_Environment($loader, array(
        'cache' => false,  'debug' => true,
      ));
      $twig->addExtension(new Twig_Extension_Debug());
      //For Developement
      // Start twig using the following template
      $template = $twig->loadTemplate('error.php');
      // Render the result
      echo $template->render(array( 'csrf' => $csrf_field,  'message' => "$message. $query"));
		
    }
    
    private function drawGraph(){
      $products = $this->products;
      $dates = array();
      foreach ($products as $product) {
        $dates[strtotime($product['date'].'+2 hours')] = $dates[strtotime($product['date'].'+2 hours')] + $product['total'];
      }

      $fechas = (array_keys($dates));
      $revenue = (array_values($dates));
      $this->img = graphIt($revenue,$fechas);
    }

    public function renderView(){

      // Generate the graph
      $this->drawGraph();
      // Start twig using the following template      
      $template = $this->startTwig('results.php');

      // We send the products array, the graph and the anti-CRSF input field to render it and echo the result
      echo $template->render(array('products' => $this->products, 'csrf' => $this->csrf_field, 'img' => $this->img));
    }

    private function renderEmail($title){
      // Generate the graph
      $this->drawGraph();

      // Start twig using the following template
      $template = $this->startTwig('email.php');

      // We send the products array, the graph and the anti-CRSF input field, and in this case, the absolute path of the server, to render it and echo the result
      return $template->render(array('products' => $this->products, 'csrf' => $this->csrf_field, 'img' => $this->img, 'base' => BASE, 'title' => $title));


    }

    public function sendEmail($message){
      
      $title ="$message Report Revenue generated on ".date('l jS \of F Y h:i:s A');
      $body =  $this->renderEmail($title);
      $mail = new PHPMailer;
      $mail->CharSet = "UTF-8";
      
      /*
      
      SMTP
      if you have troubles enable debugging:
      $mail->SMTPDebug = 1;

      If you do not want to use gmail's smtp remove next line
      */
      

      //Tell PHPMailer to use SMTP

      $mail->isSMTP();
      //Set the hostname of the mail server
      $mail->Host = 'smtp.gmail.com';
      //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
      $mail->Port = 465;
      //Set the encryption system to use - ssl (deprecated) or tls
      $mail->SMTPSecure = 'ssl';
      //Whether to use SMTP authentication
      $mail->SMTPAuth = true;

      // Authenticate, if having troubles check https://support.google.com/mail/answer/78754
      $mail->Username   = MYGMAILUSER;
      $mail->Password   = MYGMAILPASSWORD;

      // */      
      
      $mail->isHTML(true);  
      $mail->SetFrom('atapia@protonmail.ch', 'Alejandro Tapia');
      $mail->AddReplyTo("atapia@protonmail.ch","Alejandro Tapia");
      $mail->AddAddress('alejandro_tapia@outlook.com', "Alejandro Tapia");
      $mail->Subject    = $title;
      $mail->Body= $body;

      if (!$mail->send()) {
        Utils::clearCookies();
        $this->renderError(csrf_field(), $mail->ErrorInfo);
      } else {
        Utils::clearCookies();
        $this->renderView();
      }
    }
  }   