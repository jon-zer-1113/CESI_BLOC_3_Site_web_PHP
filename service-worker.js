const cacheName = 'my-page-cache-v1';

const resourcesToCache = [
    '/',
    '/index.php',
    '/css/style.min.css',
    '/js/app.min.js',
];

self.addEventListener('install', event => {
    event.waitUntil(
    caches.open(cacheName)
    .then(cache => {
        return cache.addAll(resourcesToCache);
        })
    );
});

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