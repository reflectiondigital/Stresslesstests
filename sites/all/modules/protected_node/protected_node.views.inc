<?php
// $Id: protected_node.views.inc,v 1.1.2.1 2008/10/14 10:16:21 tolmi Exp $

function protected_node_views_tables() {
  $tables["protected_nodes"] = array(
    "name"     => "protected_nodes",
    "join"     => array(
      "left" => array(
        "table" => "node",
        "field" => "nid"
      ),
      "right" => array(
        "table" => "protected_nodes",
        "field" => "nid"
      )
    ),
    "filters"  => array(
      "passwd" => array(
        "field"     => "passwd",
        "name"      => t("Protected: Only show nodes that"),
        'operator'  => array('IS NOT' => t('Are'), 'IS' => t('Are Not')),
        'help'      => t('Filter in/out nodes protected with passwords.'),
        'handler'   => 'views_handler_filter_null',
        'value'     => _protected_node_hidden_form(NULL, t('protected.'))
      )
    )
  );
  return $tables;
}

// copied from bio: bio_views.inc
function _protected_node_hidden_form($value, $markup) {
  $form['text'] = array (
    '#type' => 'markup',
    '#value' => $markup,
  );
  $form['value'] = array (
      '#type' => 'value',
      '#value' => $value,
  );

  return $form;
}
