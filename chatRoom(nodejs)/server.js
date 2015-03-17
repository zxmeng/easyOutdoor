var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var history = new Array();

//build a express app
app.get('/', function(req, res){
    res.sendfile('chat.html');
});

//io part
io.on('connection', function(socket) {
    socket.on('chat message', function(msg){
        io.emit('chat message', msg);
    addMsg(msg);
    });

    socket.on('login message', function(msg){
        socket.join('history room');
        for(var i=0; i<history.length; i++){
            io.in('history room').emit('chat message', history[i]);
        }
        io.in('history room').emit('chat message', 'lyd__- Above are history messages -');
        socket.leave('history room');
        socket.join('chat room'); 
 
        io.emit('chat message',msg);
        addMsg(msg);
    });
});

//set the port
http.listen(3000, function(){
    console.log('listening on: 3000');
});

function addMsg(msg){
    history.push(msg);
    if(history.length>100)
        history.shift();
};