<x-template-layout>
    <h1 class="font-semibold text-xl bg-black text-white" style="text-align: center">
        <img src="Atleticodemadrid.png " width="50px" class="mx-auto d-block">{{$title}}
    </h1>
    <div class="shadow px-6 py-4 bg-black text-white rounded sm:px-1 sm:py-1 sm:bg-gray-100">
        <div class="grid grid-cols-12">
            <div class="col-span-6 p-4 bg-white">
                <a href="{{route('atm.create')}}"><button class="px-4 py-1 text-sm rounded text-green-600 font-semibold border border-green-200 hover:text-white hover:bg-green-600 hover:border-transparent focus:outline-none">Add</button></a>
            </div>
            <form class="col-span-6 p-4 flex justify-end bg-white" method="GET" action="/atm">
                <input name="search" type="search" placeholder="Search..." class="px-4 py-2 focus:ring-purple-500 focus:border-purple-500 rounded-none rounded-1-md sm:text-sm border-gray-300 bg-white text-black">
                <button class=" justify-end rounded-r-md border border-1-0 px-4 py-1 border-gray-300 bg-gray-50 text-black-500 text-purple-600 hover:text-white hover:bg-purple-600">Search</button>
            </form>
        </div>
                <div class="bg-white overflow-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white text-black" style="text-align: center">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Nationality</th>
                        <th>Team</th>
                        <th>Position</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white text-black divide-y divide-gray-200" style="text-align: center">
                    <?php $no=1;?>
                    @foreach ($atm as $item )
                        <tr>
                            <td>{{$no}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->nationality}}</td>
                            <td>{{$item->team}}</td>
                            <td>{{$item->position}}</td>
                            <td>{{$item->age}}</td>
                            <td><a href="{{route('atm.edit',$item->id)}}"><button class="px-4 py-1 text-sm rounded text-blue-600 font-semibold border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none">Edit</button></a></a>
                            <form action="{{route('atm.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="px-4 py-1 text-sm rounded text-red-600 font-semibold border border-red-200 hover:text-white hover:bg-red-600 hover:border-transparent focus:outline-none">Delete</button>
                            </form>
                            </td>
                        </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

</x-template-layout>
