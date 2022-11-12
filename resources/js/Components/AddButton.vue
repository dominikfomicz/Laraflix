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
		class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-small rounded-full text-sm p-1 text-center inline-flex items-center mr-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
		type="button">
		<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
			 xmlns="http://www.w3.org/2000/svg">
			<path d="M12 6v6m0 0v6m0-6h6m-6 0H6" stroke-linecap="round" stroke-linejoin="round"
				  stroke-width="2"></path>
		</svg>
		<slot/>
	</button>
</template>
