// @codekit-prepend "required.js"

$(document).on('click','.disabled a', function (event) {
	event.preventDefault ? event.preventDefault() : event.returnValue = false;
	
   });
  
$(document).on('blur','.required input', function (event) {
	var thisEl = $(this);
	var thisVal = thisEl.val();
	if (!thisVal) {
		thisEl.css('border','1px solid rgb(192, 57, 43)');
	}else{
		thisEl.css('border','1px solid rgb(189, 195, 199)');
	}
});

$( document ).ready(function() {
    
});
 
  

function prepareData(){
	$('.money').each(function(){
    	var thisVal = $(this).html();
    	newVal = accounting.formatMoney(thisVal);
    	$(this).html(newVal);
    	$(this).removeClass('money');
    });
    $('.date').each(function(){
    	var thisVal = $(this).html();
    	newVal = moment(""+thisVal, 'YYYY-MM-DD hh:mm:ss', 'es').format("DD/MM/YYYY");
    	$(this).html(newVal);
    	$(this).removeClass('date');
    	
    });
}

