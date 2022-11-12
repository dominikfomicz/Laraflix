<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DataTable from '@/Components/DataTable.vue';
import AddButton from '@/Components/AddButton.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';

export default {
	props: {
		movies: {
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
				{name: 'Title', attribute: 'title'},
				{name: 'Created at', attribute: 'created_at'},
			]
		}
	},
	mounted() {
	}
}
</script>

<template>
	<Head title="Movies"/>

	<AuthenticatedLayout>
		<template #header>
			<div class="grid grid-cols-2">
				<div>
					<h5 class="font-semibold text-2xl text-gray-800 leading-tight">
						Movies
					</h5>
				</div>
				<div class="text-end">
					<Link :href="route('movies.create')">
						<AddButton/>
					</Link>
				</div>
			</div>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						<DataTable :columns="columns" :resources="movies"/>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
