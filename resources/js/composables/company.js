import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useCompany() {

    const companies = ref([]) // This is for the list
    const company = ref([]) // This is to load the data for the update form

    const router = useRouter() // This is for the store and update
    const errors = ref('') // This is for the store and update

    // This is to get the list
    const getCompanies = async () => {
        let response = await axios.get('/api/company')
        companies.value = response.data.data;
    }

    // This is to store the data
    const storeCompany = async (data) => {
        // Initiate the errors
        errors.value = '';
        try{
            await axios.post('/api/company', data)
            await router.push({name: 'company.index'})
        } catch (e) {
            if(e.response.status === 422) {
                for(const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    // This is to load the data for the update form
    const getCompany = async (id) => {
        let response = await axios.get('/api/company/' + id)
        company.value = response.data.data;
    }

    // This is to update and save the data
    const updateCompany = async (id) => {
        // Initiate the errors
        errors.value = '';
        try{
            await axios.put('/api/company/' + id, company.value)
            await router.push({name: 'company.index'})
        } catch (e) {
            if(e.response.status === 422) {
                for(const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    // This will delete the data
    const deleteCompany = async (id) => {
        await axios.delete('/api/company/' + id)
    }

    return {
        companies, // This is for the list
        getCompanies, // This is for the list

        errors,

        company, // This is to load the data for the update form
        getCompany, // This is to load the data for the update form
        updateCompany, // This is to update and save the data

        storeCompany, // This is for the store/add
        deleteCompany // This for the delete
    }

}