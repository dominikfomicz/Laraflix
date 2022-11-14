<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';

export default {
	props: {
		role: Object
	},
	components: {
		InputError,
		InputLabel,
		PrimaryButton,
		TextInput,
		Checkbox,
		AuthenticatedLayout,
		Head,
		Link
	},
	data() {
		return {
			form: useForm({
				name: this.role.name,
				is_actor: this.role.is_actor,
				is_producer: this.role.is_producer,
				is_director: this.role.is_director,
			})
		}
	},
	methods: {
		submit() {
			this.form.patch(route('roles.update', {id: this.role.id}));
		}
	},
	mounted() {
	}
}
</script>

<template>
	<Head title="Edit role"/>

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-2xl text-gray-800 leading-tight">
				Edit role
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						<form @submit.prevent="submit">
							<div>
								<InputLabel for="name" value="Name"/>
								<TextInput id="name" v-model="form.name" autocomplete="name" autofocus
										   class="mt-1 block w-full"
										   required type="text"/>
								<InputError :message="form.errors.name" class="mt-2"/>
							</div>

							<div class="block mt-4">
								<label class="flex items-center">
									<Checkbox v-model:checked="form.is_actor" name="is_actor"/>
									<span class="ml-2 text-sm text-gray-600">Actor</span>
								</label>
							</div>

							<div class="block mt-4">
								<label class="flex items-center">
									<Checkbox v-model:checked="form.is_producer" name="is_producer"/>
									<span class="ml-2 text-sm text-gray-600">Producer</span>
								</label>
							</div>

							<div class="block mt-4">
								<label class="flex items-center">
									<Checkbox v-model:checked="form.is_director" name="is_director"/>
									<span class="ml-2 text-sm text-gray-600">Director</span>
								</label>
							</div>

							<div class="flex items-center justify-end mt-4">
								<PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
											   class="ml-4">
									Save
								</PrimaryButton>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
