<script setup lang="ts">
const $props = defineProps<{
	status: number
}>()

const title = computed(() => ({
	503: 'Service unavailable',
	404: 'Not found',
	403: 'Forbidden',
})[$props.status] ?? 'Internal server error')

const description = computed(() => ({
	503: 'Sorry, we are doing some maintenance. Please check back soon.',
	404: 'The page your are looking for does not exist.',
	403: 'Sorry, you cannot access this page.',
})[$props.status] ?? 'Sorry, something went wrong.')

useHead({
	title: title.value,
})

const isServerError = computed(() => $props.status >= 500)
</script>

<template>
	<div class="relative flex min-h-screen flex-col">
		<div class="flex flex-1 flex-col bg-ocre-lightest">
			<base-header v-if="!isServerError" />
			<div class="flex flex-1 items-center justify-center overflow-hidden">
				<!-- Blue circle -->
				<div class="absolute flex w-full justify-center overflow-hidden">
					<div class="flex h-[570px] w-[570px] shrink-0 flex-col items-center justify-center rounded-full bg-blue-lighter" />
				</div>

				<div class="relative z-10 flex flex-col items-center justify-center">
					<div class="pointer-events-none relative">
						<!-- Status code -->
						<p class="text-[120px] font-bold leading-none tracking-wider text-white sm:text-[150px]" v-text="status" />

						<!-- Illustrations -->
						<div class="absolute -left-8 bottom-6 flex items-center justify-center">
							<i-custom-dashed-line-paper class="w-[300px] shrink-0 sm:w-[460px]" :height="undefined" />
						</div>
						<div v-if="status === 404" class="absolute inset-0 flex items-center justify-center">
							<i-custom-periscope-lg class="h-14 w-14 shrink-0 text-blue-dark" />
						</div>
					</div>

					<!-- Error message -->
					<span class="mt-3 text-lg font-bold uppercase text-blue-darker" v-text="title" />
					<p class="px-4 text-center text-sm text-gray-light" v-text="description" />
					<base-button
						v-if="!isServerError"
						as="link"
						variant="secondary"
						class="mt-5"
						:href="route('index')"
					>
						Return to the home page
					</base-button>
				</div>
			</div>
		</div>
	</div>
</template>
