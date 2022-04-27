import { createRouter, createWebHistory } from "vue-router";

// Booking Channel
import BookingChannelIndex from '../components/booking_channel/BookingChannelIndex.vue'
import BookingChannelCreate from '../components/booking_channel/BookingChannelCreate.vue'
import BookingChannelEdit from '../components/booking_channel/BookingChannelEdit.vue'

// Company
import CompanyIndex from '../components/company/CompanyIndex.vue'
import CompanyCreate from '../components/company/CompanyCreate.vue'
import CompanyEdit from '../components/company/CompanyEdit.vue'

const routes = [
    // Booking Channel
    {
        path: '/booking-channel',
        name: 'bookingchannel.index',
        component: BookingChannelIndex
    },
    {
        path: '/booking-channel/create',
        name: 'bookingchannel.create',
        component: BookingChannelCreate
    },
    {
        path: '/booking-channel/:id/edit',
        name: 'bookingchannel.edit',
        component: BookingChannelEdit,
        props: true
    },

    // Company
    {
        path: '/company',
        name: 'company.index',
        component: CompanyIndex
    },
    {
        path: '/company/create',
        name: 'company.create',
        component: CompanyCreate
    },
    {
        path: '/company/:id/edit',
        name: 'company.edit',
        component: CompanyEdit,
        props: true
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})