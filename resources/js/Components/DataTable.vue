<script>
import Button from '@/Components/Button.vue';
import {Link} from '@inertiajs/inertia-vue3';

export default {
	components: {
		Button,
		Link
	},
	props: {
		resources: {
			default() {
				return []
			}
		},
		columns: {
			type: Array,
			default() {
				return []
			}
		},
	},
	created() {
	},
	methods: {
		handleDelete(deleteUrl) {
			this.$inertia.delete(deleteUrl)
		}
	}
}
</script>

<template>
	<div class="overflow-x-auto relative">
		<table v-if="resources?.data" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
			<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
			<tr>
				<th v-for="column in columns" :key="`columns-${column.name}`" class="py-3 px-6" scope="col">
					{{ column.name }}
				</th>
			</tr>
			</thead>
			<tbody>
			<tr v-for="resource in resources.data" :key="resource.id"
				class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
				<td v-for="column in columns" :key="`cell-${resource.id}-${column.name}`"
					:class="column.class + ' py-4 px-6'">
					<slot v-if="column.attribute === 'actions'" name="cell"
						  v-bind="{ column, resource }">
						<Link v-if="resource[column.attribute].edit" :href="resource[column.attribute].edit">
							<button
								class="inline-flex items-center px-1 py-1 mx-1 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
								<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
									 xmlns="http://www.w3.org/2000/svg">
									<path
										d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
										stroke-linecap="round" stroke-linejoin="round"
										stroke-width="2"></path>
								</svg>
							</button>
						</Link>
						<span v-if="resource[column.attribute].destroy"
							  method="delete"
							  @click="handleDelete(resource[column.attribute].destroy)">
							<button
								class="inline-flex items-center px-1 py-1 mx-1 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
								<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
									 xmlns="http://www.w3.org/2000/svg">
									<path
										d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
										stroke-linecap="round" stroke-linejoin="round"
										stroke-width="2"></path>
								</svg>
							</button>
						</span>
					</slot>
					<slot v-else name="cell" v-bind="{ column, resource }">
						{{ resource[column.attribute] }}
					</slot>
				</td>
			</tr>
			</tbody>
		</table>
	</div>
	<div v-if="resources.links" class="mt-5 text-right">
		<Link v-if="resources.links.prev" :href="resources.links.prev">
			<Button class="mx-2">
				Previous
			</Button>
		</Link>

		<Link v-if="resources.links.next" :href="resources.links.next">
			<Button class="mx-2">
				Next
			</Button>
		</Link>
	</div>
</template>
