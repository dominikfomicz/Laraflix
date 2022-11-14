<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DataTable from '@/Components/DataTable.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';
import AddButton from "@/Components/AddButton.vue";

export default {
	props: {
		persons: {
			default() {
				return {}
			}
		},
	},
	components: {
		AuthenticatedLayout,
		DataTable,
		AddButton,
		Head,
		Link
	},
	setup() {
		return {
			columns: [
				{name: 'Name', attribute: 'name'},
				{name: 'Created at', attribute: 'created_at'},
				{name: '', attribute: 'actions', class: 'text-right'},
			]
		}
	},
	mounted() {
	}
}
</script>

<template>
	<Head title="Persons"/>

	<AuthenticatedLayout>
		<template #header>
			<div class="grid grid-cols-2">
				<div>
					<h5 class="font-semibold text-2xl text-gray-800 leading-tight">
						Persons
					</h5>
				</div>
				<div class="text-end">
					<Link :href="route('persons.create')">
						<AddButton/>
					</Link>
				</div>
			</div>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						<DataTable :columns="columns" :resources="persons"/>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
