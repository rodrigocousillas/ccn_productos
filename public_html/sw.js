const CACHE_NAME = 'urro-v1';
const ASSETS = [
  './',
  'css/main.css',
  'css/normalize.css',
  'js/main.js',
  'img/pwa-icon-512.png'
];

// Instalar el Service Worker
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(ASSETS);
      })
  );
});

// Activar el Service Worker
self.addEventListener('activate', e => {
  e.waitUntil(
    caches.keys().then(keys => {
      return Promise.all(
        keys.filter(key => key !== CACHE_NAME).map(key => caches.delete(key))
      );
    })
  );
});

// Estrategia de Cache: Cache First, fallback to Network
self.addEventListener('fetch', e => {
  e.respondWith(
    caches.match(e.request)
      .then(res => {
        return res || fetch(e.request);
      })
  );
});
