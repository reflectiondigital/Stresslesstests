<?php

function phptemplate_admin_menu_icon() {
  $output = '<img id="admin_menu_icon" src="' . check_url(base_path() . 'misc/rd.ico') . '" alt="" border="0" />';
  return $output;
}


/*******************************************
function nostress_menu_tree($pid = 0) {
  if ($tree = menu_tree($pid)) {
    $output .= "<ul class=\"menu-tree\">";
    $output .= $tree;
    $output .= "</ul>";
    return $output;
  }
}
*/

/*******************************************
function nostress_menu_item($mid, $children = '', $leaf = TRUE) {
 return '<li class="'. ($leaf ? 'leaf' : ($children ? 'expanded' : 'collapsed')) .'">'. menu_item_link($mid) . $children ."</li>\n";
 // return '<li>'. menu_item_link($mid) . $children ."</li>";
}*/

/*function phptemplate_menu_item($mid, $children = '', $leaf = TRUE) {
  return '<li id="menu-item-'.$mid.'" class="'. ($leaf ? 'leaf' : ($children ? 'expanded' : 'collapsed')) .'">'. menu_item_link($mid) . $children ."</li>\n";
}*/


function nostress_menu_local_task($mid, $active = FALSE) {
  return '<li '. ($active ? 'class="active" ' : '') .'><span><span>'. menu_item_link($mid) ."</span></span></li>\n";
}


function bb2html($text) {
  $bbcode = array(
                  "[strong]", "[/strong]",
                  "[b]",  "[/b]",
                  "[u]",  "[/u]",
                  "[i]",  "[/i]",
                  "[em]", "[/em]",
				  "[sup]", "[/sup]"
                );
  $htmlcode = array(
                "<strong>", "</strong>",
                "<strong>", "</strong>",
                "<u>", "</u>",
                "<em>", "</em>",
                "<em>", "</em>",
				"<sup><small>", "</small></sup>"
              );
  return str_replace($bbcode, $htmlcode, $text);
}

function bb_strip($text) {
  $bbcode = array(
                  "[strong]", "[/strong]",
                  "[b]",  "[/b]",
                  "[u]",  "[/u]",
                  "[i]",  "[/i]",
                  "[em]", "[/em]",
				  "[sup]", "[/sup]"
                );
  return str_replace($bbcode, '', $text);
}

function _phptemplate_variables($hook, $vars = array()) {
  switch ($hook) {
    case 'page':
    //titles are now replaced by specific node type
    $vars['breadcrumb_title'] = $vars['title'];
    if (arg(0) == 'node' && is_numeric(arg(1))) {
      $node = node_load(arg(1));
	  //specify node type(s) to replace title for
      if (in_array($node->type, array('register'))) {
        $vars['title'] = 'Registration Information';
      }
    }
    break;
  } 
 
  return $vars;
}

function _phptemplate_encode_mailto($mail) {
  $link = 'document.write(\'<a href="mailto:' . $mail . '">' . $mail . '</a>\');';
  $js_encode = '';  for ($x = 0; $x < strlen($link); $x++) {
    $js_encode .= '%' . bin2hex($link{$x});
  }

  $link = '<script type="text/javascript" language="javascript">eval(unescape(\''.$js_encode.'\'))</script>';
  $link .= '<noscript>'.str_replace(array('@','.'),array(' at ',' dot '),$mail). '</noscript>';
  return $link;
}



?>