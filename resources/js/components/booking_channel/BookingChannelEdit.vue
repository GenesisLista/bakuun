<template>
	<div class="flex place-content-end mb-4">
		<div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer">
		<router-link :to="{ name: 'bookingchannel.index' }" class="text-sm font-medium">Back</router-link>
		</div>
	</div>

	<div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
		{{ errors }}
	</div>

	<form class="space-y-6" @submit.prevent="saveBookingChannel">
		<div class="space-y-4 rounded-md shadow-sm">
			<div>
				<label for="name" class="block text-sm font-medium text-gray-700">Name</label>
				<div class="mt-1">
					<input type="text" name="name" id="name"
							class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  v-model="bookingChannel.name">
				</div>
			</div>
		</div>

		<button type="submit"
				class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
			Update
		</button>
	</form>
</template>

<script>
import useBookingChannel from '../../composables/bookingchannel';
import { onMounted } from 'vue';

export default {
	props: {
        id: {
            required: true,
            type: String
        }
    },
	setup(props) {
		const { errors, bookingChannel, getBookingChannel, updateBookingChannel } = useBookingChannel()

		onMounted(() => getBookingChannel(props.id))

		const saveBookingChannel = async () => {
            await updateBookingChannel(props.id)
        }
	
		return {
			errors,
			bookingChannel,
			saveBookingChannel
		}
	}
}
</script>