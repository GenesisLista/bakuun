import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useBookingChannel() {

    const bookingChannels = ref([]) // This is for the list
    const bookingChannel = ref([]) // This is to load the data for the update form

    const router = useRouter() // This is use for store and update
    const errors = ref('') // This is use for the store and update

    // This is to get the list
    const getBookingChannels = async () => {
        let response = await axios.get('/api/booking-channel')
        bookingChannels.value = response.data.data;
    }

    // This is to store the data
    const storeBookingChannel = async (data) => {
        // Initiate errors
        errors.value = '';
        try{
            await axios.post('/api/booking-channel', data)
            await router.push({name: 'bookingchannel.index'})
        } catch (e) {
            if(e.response.status === 422) {
                for(const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    // This is to load the data for the update form
    const getBookingChannel = async (id) => {
        let response = await axios.get('/api/booking-channel/' + id)
        bookingChannel.value = response.data.data;
    }

    // This is to update and save the data
    const updateBookingChannel = async (id) => {
        errors.value = ''
        try{
            await axios.put('/api/booking-channel/' + id, bookingChannel.value)
            await router.push({name: 'bookingchannel.index'})
        } catch (e) {
            if(e.response.status === 422) {
                for(const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    // This will delete the data
    const deleteBookingChannel = async (id) => {
        await axios.delete('/api/booking-channel/' + id)
    }

    return {
        bookingChannels, // This is for the list
        getBookingChannels, // This is for the list

        errors, // This is use for the store and update

        bookingChannel, // This is to load the data for the update form
        getBookingChannel, // This is to load the data for the update form
        updateBookingChannel, // This is to update and save the data

        storeBookingChannel, // This is for the store/add
        deleteBookingChannel, // This is for the delete
    }

}