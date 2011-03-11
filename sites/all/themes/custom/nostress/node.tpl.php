<div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
	<?php if ($page == 0): ?>
    	
		<?php print $picture ?>
        <h1 class="title"><a href="<?php print $node_url?>"><?php print bb2html($title); ?></a></h1>
        
    <?php endif; ?>
 
    <div class="content"><?php print $content ?></div>
    <br />
    <?php if ($links): ?>
    	<div class="links-align">
        	<div class="bg-links">
                <div class="links-left">
                    <div class="links-right">
                        <div class="links"><?php 
						
						//DOn't show AddThis for protected page
						if ($node->nid != 1442){
							print $links;
						}
						 ?>
                         
                        
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    <?php endif; ?>
</div>