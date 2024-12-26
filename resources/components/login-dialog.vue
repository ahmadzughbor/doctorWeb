<script setup lang="ts">
const emit = defineEmits<{
	(e: 'close'): void
}>()

defineProps<{
	show: boolean
}>()

const form = useForm({
	method: 'POST',
	url: route('login.store'),
	preserveScroll: true,
	fields: {
		email: '',
		password: '',
	},
	hooks: {
		success() {
			emit('close')
		},
	},
})

const disabled = computed(() => {
	return form.fields.email === ''
	|| form.fields.password === ''
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
								<!-- Login form -->
								<transition
									enter-active-class="duration-300 ease-out"
									enter-from-class="opacity-0 scale-95"
									enter-to-class="opacity-100 scale-100"
									leave-active-class="duration-200 ease-in absolute inset-0"
									leave-from-class="opacity-100 scale-100"
									leave-to-class="opacity-0 scale-95"
								>
									<div>
										<headless-dialog-title as="h1" class="mt-4 text-center text-2xl font-bold uppercase tracking-widest text-gray md:mt-6">
											Login
										</headless-dialog-title>

										<div class="mt-6 md:mt-8">
											<form class="w-full space-y-4" @submit.prevent="form.submit">
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

												<div class="col-span-2 pt-2">
													<base-button variant="secondary" button-type="submit" class="w-full" :loading="form.processing" :disabled="disabled">
														Submit
													</base-button>
												</div>
											</form>
										</div>
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
