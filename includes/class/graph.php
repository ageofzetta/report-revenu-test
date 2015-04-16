<?php
function graphIt($revenue,$fechas,$title = 'Total Revenue Report'){
$colorfrom =  sprintf('%u', crc32($title));
$red = round(sqrt(substr($colorfrom, 0, 3)))*5;
$green = round(sqrt(substr($colorfrom, 6, 3)))*5;
$blue = round(sqrt(substr($colorfrom, -3)))*5;


	$MyData = new pData();  
	$MyData->addPoints($revenue,"$title");
	$MyData->setAxisName(0,"$ Incomes");
	$MyData->setAxisDisplay(0,AXIS_FORMAT_CURRENCY);

	$MyData->addPoints($fechas,"Timestamp");
	$MyData->setSerieDescription("Timestamp","Sampled Dates");
	$MyData->setAbscissa("Timestamp");
	$MyData->setXAxisDisplay(AXIS_FORMAT_DATE,"M d");

	$MyData->setPalette("$title",array("R"=>$red,"G"=>$green,"B"=>$blue));
	 
	/* Create the pChart object */
if(count($fechas) > 30) { $skip = 1; }else{ $skip = 0;}
	$myPicture = new pImage(1200,235,$MyData);
	$myPicture->drawGradientArea(0,0,1200,230,DIRECTION_VERTICAL,array("StartR"=>220,"StartG"=>220,"StartB"=>220,"EndR"=>255,"EndG"=>255,"EndB"=>255,"Alpha"=>100));
	$myPicture->drawRectangle(0,0,1199,230,array("R"=>200,"G"=>200,"B"=>200));
	 
	/* Write the picture title */ 
	$myPicture->setFontProperties(array("FontName"=>"assets/fonts/Forgotte.ttf","FontSize"=>11));
	$myPicture->drawText(80,35,"Report Revenue",array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMLEFT));
	 
	/* Do some cosmetic and draw the chart */
	$myPicture->setGraphArea(60,40,1199,190);
	$myPicture->drawFilledRectangle(60,40,1199,190,array("R"=>255,"G"=>255,"B"=>255,"Surrounding"=>-200,"Alpha"=>10));
	$AxisBoundaries = array(0=>array("Min"=>0,"Max"=>2000));
	$myPicture->drawScale(array("GridR"=>180,"GridG"=>180,"GridB"=>180,"DrawSubTicks"=>TRUE, "LabelSkip"=>$skip));
	$myPicture->setShadow(TRUE,array("X"=>2,"Y"=>2,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));
	$myPicture->setFontProperties(array("FontName"=>"assets/fonts/verdana.ttf","FontSize"=>8));
	$myPicture->drawSplineChart();
	$myPicture->setShadow(FALSE);
	 
	/* Write the chart legend */ 
	$myPicture->drawLegend(60,216,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
	 
	/* Render the picture (choose the best way) */
	$myCache = new pCache();
	$myHash = $myCache->getHash($myData).'.png';
	$myPicture->render("assets/img/revenue.png");
	$newHash =  hash_file('md5', 'assets/img/revenue.png');
	$myPicture->render("assets/img/$newHash.png");
	return $newHash;

}


