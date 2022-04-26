<template>
<div class="flex place-content-end mb-4">
	<div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer">
	<router-link :to="{ name: 'bookingchannel.create' }" class="text-sm font-medium">Create Booking Channel</router-link>
	</div>
</div>

<div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
	<table class="min-w-full border divide-y divide-gray-200">
		<thead>
		<tr>
			<th class="px-6 py-3 bg-gray-50">
			<span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Name</span>
			</th>
			<th class="px-6 py-3 bg-gray-50">
			<span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Action</span>
			</th>
		</tr>
		</thead>

		<tbody class="bg-white divide-y divide-gray-200 divide-solid">
			<template v-for="bchannel in bookingChannels" :key="bchannel.id">
			<tr class="bg-white">
				<td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
				{{ bchannel.name }}
				</td>
				<td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
				<router-link :to="{ name: 'bookingchannel.edit', params: { id: bchannel.id } }" class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Edit</router-link>
				
				<button @click="destroyBookingChannel(bchannel.id)"  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Delete</button>
				</td>
			</tr>
			</template>
		</tbody>
	</table>
</div>

</template>

<script>
import useBookingChannel from '../../composables/bookingchannel';
import { onMounted } from 'vue';

export default {
	setup() {

		const { bookingChannels, getBookingChannels, deleteBookingChannel } = useBookingChannel();

		const destroyBookingChannel = async (id) => {
			if(!window.confirm('Are you sure?')){
                return
            }

            await deleteBookingChannel(id) // Function from composables
            await getBookingChannels() // This will refresh the page
		}

		onMounted(getBookingChannels);
	
		return {
			bookingChannels,
			destroyBookingChannel
		}
	}
}
</script>