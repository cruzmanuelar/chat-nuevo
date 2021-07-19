<div>
    <div>
        <label for="">Nombre</label>
        <input class="" type="text" wire:model="nombre">
    </div>

    <div>
        <label for="">Mensaje</label>
        <input type="text" wire:model="mensaje">
        @error("mensaje") <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-primary" wire:click="enviarMensaje">Enviar</button>

    <div style="position: absolute;" class="alert alert-sucess collapse" role="alert" id="avisoSuccess">Enviado
    </div>


    <script>




        $( document ).ready(function() {
            window.livewire.on('mensajeEnviado', function () {
                $("#avisoSuccess").fadeIn("slow");                
                setTimeout(function(){ $("#avisoSuccess").fadeOut("slow"); }, 3000);                                
            });
        });
    </script>

</div>