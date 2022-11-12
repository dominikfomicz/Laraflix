<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DataTable from '@/Components/DataTable.vue';
import {Head} from '@inertiajs/inertia-vue3';

export default {
	props: {
		roles: {
			default() {
				return {}
			}
		},
	},
	components: {
		AuthenticatedLayout,
		DataTable,
		Head
	},
	setup() {
		return {
			columns: [
				{name: 'Name', attribute: 'name'},
				{name: 'Created at', attribute: 'created_at'},
			]
		}
	},
	mounted() {
	}
}
</script>

<template>
	<Head title="Roles"/>

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Roles
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						<DataTable :columns="columns" :resources="roles"/>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
