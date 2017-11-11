
var fs =  require('fs');

var options = {
    key:    fs.readFileSync('/etc/nginx/ssl/allaroundpolitics.com/268688/server.key'),
    cert:   fs.readFileSync('/etc/nginx/ssl/allaroundpolitics.com/268688/server.crt')
};
var app = require('https').createServer(options);
var io = require('socket.io')(app);

var Redis = require('ioredis');
var redis = new Redis();
app.listen(6002, function() {
    console.log('Server is running!');
});

function handler(req, res) {
    res.writeHead(200);
    res.end('Test');
}

io.on('connection', function(socket) {
    //
    console.log('New Connection');
    socket.on('disconnect',function(){
      console.log('User disconnected');
    });


});
redis.psubscribe('*', function(err, count) {
    //
});

redis.on('pmessage', function(subscribed, channel, message) {
    console.log(channel);
    message = JSON.parse(message);
    console.log(message);
    io.emit(channel , message);


});
