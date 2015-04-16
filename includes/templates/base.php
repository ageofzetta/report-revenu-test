<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/includes/static/css/estilos.css">
	<title>Report Revenue</title>
	<script type="text/javascript" src="/includes/static/js/main-min.js"></script>
</head>
<body class="metro">
<div id="wrapper">
	<header class="bg-cyan fg-white">
		<div class="grid">
		    <div class="container">
			    	<nav>
						<a href="/" title="Home"><i class="fa fa-home"></i></a> 
						<a href="javascript: window.history.go(-1)" style="font-size: 1.7em; line-height: 1em;" title="Download ZIP of this project"><i class="fa fa-download"></i></a> <a href="#" title="Github link"><i class="fa fa-github-alt"> </i> </a>
						 {% block errors %}{% endblock %} 
					</nav>		    		
					<h1> Orders summary <small> {%if client %} for <strong>{{client}}</strong> {% endif %} </small></h1>
					{# If errors load them here #}
					<div class="grid">
					    <div class="row">
					    	<form action="/search/" method="POST">
								<div class="inputs input-control text">
									<input type="text" id="keyword" name="keyword" placeholder="Search by"> 
									<button class="btn-clear"></button>
								</div>
								<div class="inputs input-control select">
									<select name="query" id="query">
										<option value="client">Client</option>
										<option value="product">Product</option>
										<option value="date">Date</option>
									</select>    
								</div>
								
								{{csrf|raw}}
								<input class="submit_btn" type="submit" value="search">
							</form>
							
						</div>
					</div> 
		    	</div>
		</div>

		
	</header>
	{# Load the results here #}
	{% block results %}{% endblock %}

	</div>

	  	

<script type="text/javascript">
	$(document).ready(function() {
	 

 

});	$(function(){
		$('.dataTable').dataTable( {
			
"iDisplayLength": 25,
"order": [[ 3, "asc" ]],
			"fnDrawCallback": function( oSettings ) {
				
			},
      "columnDefs": [ { "targets": 2, "orderable": false } ,{ "targets": 4, "orderable": false } ]
		} );
	});
$(document).on('click','.deleterow', function (event) {
	event.preventDefault ? event.preventDefault() : event.returnValue = false;
	var this_id = $(this).attr('data-id');
	if(confirm('Are you sure yo want to delete this record?')){
		$.post( "/product/delete/"+this_id, function( data ) {
			if (data == 'deleted') {
				$.Notify.show('Product deleted', function(){
					location.reload();
				});
			}
		});
	}
	
   });

$(document).on('click','.mailSend', function (event) {
	event.preventDefault ? event.preventDefault() : event.returnValue = false;
	Cookies.set('email', true);
	$.Notify.show('Sending mail', function(){
					location.reload();
				});

   });
  
  
</script>

{# Nowadays </body> & </html> aren't needed #}
