require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router';

import BookingChannelIndex from './components/booking_channel/BookingChannelIndex.vue';
import CompanyIndex from './components/company/CompanyIndex.vue';

createApp({
    data() {
        return { open: false}
    },
    components: {
        BookingChannelIndex,
        CompanyIndex
    }
}).use(router).mount('#app')

