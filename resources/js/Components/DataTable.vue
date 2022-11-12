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
				<td v-for="column in columns" :key="`cell-${resource.id}-${column.name}`" class="py-4 px-6">
					<slot name="cell" v-bind="{ column, resource }">
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
