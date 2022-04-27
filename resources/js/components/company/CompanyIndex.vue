<template>
<div class="flex place-content-end mb-4">
	<div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 cursor-pointer">
	<router-link :to="{ name: 'company.create' }" class="text-sm font-medium">Create Booking Channel</router-link>
	</div>
</div>

<div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
	<table class="min-w-full border divide-y divide-gray-200">
		<thead>
			<tr>
				<th class="px-6 py-3 bg-gray-50">
					<span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Name</span>
				</th>
				<th class="px-6 py-3 bg-gray-50">
					<span class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Action</span>
				</th>
			</tr>
		</thead>

		<tbody class="bg-white divide-y divide-gray-200 divide-solid">
			<template v-for="cmpy in companies" :key="cmpy.id">
				<tr class="bg-white">
					<td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
						{{ cmpy.name }}
					</td>
					<td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
						<router-link :to="{ name: 'company.edit', params: { id: cmpy.id } }" class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Edit</router-link>
						<button @click="destroyCompany(cmpy.id)"  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Delete</button>
					</td>
				</tr>
			</template>
		</tbody>
	</table>
</div>
</template>

<script>
import useCompany from '../../composables/company';
import { onMounted } from 'vue';

export default {
	setup() {

		const { companies, getCompanies, deleteCompany } = useCompany();

		const destroyCompany = async (id) => {
			if(!window.confirm('Are you sure?')){
                return
            }

            await deleteCompany(id) // Function from composables
            await getCompanies() // This will refresh the page
		}

		onMounted(getCompanies);
	
		return {
			companies,
			destroyCompany
		}
	}
}
</script>