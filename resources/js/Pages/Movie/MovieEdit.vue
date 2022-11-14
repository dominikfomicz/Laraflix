<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DeleteFormButton from '@/Components/DeleteFormButton.vue';
import TextInput from '@/Components/TextInput.vue';

export default {
	props: {
		movie: Object,
		persons: Object,
		roles: Object,
		moviePersons: Object,
	},
	components: {
		InputError,
		InputLabel,
		PrimaryButton,
		DeleteFormButton,
		TextInput,
		AuthenticatedLayout,
		Head,
		Link
	},
	data() {
		return {
			selectedMoviePersons: this.moviePersons.data,
			selectedPerson: null,
			form: useForm({
				title: this.$props.movie.title,
			}),
		}
	},
	methods: {
		handleDelete(index) {
			this.selectedMoviePersons.splice(index, 1);
		},
		prepareMoviePersonObject(selectedPerson) {
			return this.convertReactiveToNormalObject({
				person: selectedPerson,
			})
		},
		addMoviePerson(moviePerson) {
			this.selectedMoviePersons.push(moviePerson)
		},
		convertReactiveToNormalObject(object) {
			return JSON.parse(JSON.stringify(object));
		},
		submit() {
			this.form
				.transform((data) => ({
					...data,
					movie_persons: this.selectedMoviePersons
				}))
				.patch(route('movies.update', {id: this.movie.id}));
		},
	},
	watch: {
		selectedPerson: function (selectedPerson) {
			if (!selectedPerson) return;

			const moviePerson = this.prepareMoviePersonObject(selectedPerson)
			this.addMoviePerson(moviePerson)

			this.selectedPerson = null
		},
	},
	mounted() {
	}
}
</script>

<template>
	<Head title="Edit movie"/>

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-2xl text-gray-800 leading-tight">
				Edit movie
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
				<div class="bg-white shadow-sm sm:rounded-lg">
					<div class="p-6 bg-white border-b border-gray-200">
						<form @submit.prevent="submit">
							<div>
								<InputLabel for="title" value="Title"/>
								<TextInput id="title" v-model="form.title" autocomplete="title" autofocus
										   class="mt-1 block w-full"
										   required type="text"/>
								<InputError :message="form.errors.title" class="mt-2"/>
							</div>

							<div class="mt-4">
								<InputLabel for="actors" value="Actors"/>
								<v-select
									id="actors"
									v-model="selectedPerson"
									:options="persons.data"
									label="name"
									placeholder="Attach person"
								/>

								<div
									v-for="(moviePerson, index) in selectedMoviePersons"
									class="mt-4 grid grid-cols-6 flex">
									<div class="col-span-2 mt-auto mb-auto">
										{{ moviePerson?.person?.name }}
									</div>
									<div class="col-span-3">
										<v-select
											id="actors"
											v-model="moviePerson.role"
											:options="roles.data"
											label="name"
											placeholder="Role"
										/>
									</div>
									<div class="text-right mt-auto mb-auto">
										<DeleteFormButton type="button" @click="handleDelete(index)"/>
									</div>
									<div class="col-span-6">
										<InputError :message="form.errors['movie_persons.'+index+'.role']"
													class="mt-2"/>
									</div>
								</div>

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
