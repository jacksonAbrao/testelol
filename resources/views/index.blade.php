@extends("layouts.main")

@section("title", "Telzir")

@section("content")

{{-- script typewriter --}}


<script type="text/javascript">
    $(document).ready(function() {
        //Checks if element with id typing exists
        if($('#typing').length) {
            var div = document.getElementById('typing');
            var texts = @json($nomePlanos);


            function write(str, done) {
                var char = str.split('').reverse();
                var typer = setInterval(function() {
                    if (!char.length) {
                        clearInterval(typer);
                        return setTimeout(done, 500); //just to wait a little

                    }
                    var next = char.pop();
                    div.innerHTML += next;
                }, 100);
            }

            function clean(done) {
                var char = div.innerHTML;
                var nr = char.length;
                var typer = setInterval(function() {
                    if (nr-- == 0) {
                        clearInterval(typer);
                        return done();
                    }
                    div.innerHTML = char.slice(0, nr);
                }, 50);
            }

            function foot(contents, el) {
                var current = -1;
                function next(cb){
                    if (current < contents.length - 1) current++;
                    else current = 0;
                    var str = contents[current];
                    write(str, function(){
                        clean(next);
                    });
                }
                next(next);
            }
            foot(texts);
        }
    });
</script>


<body id="body">
    <div class="filter">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 text d-flex flex-column align-items-center">
                    <h1 class="title">Confira nossos planos</h1>
                    <h1 id="typewriter" class="text-center">
                        <div id="typing"></div>
                        <div class="blink">|</div>
                    </h1>
                        <a href="/chamadas" class="btn button btn-dark">Calcular Chamada</a>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
