<?php
// $Id: token_cck.inc,v 1.1.2.12 2010/06/05 17:40:04 davereid Exp $


// Two helper functions that generate appropriate tokens for CCK-added fields.
function content_token_values($type, $object = NULL, $options = array()) {
  $tokens = array();
  if ($type == 'node') {
    $node = $object;
    content_view($node, isset($options['teaser']) ? $options['teaser'] : 0);

    $field_types = _content_field_types();

    foreach (content_fields() as $field) {

      $items = $node->$field['field_name'];
      if (!empty($items)) {
        $function = $field_types[$field['type']]['module'] .'_token_values';
        if (function_exists($function)) {
          $sub_list = $function('field', $items);
          foreach ($sub_list as $token => $value) {
            $tokens[$field['field_name'] .'-'. $token] = $value;
          }
        }
      }
    }
  }
  return $tokens;
}

function content_token_list($type = 'all') {
  if ($type == 'node' || $type == 'all') {
    $list = array();
    $field_types = _content_field_types();

    foreach (content_fields() as $field) {
      $sub_list = array();
      $function = $field_types[$field['type']]['module'] .'_token_list';
      if (function_exists($function)) {
        $sub_list = $function('field');
        foreach ($sub_list as $category => $token_list) {
          foreach ($token_list as $token => $description) {
            $list['CCK '. $category][$field['field_name'] .'-'. $token] = $description;
          }
        }
      }
    }

    return $list;
  }
}



if (module_exists('nodereference')) {
  function nodereference_token_list($type = 'all') {
    if ($type == 'field' || $type == 'all') {
      $tokens = array();

      $tokens['node reference']['nid']   = t("Referenced node ID.");
      $tokens['node reference']['title'] = t("Referenced node title.");
      $tokens['node reference']['link']  = t("Formatted html link to the node.");

      return $tokens;
    }
  }

  function nodereference_token_values($type, $object = NULL, $options = array()) {
    if ($type == 'field') {
      $item = $object[0];

      $tokens['nid']   = $item['nid'];
      $tokens['title'] = strip_tags($item['view']);
      $tokens['link']  = $item['view'];

      return $tokens;
    }
  }
}



if (module_exists('number')) {
  function number_token_list($type = 'all') {
    if ($type == 'field' || $type == 'all') {
      $tokens = array();

      $tokens['number']['raw']       = t("Raw number value.");
      $tokens['number']['formatted'] = t("Formatted number value.");

      return $tokens;
    }
  }

  function number_token_values($type, $object = NULL, $options = array()) {
    if ($type == 'field') {
      $item = $object[0];

      $tokens['raw']       = $item['value'];
      $tokens['formatted'] = $item['view'];

      return $tokens;
    }
  }
}



if (module_exists('text')) {
  function text_token_list($type = 'all') {
    if ($type == 'field' || $type == 'all') {
      $tokens = array();

      $tokens['text']['raw']       = t("Raw, unfiltered text.");
      $tokens['text']['formatted'] = t("Formatted and filtered text.");

      return $tokens;
    }
  }

  function text_token_values($type, $object = NULL, $options = array()) {
    if ($type == 'field') {
      $item = $object[0];
      $tokens['raw']  = $item['value'];
      $tokens['formatted'] = $item['view'];
      return $tokens;
    }
  }
}


if (module_exists('userreference')) {
  function userreference_token_list($type = 'all') {
    if ($type == 'field' || $type == 'all') {
      $tokens = array();

      $tokens['user reference']['uid']   = t("Referenced user ID");
      $tokens['user reference']['name']  = t("Referenced user name");
      $tokens['user reference']['link']  = t("Formatted html link to referenced user");

      return $tokens;
    }
  }

  function userreference_token_values($type, $object = NULL, $options = array()) {
    if ($type == 'field') {
      $item = $object[0];

      $tokens['uid']   = $item['uid'];
      $tokens['name']  = strip_tags($item['view']);
      $tokens['link']  = $item['view'];

      return $tokens;
    }
  }
}


if (module_exists('link')) {
  function link_token_list($type = 'all') {
    if ($type == 'field' || $type == 'all') {
      $tokens = array();

      $tokens['link']['url']    = t("Link URL");
      $tokens['link']['title']  = t("Link title");
      $tokens['link']['view']   = t("Formatted html link");

      return $tokens;
    }
  }

  function link_token_values($type, $object = NULL, $options = array()) {
    if ($type == 'field') {
      $item = $object[0];

      $tokens['url']    = $item['url'];
      $tokens['title']  = $item['title'];
      $tokens['view']   = $item['view'];

      return $tokens;
    }
  }
}



if (module_exists('imagefield')) {
  function imagefield_token_list($type = 'all') {
    if ($type == 'field' || $type == 'all') {
      $tokens = array();

      $tokens['image']['fid']       = t("Image file ID");
      $tokens['image']['title']     = t("Image title");
      $tokens['image']['alt']       = t("Image alt text");
      $tokens['image']['filename']  = t("Image file name");
      $tokens['image']['filepath']  = t("Image path");
      $tokens['image']['filemime']  = t("Image MIME type");
      $tokens['image']['filesize']  = t("Image file size");
      $tokens['image']['view']      = t("Fully formatted HTML image tag");

      return $tokens;
    }
  }

  function imagefield_token_values($type, $object = NULL, $options = array()) {
    if ($type == 'field') {
      $item = $object[0];

      $tokens['fid']      = $item['fid'];
      $tokens['title']    = $item['title'];
      $tokens['alt']      = $item['alt'];
      $tokens['filename'] = $item['filename'];
      $tokens['filepath'] = $item['filepath'];
      $tokens['filemime'] = $item['filemime'];
      $tokens['filesize'] = $item['filesize'];
      $tokens['view']     = $item['view'];

      return $tokens;
    }
  }
}



if (module_exists('date') && !function_exists('date_token_list')) {
  function date_token_list($type = 'all') {
    if ($type == 'field' || $type == 'all') {
      $tokens = array();

      $tokens['date']['value']          = t("The raw date value.");
      $tokens['date']['view']           = t("The formatted date.");
      $tokens['date'] += token_get_date_token_info(t('Date'));
      $tokens['date']['to-????']        = t("If the field has a to-date defined, the same tokens exist in the form: [to-????], where ???? is the normal token.");

      return $tokens;
    }
  }

  function date_token_values($type, $object = NULL, $options = array()) {
    if ($type == 'field') {
      include_once(drupal_get_path('module', 'date') .'/date.inc');
      $item = $object[0];

      $item['value'] = trim($item['value']);
      $item_format = (is_numeric($item['value']) ? DATE_UNIX : DATE_ISO);
      $date = date_make_date($item['value'], 'none', 'local', $item_format);

      $tokens['value']          = $item['value'];
      $tokens['view']           = $item['view'];
      $tokens['timestamp']      = $date->local->timestamp;
      $tokens += token_get_date_token_values($date->local->timestamp);

      if (!empty($item['value2'])) {

        $item['value2'] = trim($item['value2']);
        $item_format = (is_numeric($item['value2']) ? DATE_UNIX : DATE_ISO);
        $date = date_make_date($item['value2'], 'none', 'local', $item_format);

        $tokens['to-value']          = $item['value2'];
        $tokens['to-view']           = $item['view2'];
        $tokens['timestamp']         = $date->local->timestamp;
        $tokens += token_get_date_token_values($date->local->timestamp, 'to-');
      }
      return $tokens;
    }
  }
}
