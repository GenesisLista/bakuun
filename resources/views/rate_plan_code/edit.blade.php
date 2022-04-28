<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rate Plan Code
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <div class="flex place-content-end mb-4">
            <div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer">
            <a href="{{ route('rate-plan-code.index') }}"> Back </a>
        </div>
    </div>

    <form class="space-y-6" action="{{ route('rate-plan-code.update', $rate_plan_code->id) }}" method="POST" enctype="multipart/form-data" autocomplete="false">
        @method('PUT')
        {{ csrf_field() }}
        <div class="space-y-4">

            <div>
                <div class="w-1/3">
                    <label for="itcode" class="block text-sm font-medium text-gray-700">Inventory Type Code</label>
                    <div class="relative flex w-full">
                        <select name="itcode" id="itcode" class="block w-full py-3 pl-4 pr-8 bg-white border border-gray-300 rounded-sm appearance-none cursor-pointer focus:outline-none hover:border-gray-400">
                        <option value="">Select Inventory Type <Code></Code></option>
                        @foreach($inventory_type_code as $itcode)
                        <option value="{{ $itcode->id }}" {{ $itcode->id == $rate_plan_code->inventory_type_code_id ? 'selected' : ''}}>{{ $itcode->name }}</option>
                        @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-blue-400 pointer-events-none">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                        </div>
                    </div>
                    @if($errors->has('itcode'))
                        <span class="text-danger">{{ $errors->first('itcode') }}</span>
                    @endif
                </div>
            </div>

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" value="{{ $rate_plan_code->rate_plan_code }}"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Update
        </button>
    </form>
</x-app-layout>