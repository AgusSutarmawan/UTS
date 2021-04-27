<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
        <link rel="icon" type="image/png" href="laligaaa.png">
        <link rel="shortcut icon" type="image/png" href="laligaaa.png">
        <title>Insert Team</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url(bg2.jpg);
                background-repeat: no-repeat;
                height: 100%;
                background-size: cover;
                align-items: center;
                background: #1f262e;

            }
            .form{
                width: 50%;
                position: center;
                align-items: center;
                margin: 1px auto;
            }
            .container{
                align-items: center;

            }
            .jumbotron{
                background: #1f262e;
            }
        </style>
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="text-white" style="text-align: center; margin:20px;">
            <h1>INSERT TEAM</h1>

          </div>
        <div class="container text-black">
            <div class="row">
              <div class="col-sm-12">
                <div class="form">
                    <form action="{{(isset($atm))?route('atm.update', $atm->id):route('atm.store')}}" method="POST" enctype="multipart/form-data ">
                        @csrf
                        @if (isset($atm))
                            @method('PUT')
                        @endif
                        <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6" >
                            <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-12">
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" name="name" id="name" autocomplete="name" value="{{(isset($atm))?$atm->name:old('name')}}" class="@error('name') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <div class="text-xs text-red-600">@error('name') {{$message}} @enderror</div>
                            </div>

                            <div class="col-span-6 sm:col-span-12">
                                <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                                <input type="text" name="nationality" id="nationality" autocomplete="nationality" value="{{(isset($atm))?$atm->nationality:old('nationality')}}" class="@error('nationality') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <div class="text-xs text-red-600">@error('nationality') {{$message}} @enderror</div>
                            </div>
                            <div class="col-span-6 sm:col-span-12">
                                <label for="team" class="block text-sm font-medium text-gray-700">Team</label>
                                <select name="team" type="text" autocomplete="team" value="{{(isset($atm))?$atm->position:old('position')}}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                                    <option value="">- Choose -</option>
                                    @foreach ($team as $item )
                                        <option value="{{$item->team}}">{{$item->team}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-span-6 sm:col-span-12">
                                <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                                <input type="text" name="position" autocomplete="position" value="{{(isset($atm))?$atm->position:old('position')}}" class="@error('position') border-red-500 @enderror mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <div class="text-xs text-red-600">@error('position') {{$message}} @enderror</div>
                            </div>

                            <div class="col-span-12">
                                <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                                <input type="text" name="age" id="age" autocomplete="age" value="{{(isset($atm))?$atm->age:old('age')}}" class="@error('age') border-red-500 @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <div class="text-xs text-red-600">@error('age') {{$message}} @enderror</div>
                            </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                            </button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>





    </div>
    </main>
    </main>
    </body>
</html>
