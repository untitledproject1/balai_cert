$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


var loading= false;
var isPushEnabled= false;
var pushButtonDisabled= true;

function RegisterServiceWorker() {
    if (!('serviceWorker' in navigator)) {
        console.log('Service workers aren\'t supported in this browser.')
        return
    } else {
        navigator.serviceWorker.register('/sw.js')
        .then(() => this.initialiseServiceWorker())
        .catch((err) => {
            console.log(err)
        });
    }
}

function initialiseServiceWorker () {
  if (!('showNotification' in ServiceWorkerRegistration.prototype)) {
    console.log('Notifications aren\'t supported.')
    return
  }

  if (Notification.permission === 'denied') {
    console.log('The user has blocked notifications.')
    return
  }

  if (!('PushManager' in window)) {
    console.log('Push messaging isn\'t supported.')
    return
  }
}

function subscribe () {
  navigator.serviceWorker.ready.then(registration => {
    const options = { userVisibleOnly: true }
    const vapidPublicKey = window.Laravel.vapidPublicKey

    if (vapidPublicKey) {
      options.applicationServerKey = this.urlBase64ToUint8Array(vapidPublicKey)
    }

    registration.pushManager.subscribe(options)
      .then(subscription => {
        this.isPushEnabled = true
        this.pushButtonDisabled = false

        this.updateSubscription(subscription)
      })
      .catch(e => {
        if (Notification.permission === 'denied') {
          console.log('Permission for Notifications was denied')
          this.pushButtonDisabled = true
        } else {
          console.log('Unable to subscribe to push.', e)
          this.pushButtonDisabled = false
        }
      })
  })
}


function unsubscribe () {
  navigator.serviceWorker.ready.then(registration => {
    registration.pushManager.getSubscription().then(subscription => {
      if (!subscription) {
        this.isPushEnabled = false
        this.pushButtonDisabled = false
        return
      }

      subscription.unsubscribe().then(() => {
        this.deleteSubscription(subscription)

        this.isPushEnabled = false
        this.pushButtonDisabled = false
      }).catch(e => {
        console.log('Unsubscription error: ', e)
        this.pushButtonDisabled = false
      })
    }).catch(e => {
      console.log('Error thrown while unsubscribing.', e)
    })
  })
}

function togglePush () {
  if (this.isPushEnabled) {
    this.unsubscribe()
  } else {
    this.subscribe()
  }
}

function updateSubscription (subscription) {
  const key = subscription.getKey('p256dh')
  const token = subscription.getKey('auth')
  const contentEncoding = (PushManager.supportedContentEncodings || ['aesgcm'])[0]

  const data = {
    endpoint: subscription.endpoint,
    publicKey: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(key))) : null,
    authToken: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(token))) : null,
    contentEncoding
  }

  this.loading = true

  $.post('/subscriptions', data)
    .then(() => { this.loading = false })
}

function sendNotification () {
  this.loading = true

  $.post('/notifications')
    .catch(error => console.log(error.responseJSON))
    .then((data) => { 
        this.loading = false;
        console.log(data);
    })
}

/**
 * https://github.com/Minishlink/physbook/blob/02a0d5d7ca0d5d2cc6d308a3a9b81244c63b3f14/app/Resources/public/js/app.js#L177
 *
 * @param  {String} base64String
 * @return {Uint8Array}
 */
function urlBase64ToUint8Array (base64String) {
  const padding = '='.repeat((4 - base64String.length % 4) % 4)
  const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/')

  const rawData = window.atob(base64)
  const outputArray = new Uint8Array(rawData.length)

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i)
  }

  return outputArray
}
    
function displayNotification() {
  if (Notification.permission == 'granted') {
    navigator.serviceWorker.getRegistration().then(function(reg) {
      var options = {
        body: 'Here is a notification body!',
        vibrate: [100, 50, 100],
        data: {
          dateOfArrival: Date.now(),
          primaryKey: 1,
          link: 'sa'
        }
      };
      reg.showNotification('Hello world!', options);
    });
  }
}

$(document).ready(function () {
  // RegisterServiceWorker()
  // subscribe();
  $('#notif').on('click',function () {
    // displayNotification();
    sendNotification();
  })

  // $('#acc').on('click',function () {
  //   togglePush();
  // })
})