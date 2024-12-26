<script setup lang="ts">
type Option = {
	value: string
	label: string
}

defineEmits<{
	(e: 'update:modelValue', text: Option): void
}>()

defineProps<{
	label?: string
	modelValue: Option
	options: Array<Option>
}>()
</script>

<template>
	<headless-menu v-slot="{ open }">
		<div class="relative h-14 bg-white" :class="{ 'focus-within:ring-1 focus-within:ring-gray-lighter/40': !open }">
			<div class="flex flex-col justify-between p-2 pb-1.5 pl-3">
				<label class="mb-0.5 text-sm leading-4 text-gray-light" v-text="label" />

				<headless-menu-button class="flex h-6 w-full items-center justify-between bg-transparent text-left text-sm font-bold leading-none text-gray focus:outline-none">
					<span v-text="modelValue.label" />
					<i-custom-triangle-down class="h-5 w-5 text-orange transition-transform duration-150" :class="{ 'rotate-180': open }" />
				</headless-menu-button>
			</div>

			<transition
				enter-active-class="transition duration-100 ease-out"
				enter-from-class="-translate-y-1 opacity-0 origin-top"
				enter-to-class="translate-y-0 opacity-100"
				leave-active-class="transition duration-75 ease-in origin-top"
				leave-from-class="translate-y-0 opacity-100"
				leave-to-class="-translate-y-1 opacity-0"
			>
				<headless-menu-items as="div" class="absolute inset-x-0 top-14 z-10 mt-0.5 flex max-h-[140px] w-full flex-col space-y-0.5 overflow-y-auto bg-gray-lightest focus:outline-none">
					<headless-menu-item v-for="option in options" :key="option.value" v-slot="{ active }">
						<button
							type="button"
							class="flex items-center justify-between px-2.5 py-1.5 text-left text-sm text-gray"
							:class="{ 'bg-gray-lighter/10': active }"
							@click="$emit('update:modelValue', option)"
						>
							<span :class="{ 'font-bold' : option.value === modelValue.value }" v-text="option.label" />
							<i-fa6-solid-check v-if="option.value === modelValue.value" class="h-3.5 w-3.5 text-orange" />
						</button>
					</headless-menu-item>
				</headless-menu-items>
			</transition>
		</div>
	</headless-menu>
</template>
