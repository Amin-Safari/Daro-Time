self.addEventListener('push', function(event) {
    if (event.data) {
        const data = event.data.json();
        
        const options = {
            body: data.message,
            icon: '/images/icon-192x192.png',
            badge: '/images/badge-72x72.png',
            vibrate: [100, 50, 100],
            data: {
                url: data.url
            }
        };
        
        event.waitUntil(
            self.registration.showNotification('یادآوری دارو', options)
        );
    }
});

self.addEventListener('notificationclick', function(event) {
    event.notification.close();
    
    event.waitUntil(
        clients.openWindow(event.notification.data.url)
    );
}); 