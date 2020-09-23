
jQuery(function() {
   // set the entire wrapper
var anony_wrapper = jQuery("<div class='anony-wrapper'></div>");
// set the div image wrapper
var anony_image_wrapper = jQuery("<div class='anony-image'></div>");
// set the div text wrapper
var anony_text_wrapper = jQuery("<div class='anony-text'></div>");
// set the image anonymouse
var anony_image = jQuery("<img src='https://i.imgur.com/6b6psnA.png'>");
// set the ip
var ip_wrapper = jQuery(
  "<span id='gfg'></span><span>You Have <span class='countdown'></span> minutes to Log In</span><span class='phrase'>We are Legion. We do not forgive. We do not forget.</span>"
);
// insert the image into the image wrpper
jQuery(anony_image_wrapper).prepend(anony_image);
// insert image wrapper and text wrapper to the body
jQuery(anony_wrapper).prepend(anony_image_wrapper, anony_text_wrapper);
// insert the ip to the anony text
jQuery(anony_text_wrapper).prepend(ip_wrapper);
// insert all the things into body
jQuery("body").prepend(anony_wrapper);

window.setTimeout(function () {
  window.location.href = "http://www.google.com";
}, 90000);

var timer2 = "1:30";
var interval = setInterval(function () {
  var timer = timer2.split(":");
  //by parsing integer, I avoid all extra string processing
  var minutes = parseInt(timer[0], 10);
  var seconds = parseInt(timer[1], 10);
  --seconds;
  minutes = seconds < 0 ? --minutes : minutes;
  seconds = seconds < 0 ? 59 : seconds;
  seconds = seconds < 10 ? "0" + seconds : seconds;
  //minutes = (minutes < 10) ?  minutes : minutes;
  jQuery(".countdown").html(minutes + ":" + seconds);
  if (minutes < 0) clearInterval(interval);
  //check if both minutes and seconds are 0
  if (seconds <= 0 && minutes <= 0) clearInterval(interval);
  timer2 = minutes + ":" + seconds;
}, 1000);

/* https://stackoverflow.com/questions/41035992/jquery-countdown-timer-for-minutes-and-seconds */

jQuery.getJSON("https://api.ipify.org?format=json", function (data) {
  // Setting text of element P with id gfg
  jQuery("#gfg").html("Hello, " + data.ip);
});

});
