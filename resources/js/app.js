require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import router from './router';

import BookingChannelIndex from './components/booking_channel/BookingChannelIndex.vue';

createApp({
    data() {
        return { open: false}
    },
    components: {
        BookingChannelIndex
    }
}).use(router).mount('#app')

