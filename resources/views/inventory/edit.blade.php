<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inventory
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                
                <div class="flex place-content-end mb-4">
            <div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer">
            <a href="{{ route('inventory.index') }}"> Back </a>
        </div>
    </div>

    <form class="space-y-6" action="{{ route('inventory.update', $inventory->id) }}" method="POST" enctype="multipart/form-data" autocomplete="false">
        @method('PUT')
        {{ csrf_field() }}
        <div class="space-y-4">

            <div>
                <div class="w-1/3">
                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                    <div class="relative flex w-full">
                        <select name="company" id="company" class="block w-full py-3 pl-4 pr-8 bg-white border border-gray-300 rounded-sm appearance-none cursor-pointer focus:outline-none hover:border-gray-400">
                        <option value="">Select Company</option>
                        @foreach($company as $comp)
                        <option value="{{ $comp->id }}" {{ $comp->id == $inventory->company_id ? 'selected' : ''}}>{{ $comp->name }}</option>
                        @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-blue-400 pointer-events-none">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                        </div>
                    </div>
                    @if($errors->has('company'))
                        <span class="text-danger">{{ $errors->first('company') }}</span>
                    @endif
                </div>
            </div>

            <div>
                <div class="w-1/3">
                    <label for="itcode" class="block text-sm font-medium text-gray-700">Inventory Type Code</label>
                    <div class="relative flex w-full">
                        <select name="itcode" id="itcode" class="block w-full py-3 pl-4 pr-8 bg-white border border-gray-300 rounded-sm appearance-none cursor-pointer focus:outline-none hover:border-gray-400">
                        <option value="">Select Inventory Type Code</option>
                        @foreach($inventory_type_code as $itcode)
                        <option value="{{ $itcode->id }}" {{ $itcode->id == $inventory->inventory_type_code_id ? 'selected' : ''}}>{{ $itcode->name }}</option>
                        @endforeach
                        </select>
                        <input type="hidden" id="itcode_id" value="{{ $inventory->inventory_type_code_id }}"/>
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
                <div class="w-1/3">
                    <label for="rpcode" class="block text-sm font-medium text-gray-700">Rate Plan Code</label>
                    <div class="relative flex w-full">
                        <select name="rpcode" id="rpcode" class="block w-full py-3 pl-4 pr-8 bg-white border border-gray-300 rounded-sm appearance-none cursor-pointer focus:outline-none hover:border-gray-400">
                        <option value="">Select Rate Plan Code</option>
                        </select>
                        <input type="hidden" id="rpcode_id" value="{{ $inventory->rate_plan_code_id }}"/>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-blue-400 pointer-events-none">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                        </div>
                    </div>
                    @if($errors->has('rpcode'))
                        <span class="text-danger">{{ $errors->first('rpcode') }}</span>
                    @endif
                </div>
            </div>

            <div>
                <div class="w-1/3">
                    <label for="ctype" class="block text-sm font-medium text-gray-700">Count Type</label>
                    <div class="relative flex w-full">
                        <select name="ctype" id="ctype" class="block w-full py-3 pl-4 pr-8 bg-white border border-gray-300 rounded-sm appearance-none cursor-pointer focus:outline-none hover:border-gray-400">
                        <option value="">Select Count Type</option>
                        @foreach($count_type as $ctype)
                        <option value="{{ $ctype->id }}" {{ $ctype->id == $inventory->count_type_id ? 'selected' : ''}}>{{ $ctype->name }}</option>
                        @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 text-blue-400 pointer-events-none">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                        </div>
                    </div>
                    @if($errors->has('ctype'))
                        <span class="text-danger">{{ $errors->first('ctype') }}</span>
                    @endif
                </div>
            </div>

            <div>
                <label for="count" class="block text-sm font-medium text-gray-700">Count</label>
                <div class="mt-1">
                    <input type="text" name="count" id="count"
                            class="block mt-1 w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $inventory->count }}">
                </div>
                @if($errors->has('count'))
                    <span class="text-danger">{{ $errors->first('count') }}</span>
                @endif
            </div>

            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                <div class="mt-1">
                    <input type="text" name="start_date" id="start_date"
                            class="block mt-1 w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $inventory->start_date }}">
                </div>
                @if($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
            </div>

            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                <div class="mt-1">
                    <input type="text" name="end_date" id="end_date"
                            class="block mt-1 w-1/2 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $inventory->end_date }}">
                </div>
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
            </div>
            
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Update
        </button>
    </form>
</x-app-layout>

<script>
    jQuery(document).ready(function() {

        // On load display all the Rate Plan Code under the Inventory Type Code
        // Select the Rate Plan Code
        var itcode_id = $('#itcode_id').val();
        var rpcode_id = $('#rpcode_id').val();
        $.ajax({
            url: "{{ route('inventory.rate-plan-code-list') }}",
            headers: {'X-CSRF-TOKEN': $('[name="_token"]').val()},
            type: 'POST',
            data: {'itcode_id': itcode_id},
            success: function(result) {
                
                if(result.length) {
                    $('#rpcode').empty();
                    $('#rpcode').append('<option value="">Select Rate Plan Code</option>');
                    jQuery.each(result, function(index, itemData) {
                        if(itemData['id'] == rpcode_id){
                            var item_selected = 'selected';
                        }else {
                            var item_selected = '';
                        }
                        $('#rpcode').append('<option value="'+itemData['id']+'" '+item_selected+'>'+itemData["rate_plan_code"]+'</option>');
                    });
                }else {
                    $('#rpcode').empty();
                }

            }
        });
        
        // On change of the Inventory Code
        // Display the list
        $('#itcode').on('change', function () {
            var itcode_id = $(this).val();
            var rpcode_id = $('#rpcode_id').val();
            $.ajax({
                url: "{{ route('inventory.rate-plan-code-list') }}",
                headers: {'X-CSRF-TOKEN': $('[name="_token"]').val()},
                type: 'POST',
                data: {'itcode_id': itcode_id},
                success: function(result) {
                    
                    if(result.length) {
                        $('#rpcode').empty();
                        $('#rpcode').append('<option value="">Select Rate Plan Code</option>');
                        jQuery.each(result, function(index, itemData) {
                            if(itemData['id'] == rpcode_id){
                                var item_selected = 'selected';
                            }else {
                                var item_selected = '';
                            }
                            $('#rpcode').append('<option value="'+itemData['id']+'" '+item_selected+'>'+itemData["rate_plan_code"]+'</option>');
                        });
                    }else {
                        $('#rpcode').empty();
                        $('#rpcode').append('<option value="">Select Rate Plan Code</option>');
                    }

                }
            });

        });
        
    });
</script>
