require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router';

import BookingChannelIndex from './components/booking_channel/BookingChannelIndex.vue';
import CompanyIndex from './components/company/CompanyIndex.vue';
import CountTypeIndex from './components/count_type/CountTypeIndex.vue';
import InventoryTypeCodeIndex from './components/inventory_type_code/InventoryTypeCodeIndex.vue';

createApp({
    data() {
        return { open: false}
    },
    components: {
        BookingChannelIndex,
        CompanyIndex,
        CountTypeIndex,
        InventoryTypeCodeIndex
    }
}).use(router).mount('#app')

