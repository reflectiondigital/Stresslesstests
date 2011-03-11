/* $Id: greybox.js,v 1.1.2.5 2008/12/04 12:00:15 Gurpartap Exp $ */

/**
 * Greybox Redux
 * jQuery is required(included in Drupal 5): http://jquery.com/
 * Written by: John Resig
 * License: GPL
 */

var GB_DONE = false;

function GB_show(caption, url) {
  if(!GB_DONE) {
    $(document.body)
    .append("<div id='GB_overlay'></div><div id='GB_window'><div id='GB_caption'></div>"
      + "<img src='"+ GB_SITEPATH +"/images/close.gif' alt='Close window'/></div>");
    $("#GB_window img").click(GB_hide);
    $("#GB_overlay").click(GB_hide);
    $(window).resize(GB_position);
    $(window).scroll(GB_position);
    GB_DONE = true;
  }
  $("#GB_frame").remove();
  $("#GB_window").append("<iframe id='GB_frame' src='"+ url +"'></iframe>");

  $("#GB_caption").html(caption);
  $("#GB_overlay").show();
  GB_position();

  if (GB_ANIMATION) {
    $("#GB_window").css({ height: 0, width: 0 }).animate({ height: GB_HEIGHT, width: GB_WIDTH, opacity: 1 }, 350, GB_position);
  }
  else {
    $("#GB_window").show();
  }
  
  $('body').css('overflow', 'hidden');
}

function GB_hide() {
  if (GB_ANIMATION) {
    $("#GB_window").animate({ height: 0, width: 0, opacity: 0 }, 350);
    $("#GB_overlay").hide();
  }
  else {
    $("#GB_window, #GB_overlay").hide();
  }
  $('body').css('overflow', 'auto');
}

// Keep Greybox Window centered regardless of window scroll.
// Code from http://jquery.com/blog/2006/02/10/greybox-redux/
function GB_position() {
  var de = document.documentElement;
  var h = self.innerHeight || (de && de.clientHeight) || document.body.clientHeight;
  var w = self.innerWidth || (de && de.clientWidth) || document.body.clientWidth;
  var iebody = (document.compatMode && document.compatMode != "BackCompat") ? document.documentElement : document.body;
  var dsocleft = document.all? iebody.scrollLeft : pageXOffset;
  var dsoctop = document.all? iebody.scrollTop : pageYOffset;
    
  var height = h < GB_HEIGHT ? h - 32 : GB_HEIGHT;
  var top = (h - height)/2 + dsoctop;

  $("#GB_window, #GB_frame").css({ width: GB_WIDTH +"px", height: height +"px",
    left: ((w - GB_WIDTH)/2) +"px", top: top +"px" });
  $("#GB_frame").css("height", height - 32 +"px");
  $("#GB_overlay").css({ height: h, top: dsoctop +"px", width: w });

}

