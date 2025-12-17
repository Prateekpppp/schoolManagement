<script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('sportsupdate');
    channel.bind('sportsupdate-event', function(data) {
      @yield('pusherFunction')
      
    });

  </script>

  