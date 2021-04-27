<x-template-layout>
    <h1 class="font-semibold text-xl bg-black text-white" style="text-align: center;">
        {{$title}}
    </h1>
    <div class="shadow px-6 py-4 bg-black text-white rounded sm:px-1 sm:py-1 sm:bg-gray-100">
      <div class="container bg-white text-black" style="text-align: center">
        <div class="row">
          <div class="col-sm-4">
            <h3><img src="realmadrid.png" class="mx-auto d-block"></h3>
            <p>Real Madrid</p>
            <p><a href="{{route('player.index')}}"><button class="px-4 py-1 text-sm rounded text-green-600 font-semibold border border-green-200 hover:text-white hover:bg-green-600 hover:border-transparent focus:outline-none">Details</button></a></p>
          </div>
          <div class="col-sm-4">
            <h3><img src="fcbarcelona.png" class="mx-auto d-block"></h3>
            <p>FC Barcelona</p>
            <p><a href="{{route('barca.index')}}"><button class="px-4 py-1 text-sm rounded text-green-600 font-semibold border border-green-200 hover:text-white hover:bg-green-600 hover:border-transparent focus:outline-none">Details</button></a></p>
          </div>
          <div class="col-sm-4">
            <h3><img src="Atleticodemadrid.png" class="mx-auto d-block"></h3>
            <p>Atletico Madrid</p>
            <p><a href="{{route('atm.index')}}"><button class="px-4 py-1 text-sm rounded text-green-600 font-semibold border border-green-200 hover:text-white hover:bg-green-600 hover:border-transparent focus:outline-none">Details</button></a></p>
          </div>
        </div>
      </div>
    </div>
</x-template-layout>
