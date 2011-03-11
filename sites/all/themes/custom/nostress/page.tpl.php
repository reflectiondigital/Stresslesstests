<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" dir="ltr">
<head>
  <title><?php print bb_strip($head_title); ?></title>

    <meta http-equiv="Content-Style-Type" content="text/css" />

	<?php print $head ?>
    <?php print $styles ?>
    <?php print $scripts ?>
    <style type="text/css" media="screen">@import "<?php print $base_path?>/sites/all/themes/custom/nostress/menus.css";</style>
    <style type="text/css" media="print">@import "<?php print $base_path?>/sites/all/themes/custom/nostress/print.css";</style>


    <script type="text/javascript"><!--//--><![CDATA[//><!--

	sfHover = function() {
		var sfEls = document.getElementById("nav").getElementsByTagName("LI");
		for (var i=0; i<sfEls.length; i++) {
			sfEls[i].onmouseover=function() {
				this.className+=" sfhover";
			}
			sfEls[i].onmouseout=function() {
				this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
			}
		}
	}
	if (window.attachEvent) window.attachEvent("onload", sfHover);
	
	//--><!]]></script>
    <style>
    <!--[if IE]-->
#nav li:hover ul, #nav li.sfhover ul { 
	margin-left: -60px;
}
<!--[endif]-->
</style>

</head>  
<body>
<div class="header-right-wrapper"></div>
<div class="site">
  <!--=========header========= -->
  	<div id="header">
		<?php if ($logo) : ?>
                     <a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><img src="<?php print($logo) ?>" alt="<?php print t('Home') ?>" border="0" class="logo" /></a><br />
		<?php endif; ?>
        <?php print $header; ?>
        
	</div>
    <div class="main">
    	<div class="top-menu">
        	<div class="menu-wrapper">
            	<div class="left">
                	<div class="right">
                    	<ul class="nice-menu nice-menu-down" id="nav">
						 <?php if (isset($primary_links)) : ?>
							<?php 
							// $menuhtml = theme_menu_tree(2); 
							// print $menuhtml;
							 
							 print menu_tree(2); // 2 is id of primry_links
							//print theme('links', $menuhtml, array('class' => 'links primary-links'))
							 ?>
                        <?php endif; ?>
                      	</ul>  
                      
                            
                        <br class="clear" />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="breadcrumb-row">
        	<?php if ($breadcrumb != ""): ?>
				<?php print $breadcrumb ?>
            <?php endif; ?>
        </div>
    </div>  	
  <!--========//header======== -->

  <!-- -->
  <!--=========content========= -->
  	<div class="content-wrapper">
    	<div class="main">
        	<div class="search-row">
    			<div class="search-box">
					<?php if ($search_box): print $search_box;  endif; ?>
                </div>
            </div>
            <div id="cont">

                <div class="cont-line"> 
                    <div id="cont-col">
                        <?php if ($sidebar_right) { ?><div class="ind"> <?php } ?> 
							<?php if ($mission != ""): ?>
                                <div id="mission"><?php print $mission ?></div>
                            <?php endif; ?>
                                        
                            <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
                            <?php if ($title): print '
                                <h1'. ($tabs ? ' class="with-tabs title"' : '') .'>'.  bb2html($title) .'</h1>
                            '; endif; ?>
                            <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
                            <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
                                             
                            <?php if ($show_messages && $messages != ""): ?>
                                <?php print $messages ?>
                            <?php endif; ?>
                        
                            <?php if ($help != ""): ?>
                                <div id="help"><?php print $help ?></div>
                            <?php endif; ?>
                        
                              <!-- start main content -->
                            <?php print $content; ?>
                      <?php if ($sidebar_right) { ?></div> <?php } ?>  

                    </div>
                   <?php if ($sidebar_right) { ?>
                   <div id="right-col"> 
                  	<div class="ind">
						<?php print $sidebar_right; ?>
                  	</div>
                  </div> 
                  <?php } ?>               
                </div>
            </div>
        </div>
    </div>
  <!--=======//content========= -->
  <!-- -->

  <!--=========footer========= -->
  	<div class="main">
    	<div id="footer">
        	<?php if ($footer_message || $footer) : ?>
                 <?php print $footer_message;?>
            <?php endif; ?>                                
        </div>
    </div>
  <!--=======//footer========= -->
</div>
<?php print $closure;?>
</body>
</html>