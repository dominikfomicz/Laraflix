<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

export default {
	props: {
		movie: Object,
		persons: Array,
		roles: Array,
	},
	components: {
		InputError,
		InputLabel,
		PrimaryButton,
		TextInput,
		AuthenticatedLayout,
		Head,
		Link
	},
	data() {
		return {
			form: useForm({
				title: this.$props.movie.title
			})
		}
	},
	methods: {
		submit() {
			this.form.patch(route('movies.update', {id: this.movie.id}));
		}
	},
	mounted() {
	}
}
</script>

<template>
	<Head title="Create movie"/>

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-2xl text-gray-800 leading-tight">
				Create movie
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						<form @submit.prevent="submit">
							<div>
								<InputLabel for="name" value="Title"/>
								<TextInput id="name" v-model="form.title" autocomplete="title" autofocus
										   class="mt-1 block w-full"
										   required type="text"/>
								<InputError :message="form.errors.title" class="mt-2"/>
							</div>

							<div class="flex items-center justify-end mt-4">
								<PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
											   class="ml-4">
									Edit
								</PrimaryButton>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
