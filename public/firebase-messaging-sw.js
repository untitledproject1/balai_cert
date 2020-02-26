importScripts("https://www.gstatic.com/firebasejs/7.6.2/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/7.6.2/firebase-messaging.js");

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
messaging.setBackgroundMessageHandler(function(payload) {
	const title = payload.data.title;
	const options = {
		body: payload.data.toast_msg,
		icon: './images/icon/logo-polos.ico',
		badge: './images/icon/logo-polos.ico'
	}

	return self.registration.showNotification(title, options);
});


// addEventListener('push', event => {
//   event.waitUntil(async function() {
//     // Exit early if we don't have access to the client.
//     // Eg, if it's cross-origin.
//     if (!event.clientId) return;

//     // Get the client.
//     const client = await clients.get(event.clientId);
//     // Exit early if we don't get the client.
//     // Eg, if it closed.
//     if (!client) return;

//     // Send a message to the client.
//     client.postMessage({
//       msg: "Hey I just got a fetch from you!",
//       url: event.request.url
//     });

//   }());
// });