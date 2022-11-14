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
		:type="type"
		class="inline-flex items-center px-1 py-1 mx-1 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-800 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-red transition ease-in-out duration-150">
		<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
			 xmlns="http://www.w3.org/2000/svg">
			<path
				d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
				stroke-linecap="round" stroke-linejoin="round"
				stroke-width="2"></path>
		</svg>
		<slot/>
	</button>
</template>
