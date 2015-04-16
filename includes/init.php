<?php
setlocale(LC_MONETARY, 'en_US');
// Require Compose
require "vendor/autoload.php";
// Require pChart Clases (should o be autoloaded via composer)
include("includes/graph/pChart/class/pDraw.class.php"); 
include("includes/graph/pChart/class/pImage.class.php"); 
include("includes/graph/pChart/class/pData.class.php");
include("includes/graph/pChart/class/pCache.class.php");
// PDO wrapper classes
require "includes/PDO/Db.class.php";
require_once("includes/PDO/easyCRUD/easyCRUD.class.php");
// Mailer Class
require_once('includes/mailer/PHPMailerAutoload.php');

// Class to draw graphs
require "includes/class/graph.php";
require "includes/class/view.php";
require "includes/class/tools.php";

define("BASE", "http://$_SERVER[HTTP_HOST]");