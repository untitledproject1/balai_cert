$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyD0WJDyazAqWpUyKMLY_EMRxAQ6wpNVOa0",
  authDomain: "laravelfirebase-950b6.firebaseapp.com",
  databaseURL: "https://laravelfirebase-950b6.firebaseio.com",
  projectId: "laravelfirebase-950b6",
  storageBucket: "laravelfirebase-950b6.appspot.com",
  messagingSenderId: "1084864309425",
  appId: "1:1084864309425:web:08f0a4f9ead6af067d9a90"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Retrieve Firebase Messaging object.
const messaging = firebase.messaging();

// Add the public key generated from the console here.
messaging.usePublicVapidKey("BCdTtSHySkiN9bztm11hYONrN1YSMoF4l3sSIP8E1N9QCVEiCzlGd9sl9oAQM6ZvKCqd2-UYsk8CMdVrxLphusU");

messaging.requestPermission()
.then(function() {
  console.log('Permission granted');
  return messaging.getToken();
})
.then(function(token) {
  var url = ''+window.location;
  var produk_id = url.split('/')[6];
  // var produk_id = '';
  // if (urlArr[3] == 'client') {
  //   produk_id = urlArr[4];
  // } else if(urlArr[3] == 'admin') {
  //   produk_id = urlArr[6];
  // }
  // subscribe(token, produk_id);
  subscribe(token);
})
.catch(function(err) {
  console.log(err);
})

messaging.onMessage(function(payload) {
  var toast_notif = $('.toast-notif').clone().first();

  $('#toast-notif').prepend(toast_notif);
  toast_notif.show();
  toast_notif.toast('show');
  toast_notif.find('.toast-notif-title').html(payload.data.title);
  toast_notif.find('.toast-notif-text').html(payload.data.toast_msg.substr(0, 60)+'...');
  toast_notif.toast({'animation': true});
  setTimeout(function() {
    toast_notif.fadeOut(function() {
        toast_notif.remove();
    });
  }, 5000);

  var notif_amount = $('#notif-count').html();
  var notif_container = $('#notif-container');
  var notif = $('#notif-row').clone().first();
  notif.show();
  
  // set data notif
  notif.find('.notif-title').html(payload.data.title);
  notif.find('.notif-subtitle').html(payload.data.subtitle);
  notif.find('.notif-content').html(payload.data.data.substr(0, 60)+'...');
  notif.find('.notif-time').html(payload.data.time);

  if (notif_amount == '') {
    notif_container.html(notif);
    $('#notif-count').html(1);
  } else {
    notif_container.prepend('<hr>');
    notif_container.prepend(notif);
    $('#notif-count').html(parseInt(notif_amount)+1);
  }
})

    
function subscribe(token, produk_id) {
  $.post('/subscriptions', {
    user_fcm_token: token,
    produk_id: produk_id
  }).done(function(data) {
    console.log(data);
  }).fail(function(err) {
    console.log(err.responseJSON);
  });
}