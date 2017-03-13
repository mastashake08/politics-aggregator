"use strict";
importScripts('socket.io-1.4.5.js');
function notifyMe(message,link) {


  // Let's check whether notification permissions have already been granted
 if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    if (permission === "granted") {
      var options = {
        data: {
          url:link,
          sound: "https://allaroundpolitics.com/censor.mp3'",
          vibrate: [200, 100, 200]
        }
      };
      var notification = new Notification(message,options);
      notification.onclick = function(event) {
      event.preventDefault(); // prevent the browser from focusing the Notification's tab
      window.open("https://allaroundpolitics.com/articles/"+link, '_blank');
    }
    }
  }

  // Otherwise, we need to ask the user for permission
  if (Notification.permission !== 'denied') {
    
  }

  // At last, if the user has denied notifications, and you
  // want to be respectful there is no need to bother them any more.
  }
  // Let's check if the browser supports notifications


  // Let's check whether notification permissions have already been granted
 if (Notification.permission === "granted") {
    // If it's okay let's create a notification

  }

  // Otherwise, we need to ask the user for permission
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {

    });
  }
  var socket = io.connect("https://allaroundpolitics.com:6002");
  socket.on('new-article',function(data){
    notifyMe(data.title,data.url);
  });
