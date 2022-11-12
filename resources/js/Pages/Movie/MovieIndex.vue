<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DataTable from '@/Components/DataTable.vue';
import { Head } from '@inertiajs/inertia-vue3';

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
		Head
	},
	setup() {
		return {
			columns: [
				{ name: 'Title', attribute: 'title'},
				{ name: 'Created at', attribute: 'created_at'},
			]
		}
	},
	mounted(){
		console.log(this.movies)
	}
}
</script>

<template>
    <Head title="Movies" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Movies
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
						<DataTable :resources="movies" :columns="columns" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
