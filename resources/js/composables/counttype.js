import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import { data } from "autoprefixer";

export default function useCountType() {

    const countTypes = ref([]) // This is for the list
    const countType = ref([]) // This is to load the data for th update form

    const router = useRouter() // This is for the store and update
    const errors = ref('') // This is for the store and update

    // This is to get the list
    const getCountTypes = async () => {
        let response = await axios.get('/api/count-type')
        countTypes.value = response.data.data;
    }

    // This is to store the data
    const storeCountType = async (data) => {
        // Initiate the erros
        errors.value = '';
        try{
            await axios.post('/api/count-type', data)
            await router.push({name: 'counttype.index'})
        } catch (e) {
            if(e.response.status === 422) {
                for(const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    // This is to load the data for the update form
    const getCountType = async (id) => {
        let response = await axios.get('/api/count-type/' + id)
        countType.value = response.data.data;
    }

    // This is to update and save the data
    const updateCountType = async (id) => {
        // Initiate the errors
        errors.value = '';
        try{
            await axios.put('/api/count-type/' + id, countType.value)
            await router.push({name: 'counttype.index'})
        } catch (e) {
            if(e.response.status === 422) {
                for(const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    // This will delete the data
    const deleteCountType = async (id) => {
        await axios.delete('/api/count-type/' + id)
    }

    return {
        countTypes, // This is for the list
        getCountTypes, // This is for the list

        errors,

        countType, // This is to load the data for the update form
        getCountType, // This is to load the data for the update form
        updateCountType, // This is to update and save the data

        storeCountType, // This is for the store/add
        deleteCountType // This is for the delete
    }

}