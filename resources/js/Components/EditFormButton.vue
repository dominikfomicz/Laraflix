<script setup>
defineProps({
	type: {
		type: String,
		default: 'button',
	},
});
</script>

<template>
	<button
		class="inline-flex items-center px-1 py-1 mx-1 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-800 active:bg-blue-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-blue transition ease-in-out duration-150">
		<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
			 xmlns="http://www.w3.org/2000/svg">
			<path
				d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"
				stroke-linecap="round" stroke-linejoin="round"
				stroke-width="2"></path>
		</svg>
		<slot/>
	</button>
</template>
