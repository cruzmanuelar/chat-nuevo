<div>
    <h5>2do componente</h5>

    @foreach ($mensajes as $mensaje)
        <li>{{ $mensaje["usuario"] }} - {{ $mensaje["mensaje"] }} </li>
    @endforeach

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('0662ee87a4d83651e9ae', {
          cluster: 'us2'
        });
    
        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
          //alert(JSON.stringify(data));
          window.livewire.emit('mensajeRecibido',data)
        });
      </script>
</div>
