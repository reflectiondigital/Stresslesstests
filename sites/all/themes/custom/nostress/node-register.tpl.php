<div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
	<?php if ($page == 0): ?>
    	
		<?php print $picture ?>
        <h1 class="title"><a href="<?php print $node_url?>"><?php print bb2html($title); ?></a></h1>
       
    <?php endif; ?>
 
    <div class="content"><?php  
	
	  $classid= $node->field_section[0]['value'];
      	 $classqty = $node->field_qty[0]['value'];
      	 
       	
      	$result = (db_query('SELECT n.title as class, r.nid, c.field_model_value, c.field_cost_value, r.body, r.title FROM {node} n LEFT JOIN {content_type_class} c ON n.nid = c.nid  LEFT JOIN {node_revisions} r ON c.field_class_nid = r.nid WHERE c.nid =  %s', $classid));
      	 
      	 $node1 = db_fetch_object($result);
		 
		 //$classname = str_replace(" ","+",$node1->class);
		 $classname = $node1->class;
	
		//Format for the Mal's Ecommerce Buy link
		 //$classtitle = str_replace(" ","+",$node1->title);
		 $classtitle = $node1->title;
		 
      	// $buylink = 'http://ww10.aitsafe.com/cf/add.cfm?userid=C8294160&product='.$classname.'-'.$classtitle.'&price='.$node1->field_cost_value.'&qty='.$classqty.'&scode='.$node1->field_model_value.':'.$node->nid . '&return=66.225.219.161/~stressle/';
      	 
$buylink = '<div align="center"><FORM METHOD="POST" ACTION="http://ww10.aitsafe.com/cf/add.cfm">'
. '<INPUT TYPE="HIDDEN" NAME="userid" VALUE="C8294160">'
.'<INPUT TYPE="HIDDEN" NAME="product" VALUE="'.$classname.'-'.$classtitle.'">'
.'<INPUT TYPE="HIDDEN" NAME="price" VALUE="'.$node->field_sliding_costs[0]['value'].'">'
.'<INPUT TYPE="HIDDEN" NAME="qty" VALUE="'.$classqty.'">'
.'<INPUT TYPE="HIDDEN" NAME="scode" VALUE="'.$node1->field_model_value.':'.$node->nid . ': ' .$node->field_names[0]['value'].', ">'
.'<input type=hidden name=return value=stresslesstests.org>'
.'<INPUT TYPE="image" src="/files/image/completeRegBtn.jpg" value="Complete Registration" alt="Complete Registration"> </FORM><br /><br /></div>';

?>

<?php
	if ($_GET['complete'] == 1){
?>
<p class="highlight"><strong>If paying by check or money order, print this form and send with the check to the address below.  Otherwise, print this page for your records.</strong></p>
<div align="center">
<button onClick="window.print()" >Print this Page!</button><br /><br />
</div>


<?php
	} else {
?>
	<p class="highlight"><strong>Your registration is not complete!  Click below to choose a payment method.</strong></p><br />
	
<?php
	echo $buylink;
	} 
?>



<div id="reg_display">
<table width="470" border="1" cellspacing="2" cellpadding="2">
  <tr>
    <td class="rowbg1" width="35%"><span class="field-label">Class</span></td>
    <td><span class="field-item"><?php print $node1->title ?></span></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">Section</span></td>
    <td><span class="field-item"><?php print $node->field_section[0]['view'] ?></span></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">Cost</span></td>
    <td><span class="field-item">$<?php print $node->field_sliding_costs[0]['value'] ?></span></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">Product</span></td>
    <td><span class="field-item"><?php print $node->field_product[0]['value'] ?></span></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">Number of Attendees</span></td>
    <td><span class="field-item"><?php print $node->field_qty[0]['view'] ?></span></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">Attendee Name(s)</span></td>
    <td><span class="field-item"><?php print $node->field_names[0]['view'] ?></span></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">School</span></td>
    <td><span class="field-item"><?php print $node->field_school[0]['view'] ?></span></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">Address</span></td>
    <td><span class="field-item"><?php print $node->field_address[0]['view'] ?></span></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">Email</span></td>
    <td><span class="field-item"><?php print $node->field_email[0]['view'] ?></span></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">Home Phone</span></td>
    <td><span class="field-item"><?php print $node->field_phone[0]['view'] ?></span></td>
  </tr>
  </table>
 
  
 <?php if ($node1->nid == 13) : ?>
<table width="470" border="1" cellspacing="2" cellpadding="2">  
   <tr>
    <td class="rowbg1" width="35%"><span class="field-label">Student Information</span></td>
    <td><?php foreach ((array)$node->field_student_information as $item) { ?>
      <div class="field-item"><?php print $item['view'] ?></div>
    <?php } ?></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">My child has taken the Study Skills class:</span></td>
    <td><span class="field-item"><?php print $node->field_graduate[0]['view'] ?></span></td>
  </tr>
  </table>

  <?php else: ?>
  
<table width="470" border="1" cellspacing="2" cellpadding="2">  <tr>
    <td class="rowbg1" width="35%"><span class="field-label">Parent Name</span></td>
    <td><span class="field-item"><?php print $node->field_parent_name[0]['view'] ?></span></td>
  </tr>
  <tr>
    <td class="rowbg1"><span class="field-label">Grade</span></td>
    <td><span class="field-item"><?php $node->field_grade[0]['view'] ?><?php print $node->field_grade[0]['view'] ?></span></td>
  </tr>
 
</table>
  <?php endif; ?>
  <?php
  	$total_cost = $classqty * $node->field_sliding_costs[0]['value'];
  ?>
  <?php if ($_GET['complete'] == 1){ ?>
  
  <strong> Total Amount: </strong>$<?php print $total_cost; ?> <br />
 </div>
  
  <div id="check_info">
  <p>Checks for the total amount should be made payable to:
  <strong>HD Foundation</strong> and mailed to: Betty Caldwell, 9462 Greco Garth, Columbia, MD 21045</p>
  </div>
  
  <?php 
  } else {
  	echo " </div>";
  }
	
	
	?></div>
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