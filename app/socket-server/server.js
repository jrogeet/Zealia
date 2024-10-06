const express = require('express');
const app = express();
const http = require('http').createServer(app);
const io = require('socket.io')(http, {
    cors: {
        origin: "http://zealia.local", // Match your client URL
        methods: ["GET", "POST"]
    }
});

// Enable receiving events from PHP
app.use(express.json());

// Endpoint for PHP to emit events
app.post('/emit', (req, res) => {
    const { event, data } = req.body;
    io.emit(event, data);
    res.json({ success: true });
});

io.on('connection', (socket) => {
    console.log('A user connected');

    // Handle the 'new_notification' event
    socket.on('new_notification', (data) => {
        console.log('New notification received:', data);
        // Broadcast the notification to all connected clients
        io.emit('new_notification', data);
    });

    socket.on('disconnect', () => {
        console.log('User disconnected');
    });
});

const PORT = process.env.PORT || 3000;
http.listen(PORT, () => {
    console.log(`Socket.IO server running on port ${PORT}`);
});