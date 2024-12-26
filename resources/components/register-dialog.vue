<script setup lang="ts">
const emit = defineEmits<{
	(e: 'close'): void
}>()

defineProps<{
	show: boolean
}>()

const currentStep = ref<'register' | 'success'>('register')
const registerAs = ref<Exclude<App.Enums.Role, 'admin'>>('patient')
const successFlash = useProperty('flash.success')

const form = useForm({
	method: 'POST',
	url: route('register.store'),
	preserveScroll: true,
	fields: {
		first_name: '',
		last_name: '',
		email: '',
		password: '',
		gender: genderOptions[0],
		qualification: '',
		speciality: doctorSpecialityOptions[0],
	},
	transform(fields) {
		return {
			...fields,
			name: `${fields.first_name} ${fields.last_name}`,
			role: registerAs.value,
			gender: fields.gender.value,
			speciality: fields.speciality.value,
		}
	},
	hooks: {
		success() {
			emit('close')
		},
	},
})

const disabled = computed(() => {
	return form.fields.first_name === ''
	|| form.fields.last_name === ''
	|| form.fields.password === ''
	|| form.fields.email === ''
	|| (registerAs.value === 'doctor' ? (form.fields.qualification === '') : false)
	|| form.processing
})
</script>

<template>
	<headless-transition-root :show="show" as="template">
		<headless-dialog as="div" @close="$emit('close')">
			<div class="fixed inset-0 z-40 overflow-y-auto">
				<div class="min-h-screen px-4 text-center">
					<headless-transition-child
						as="template"
						enter="duration-300 ease-out"
						enter-from="opacity-0"
						enter-to="opacity-100"
						leave="duration-200 ease-in"
						leave-from="opacity-100"
						leave-to="opacity-0"
					>
						<div class="fixed inset-0 bg-gray/70" />
					</headless-transition-child>

					<span class="inline-block h-screen align-middle" aria-hidden="true">
						&#8203;
					</span>

					<headless-transition-child
						as="template"
						enter="duration-300 ease-out"
						enter-from="opacity-0 scale-95"
						enter-to="opacity-100 scale-100"
						leave="duration-200 ease-in"
						leave-from="opacity-100 scale-100"
						leave-to="opacity-0 scale-95"
					>
						<headless-dialog-panel class="relative mx-auto my-8 inline-flex min-h-[550px] w-full max-w-[620px] flex-col rounded-lg bg-ocre-lightest px-6 py-9 text-left align-middle transition-all md:p-14 md:pt-9">
							<!-- Close button -->
							<button
								type="button"
								class="absolute right-4 top-4 z-10 rounded-full bg-white p-1.5 text-gray-lighter transition duration-100 hover:text-gray-light focus:outline-none focus-visible:ring-2 focus-visible:ring-gray"
								@click="$emit('close')"
							>
								<i-heroicons-x-mark-20-solid class="h-5 w-5 shrink-0" />
							</button>

							<div class="relative flex flex-1 flex-col">
								<!-- Register form -->
								<transition
									enter-active-class="duration-300 ease-out"
									enter-from-class="opacity-0 scale-95"
									enter-to-class="opacity-100 scale-100"
									leave-active-class="duration-200 ease-in absolute inset-0"
									leave-from-class="opacity-100 scale-100"
									leave-to-class="opacity-0 scale-95"
								>
									<div v-if="currentStep === 'register'">
										<headless-dialog-title as="h1" class="mt-4 text-center text-2xl font-bold uppercase tracking-widest text-gray md:mt-6">
											Register
										</headless-dialog-title>
										<div class="mt-4 grid grid-cols-2 gap-4">
											<button type="button" class="px-4 py-2" :class="registerAs === 'patient' ? 'bg-ocre-darker text-ocre-lightest' : 'bg-ocre-lighter text-ocre-darker'" @click="registerAs = 'patient'">
												Patient
											</button>
											<button type="button" class="px-4 py-2" :class="registerAs === 'doctor' ? 'bg-ocre-darker text-ocre-lightest' : 'bg-ocre-lighter text-ocre-darker'" @click="registerAs = 'doctor'">
												Doctor
											</button>
										</div>

										<div class="mt-6 md:mt-8">
											<form class="w-full space-y-4" @submit.prevent="form.submit">
												<base-input
													id="firstname"
													v-model="form.fields.first_name"
													name="firstname"
													type="text"
													label="First name"
													autocomplete="given-name"
													:required="true"
													:error="form.errors.first_name"
													:clearable="form.errors.first_name !== ''"
													@clear="form.fields.first_name = ''; form.clearErrors('first_name')"
												/>
												<base-input
													id="lastname"
													v-model="form.fields.last_name"
													name="lastname"
													type="text"
													label="Last name"
													autocomplete="family-name"
													:required="true"
													:error="form.errors.last_name"
													:clearable="form.errors.last_name !== ''"
													@clear="form.fields.last_name = ''; form.clearErrors('last_name')"
												/>

												<base-input
													id="email"
													v-model="form.fields.email"
													name="email"
													type="email"
													label="Email address"
													:required="true"
													:error="form.errors.email"
													:clearable="form.errors.email !== ''"
													@clear="form.fields.email = ''; form.clearErrors('email')"
												/>

												<input-dropdown
													v-model="form.fields.gender"
													:options="genderOptions"
													label="Gender"
												/>

												<base-input
													id="password"
													v-model="form.fields.password"
													name="password"
													type="password"
													label="Password"
													:required="true"
													:error="form.errors.password"
													:clearable="form.errors.password !== ''"
													@clear="form.fields.password = ''; form.clearErrors('password')"
												/>

												<input-dropdown
													v-if="registerAs === 'doctor'"
													v-model="form.fields.speciality"
													:options="doctorSpecialityOptions"
													label="Speciality"
												/>

												<base-input
													v-if="registerAs === 'doctor'"
													id="qualification"
													v-model="form.fields.qualification"
													name="qualification"
													type="textarea"
													label="Qualification"
													:required="true"
													:error="form.errors.qualification"
													:clearable="form.errors.qualification !== ''"
													@clear="form.fields.qualification = ''; form.clearErrors('qualification')"
												/>

												<div class="col-span-2 pt-2">
													<base-button variant="secondary" button-type="submit" class="w-full" :loading="form.processing" :disabled="disabled">
														Register
													</base-button>
												</div>
											</form>
										</div>
									</div>
								</transition>

								<!-- Success message -->
								<transition
									enter-active-class="duration-300 ease-out delay-200"
									enter-from-class="opacity-0 scale-90"
									enter-to-class="opacity-100 scale-100"
									leave-active-class="duration-200 ease-in"
									leave-from-class="opacity-100 scale-100"
									leave-to-class="opacity-0 scale-90"
								>
									<div v-if="currentStep === 'success'" class="-mt-14 flex flex-1 flex-col items-center justify-center">
										<headless-dialog-title
											as="h1"
											class="mt-8 text-center text-2xl font-bold uppercase tracking-widest text-gray md:mt-6"
											v-text="successFlash?.title"
										/>
										<headless-dialog-description
											class="mt-2 text-center text-sm text-gray-light"
											v-text="successFlash?.description"
										/>
									</div>
								</transition>
							</div>
						</headless-dialog-panel>
					</headless-transition-child>
				</div>
			</div>
		</headless-dialog>
	</headless-transition-root>
</template>
