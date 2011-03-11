// $Id: imce_set_fck.js,v 1.1.2.7 2008/06/11 00:00:29 ufku Exp $

function imceSetFCK(fck) {
  var types = {Image: 1, Link: 1, Flash: 1};
  var props = {Browser: true, BrowserURL: imceBrowserURL || '/?q=imce/browse'};
  for (var type in types) for (var prop in props){
    fck.Config[type + prop] = props[prop];
  }
}

$(document).ready(function() {
  for (var fck, i = 1; fck = window['oFCK_'+ i]; i++) {
    imceSetFCK(fck);
  }
});
