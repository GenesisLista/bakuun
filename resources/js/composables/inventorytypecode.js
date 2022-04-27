import { ref } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

export default function useInventoryTypeCode() {
    
    const inventoryTypeCodes = ref([]) // This is for the list
    const inventoryTypeCode = ref([]) // This is to load the data for the update form

    const router = useRouter() // This is for the store and update
    const errors = ref('') // This is for the store and update

    // This is to get the list
    const getInventoryTypeCodes = async () => {
        let response = await axios.get('/api/inventory-type-code')
        inventoryTypeCodes.value = response.data.data;
    }

    // This is to store the data
    const storeInventoryTypeCode = async (data) => {
        // Initiate the errors
        errors.value = '';
        try{
            await axios.post('/api/inventory-type-code', data)
            await router.push({name: 'inventorytypecode.index'})
        } catch (e) {
            if(e.response.status === 422) {
                for(const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    // This is to load the data for the update form
    const getInventoryTypeCode = async (id) => {
        let response = await axios.get('/api/inventory-type-code/' + id)
        inventoryTypeCode.value = response.data.data;
    }

    // This is to update and save the data
    const updateInventoryTypeCode = async (id) => {
        // Initiate the errors
        errors.value = '';
        try{
            await axios.put('/api/inventory-type-code/' + id, inventoryTypeCode.value)
            await router.push({name: 'inventorytypecode.index'})
        } catch (e) {
            if(e.response.status === 422) {
                for(const key in e.response.data.errors) {
                    errors.value += e.response.data.errors[key][0] + ' ';
                }
            }
        }
    }

    // This will delete the data
    const deleteInventoryTypeCode = async (id) => {
        await axios.delete('/api/inventory-type-code/' + id);
    }

    return {
        inventoryTypeCodes, // This is for the list
        getInventoryTypeCodes, // This is for the list

        errors,

        inventoryTypeCode, // This is to load the data for the update form
        getInventoryTypeCode, // This is to load the data for the update form
        updateInventoryTypeCode, // This is to update and save the data

        storeInventoryTypeCode, // This is for the store/add
        deleteInventoryTypeCode // This is for the delete
    }

}