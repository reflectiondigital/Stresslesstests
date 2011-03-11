<div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
	<?php if ($page == 0): ?>
    	
		<?php print $picture ?>
        <h1 class="title"><a href="<?php print $node_url?>"><?php print bb2html($title); ?></a></h1>
 
    <?php endif; ?>
      
      <?php if ($links): ?>
    <div class="links">
        <?php
		$totalComments = $node->comment_count;
		if ($totalComments == 1){
			$commentText = "comment";
		} else if ($totalComments > 1 || $totalComments == 0){
			$commentText = "comments";
		}
	?>
    
	<?php print $links; ?> &nbsp;&nbsp;<a href="<?php print $node_url?>#comments"><?php print $totalComments . " " . $commentText?> - Read and Add Your Own!</a> </div>
    
    
    

    <?php endif; ?>
    
    <div class="content"><?php print $content ?></div>
    <a href="<?php print $node_url?>#comments"><?php print $totalComments . " " . $commentText?> - Read and Add Your Own!</a>
    <br />
    
	<?php
global $user;

if ( $user->uid ) {
	  // Logged in user
	  //print "testing<br />";
	  //print $node->comment_count;
	  //print_r($node);
}

?>
    
</div>