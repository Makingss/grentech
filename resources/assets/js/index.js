/**
 * Created by Making on 2017/7/4.
 */
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
app.get('/', function (request, response) {
    // response.send('Hello Making');
    response.sendFile(__dirname+'/index.html');
    
});
io.on('connection',function(socket){
    socket.on('chat.message',function(massage){
        // console.log('a can socket massage ' + massage);
        socket.emit('chat.message',massage);
    });
});

http.listen(3000, function () {
    console.log('Server Start');    
});