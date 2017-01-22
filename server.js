
var fs =  require('fs');

var options = {
    key:    fs.readFileSync('/etc/nginx/ssl/treatmeathome.online/105701/server.key  '),
    cert:   fs.readFileSync('/etc/nginx/ssl/treatmeathome.online/105701/server.crt')
};
var app = require('https').createServer(options);
var io = require('socket.io')(app);

var Redis = require('ioredis');
var redis = new Redis();
var Twit = require('twit')

var T = new Twit({
  consumer_key:         'NlzLlC6zR3M1YWwRtWwMPPv2K',
  consumer_secret:      '6te2KH5Z1uIz67gIFagwS5gF1ereKTjnh4TjnvgWUSJUjE5UnC',
  access_token:         '823011972203614208-WWafgNj2feuYScxnSxW4FvNwSUMg6Vi',
  access_token_secret:  'aFYxudxIyRMLb88yFtWRaMfTbaMEpu3UCd02ozufypBmT',
  timeout_ms:           60*1000,  // optional HTTP request timeout to apply to all requests.
})

app.listen(6001, function() {
    console.log('Server is running!');
});

function handler(req, res) {
    res.writeHead(200);
    res.end('Test');
}

io.on('connection', function(socket) {
    //



});
redis.psubscribe('*', function(err, count) {
    //
});

redis.on('pmessage', function(subscribed, channel, message) {

    message = JSON.parse(message);
    console.log(message);
    io.emit(channel , message);


});
