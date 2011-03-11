<div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
	<?php if ($page == 0): ?>
    	
		<?php print $picture ?>
        <h1 class="title"><a href="<?php print $node_url?>"><?php print bb2html($title); ?></a></h1>
       
    <?php endif; ?>
 
    <div class="content">
	<?php 
	
	print $body;
$sched = FALSE;


if (arg(1)!= "add"){ 
  
	$result = (db_query('SELECT c.nid, c.field_model_value, c.field_cost_value, c.field_stock_value, c.field_class_nid, r.body, r.title FROM {content_type_class} c LEFT JOIN {node_revisions} r ON c.nid = r.nid WHERE c.field_datestamp_value > UNIX_TIMESTAMP() AND c.field_class_nid = %s  ORDER BY c.field_datestamp_value, c.field_model_value ASC', $nid));

		echo "<h2>Scheduled Classes</h2>";
   		echo '<div id="scheduled_classes"><table width="98%" border="0" cellpadding="2" class="class_tbl">';
   		
   	
        while ($node1 = db_fetch_object($result)) {		
  			$numleft = $node1->field_stock_value;
  
  			$stockalert = " ";
						
       		if($numleft  > 0 && $numleft < 3){ //Check if this is sold out
				//print $numleft . "<br>";
				//print $node1->nid . "<br>";
				
				//if($numleft  < 3){
				$stockalert = "<strong>Only ".$numleft ." left!</strong>";
       			//}
			} 
			
			
			$reglink = '<a href="?q=node/add/register&id='. $node1->nid .'" class="reglink"><img src="http://stresslesstests.org/sites/all/themes/custom/nostress/images/register.gif" alt="Register" width="63" height="22" border="0"></a><br />'.$stockalert.'</td></tr>';
			
			
			if ($numleft <= 0) {
       			//Sold out if stock == 0
       			$reglink = '<strong>Sorry, registration closed.</strong><br /><a href="/node/add/waiting-list">Sign up for the waiting list here.</a></td></tr>';
       		}
       
       
       		
       		/*$costs = preg_split("/[\s,]+/", $node1->field_cost_value);
			
       		$totalCosts = sizeof($costs);
       		
       		if($totalCosts > 1){
       			$cost = "Options: <br />";
       			for($z=0; $z<$totalCosts; $z++){
       				$cost .= "$" . $costs[$z] . "<br />";
       			}
       		} else {
       			
       			$cost = "$" . $costs[0];
       		}*/
			
			$products = explode(",",  $node1->field_cost_value);
			
			$cost = "<strong>Options: </strong><br />";

			foreach($products as $item){
				$product = explode("|", $item);
				//$options[$product[1]] = $product[0] ." - $".$product[1];
				$cost .= $product[0] ." - $".$product[1] . "<br />";
			}
					
       
            echo '<tr><td width="170" class="class_col1">'.$node1->body.'</td><td width="105" align="left" class="class_col2">'.$cost.'</td><td width="45" align="center" valign="middle" class="class_col1">' . $reglink;
            $sched = TRUE;
	} //endwhile

	if(!$sched){           
	   echo "<tr><td>None scheduled at this time.  Please <a href='http://ui.constantcontact.com/d.jsp?m=1101102591516&p=oi' target='_blank'>sign up here</a> to indicate your interest in a class and receive a notice when it will be held.</p></td></tr>"; 
	}
	   
	   echo "</table></div>";
		

}//endif 

	
	
	?>
    
    
    </div>
    <br />
    <?php if ($links): ?>
    	<div class="links-align">
        	<div class="bg-links">
                <div class="links-left">
                    <div class="links-right">
                        <div class="links"><?php print $links ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    <?php endif; ?>
</div>