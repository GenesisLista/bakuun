import { createRouter, createWebHistory } from "vue-router";

// Booking Channel
import BookingChannelIndex from '../components/booking_channel/BookingChannelIndex.vue'
import BookingChannelCreate from '../components/booking_channel/BookingChannelCreate.vue'
import BookingChannelEdit from '../components/booking_channel/BookingChannelEdit.vue'

// Company
import CompanyIndex from '../components/company/CompanyIndex.vue'
import CompanyCreate from '../components/company/CompanyCreate.vue'
import CompanyEdit from '../components/company/CompanyEdit.vue'

// Count Type
import CountTypeIndex from '../components/count_type/CountTypeIndex.vue'
import CountTypeCreate from '../components/count_type/CountTypeCreate.vue'
import CountTypeEdit from '../components/count_type/CountTypeEdit.vue'

// Inventory Type Code
import InventoryTypeCodeIndex from '../components/inventory_type_code/InventoryTypeCodeIndex.vue'
import InventoryTypeCodeCreate from '../components/inventory_type_code/InventoryTypeCodeCreate.vue'
import InventoryTypeCodeEdit from '../components/inventory_type_code/InventoryTypeCodeEdit.vue'

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
    },

    // Count Type
    {
        path: '/count-type',
        name: 'counttype.index',
        component: CountTypeIndex
    },
    {
        path: '/count-type/create',
        name: 'counttype.create',
        component: CountTypeCreate
    },
    {
        path: '/count-type/:id/edit',
        name: 'counttype.edit',
        component: CountTypeEdit,
        props: true
    },

    // Inventory Type Code
    {
        path: '/inventory-type-code',
        name: 'inventorytypecode.index',
        component: InventoryTypeCodeIndex
    },
    {
        path: '/inventory-type-code/create',
        name: 'inventorytypecode.create',
        component: InventoryTypeCodeCreate
    },
    {
        path: '/inventory-type-code/:id/edit',
        name: 'inventorytypecode.edit',
        component: InventoryTypeCodeEdit,
        props: true
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})