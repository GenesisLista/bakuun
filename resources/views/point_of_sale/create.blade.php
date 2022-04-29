<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Point Of Sale
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <div class="flex place-content-end mb-4">
            <div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer">
            <a href="{{ route('pos.index') }}"> Back </a>
        </div>
    </div>

    <form class="space-y-6" action="{{ route('pos.store') }}" method="POST" enctype="multipart/form-data" autocomplete="false">
        {{ csrf_field() }}
        <div class="space-y-4">
            <div>
                <div class="w-1/3">
                    <label for="bchannel" class="block text-sm font-medium text-gray-700">Booking Channel</label>
                    <div class="relative flex w-full">
                        <select name="bchannel" id="bchannel" class="block w-full py-3 pl-4 pr-8 bg-white border border-gray-300 rounded-sm appearance-none cursor-pointer focus:outline-none hover:border-gray-400">
                        <option value="">Select Booking Channel</option>
                        @foreach($booking_channel as $bchannel)
                        <option value="{{ $bchannel->id }}">{{ $bchannel->name }}</option>
                        @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-blue-400 pointer-events-none">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                        </div>
                    </div>
                    @if($errors->has('bchannel'))
                        <span class="text-danger">{{ $errors->first('bchannel') }}</span>
                    @endif
                </div>
            </div>

            <div>
                <div class="w-1/3">
                    <label for="cname" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <div class="relative flex w-full">
                        <select name="cname" id="cname" class="block w-full py-3 pl-4 pr-8 bg-white border border-gray-300 rounded-sm appearance-none cursor-pointer focus:outline-none hover:border-gray-400">
                        <option value="">Select Booking Channel</option>
                        @foreach($company_name as $cname)
                        <option value="{{ $cname->id }}">{{ $cname->name }}</option>
                        @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-blue-400 pointer-events-none">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                        </div>
                    </div>
                    @if($errors->has('cname'))
                        <span class="text-danger">{{ $errors->first('cname') }}</span>
                    @endif
                </div>
            </div>
            
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Create
        </button>
    </form>
</x-app-layout>
