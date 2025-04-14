import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? "mt1",
    wsHost: import.meta.env.VITE_PUSHER_HOST,
    wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
    wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? "https") === "https",
    authEndpoint: "/broadcasting/auth",
    enabledTransports: ["ws", "wss"],
});

Pusher.logToConsole = true; // Enable Pusher logs in the browser console

window.Echo.connector.pusher.connection.bind("connected", function () {
    console.log("Pusher is connected!");
});

window.Echo.connector.pusher.connection.bind("error", function (err) {
    console.error("Pusher error:", err);

    if (err.error) {
        console.error("Pusher error:", err.error);

        if (
            err.error.message &&
            err.error.message.includes("Couldn't resolve host")
        ) {
            alert(
                "Real-time features are currently unavailable. Please refresh or try again later."
            );
        }
    }

    // Display custom messages for users
    if (err.error.data && err.error.data.code === 4004) {
        console.log("Pusher limit exceeded or connection failed.");
    } else if (err.type === "WebSocketError") {
        console.log("Network issue. Trying to reconnect...");
    }
});

window.Echo.connector.pusher.connection.bind("disconnected", () => {
    console.log("Disconnected from chat. Please check your internet.");
});

window.Echo.connector.pusher.connection.bind("connecting", () => {
    console.log("Trying to connect to Pusher...");
});

window.Echo.connector.pusher.connection.bind("connected", () => {
    console.log("Connected to Pusher!");
});

window.Echo.connector.pusher.connection.bind("unavailable", () => {
    console.log("Pusher is currently unavailable. Please try again later.");
});
