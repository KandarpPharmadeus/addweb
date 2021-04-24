<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('students.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
                    
                   
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                        </span>
                    </div>
                    @endif
                    @if(isset($studentDetails))
                        {!! Form::model($studentDetails, ['method' => 'put','class'=>'nqform mt-xs-30', 'id'=>'studentForm', 'name' => 'studentForm', 'files' => true, 'route' => ['students.update', $studentDetails->id]]) !!}
                    @else
                        {!! Form::open(['route' => 'students.store','class'=>'nqform mt-xs-30', 'id'=>'studentForm', 'name' => 'studentForm', 'files' => true]) !!}
                    @endif
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="studentName">
                                Student Name
                            </label>
                            {!! Form::text('studentName', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'studentName', 'placeHolder' => 'Student Name']) !!}
                            <span class="text-red-500">
                                {{ $errors->first('studentName') }}       
                            </span>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                Grade
                            </label>
                            <div class="relative">
                                {!! Form::select('grade', isset($grade) ? $grade : null, null, ['class' => 'block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500', 'id' => 'grid-state']) !!}
                            </div>
                            <span class="text-red-500">
                                {{ $errors->first('grade') }}       
                            </span>
                        </div>


                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">
                                Photo
                            </label>
                            {!! Form::file('photo', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'photo']) !!}
                            <span class="text-red-500">
                                {{ $errors->first('photo') }}       
                            </span>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="dateOfBirth">
                                Date of birth
                            </label>
                            {!! Form::date('dateOfBirth', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'dateOfBirth', 'placeHolder' => 'Date of birth']) !!}
                            <span class="text-red-500">
                                {{ $errors->first('dateOfBirth') }}       
                            </span>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                Address
                            </label>
                            {!! Form::textarea('address', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'address', 'placeHolder' => 'Address', 'rows' => 3]) !!}
                            <span class="text-red-500">
                                {{ $errors->first('address') }}       
                            </span>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                                City
                            </label>
                            {!! Form::text('city', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'city', 'placeHolder' => 'City']) !!}
                            <span class="text-red-500">
                                {{ $errors->first('city') }}       
                            </span>
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                                Country
                            </label>
                            {!! Form::text('country', null, ['class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline', 'id' => 'country', 'placeHolder' => 'Country']) !!}
                            <span class="text-red-500">
                                {{ $errors->first('country') }}       
                            </span>
                        </div>
                        <div class="mb-6">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Save
                            </button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
