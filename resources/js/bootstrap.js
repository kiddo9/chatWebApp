import axios from "axios";
window.axios = axios;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// import Echo from "laravel-echo";

// import Pusher from "pusher-js";
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: "pusher",
//     key: import.meta.env.PUSHER_APP_KEY,
//     cluster: import.meta.env.PUSHER_APP_CLUSTER ?? "mt1",
//     wsHost: import.meta.env.PUSHER_HOST,
//     wsPort: import.meta.env.PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.PUSHER_SCHEME ?? "https") === "https",
//     enabledTransports: ["ws", "wss"],
// });

// window.Echo = new Echo({
//     broadcaster: "pusher",
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? "mt1",
//     wsHost: import.meta.env.VITE_VITE_PUSHER_HOST,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? "https") === "https",
//     enabledTransports: ["ws", "wss"],
// });

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import "./echo";
