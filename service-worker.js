const cacheName = 'my-page-cache-v1';

// Resources to be cached
const resourcesToCache = [
    '/',
    '/index.php',
    '/css/style.min.css',
    '/js/app.min.js',
];

/**
 * Event: Install
 * Caches the specified resources during the service worker installation.
 */
self.addEventListener('install', event => {
    event.waitUntil(
    caches.open(cacheName)
    .then(cache => {
        return cache.addAll(resourcesToCache);
        })
    );
});

/**
 * Event: Activate
 * Deletes outdated caches and activates the new cache.
 */
self.addEventListener('activate', event => {
    event.waitUntil(
    caches.keys().then(cacheNames => {
            return Promise.all(
            cacheNames.filter(name => name !== cacheName)
            .map(name => caches.delete(name))
            );
        })
    );
});

/**
 * Event: Fetch
 * Handles requests by checking if the requested resource is available in the cache.
 * If found, serves the cached version. Otherwise, fetches the resource from the network.
 */
self.addEventListener('fetch', event => {
    event.respondWith(
    caches.match(event.request)
        .then(response => {
        if (response) {
            return response;
        }

        return fetch(event.request);
        })
    );
});
