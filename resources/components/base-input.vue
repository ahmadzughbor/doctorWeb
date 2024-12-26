<script setup lang="ts">
const emit = defineEmits<{
	(e: 'update:modelValue', text: string): void
	(e: 'clear'): void
}>()

const props = withDefaults(defineProps<{
	modelValue?: string | number
	label?: string
	type?: string
	id?: string
	name?: string
	placeholder?: string
	error?: string
	clearable?: boolean
	required?: boolean
	value?: string | number
	autocomplete?: string
}>(), {
	required: false,
	type: 'text',
})

const inputRef = ref()
const showPassword = ref(false)

const clearInput = () => {
	inputRef.value.focus()
	emit('update:modelValue', '')
	emit('clear')
}

const inputType = computed(() => {
	return props.type === 'password' && showPassword.value ? 'text' : props.type
})
</script>

<template>
	<div>
		<div class="input-box flex items-center bg-white p-2 pl-3 focus-within:ring-1 focus-within:ring-gray-lighter/40" :class="{ 'h-14 pb-1.5' : type !== 'textarea' }">
			<div class="flex flex-1 flex-col justify-between">
				<label v-if="label" class="mb-0.5 text-sm leading-4 text-gray-light" :for="id">
					{{ label }} <span v-if="required">*</span>
				</label>
				<component
					:is="inputType === 'textarea' ? 'textarea' : 'input'"
					:id="id"
					ref="inputRef"
					:name="name"
					:value="value || modelValue"
					:rows="type === 'textarea' ? 3 : undefined"
					:type="inputType"
					:placeholder="placeholder"
					:autocomplete="autocomplete"
					:class="type === 'textarea' ? 'resize-none min-h-[6.5rem]' : 'h-6 leading-none'"
					class="w-full bg-transparent text-sm text-gray focus:outline-none"
					@input="$emit('update:modelValue', ($event.target as HTMLInputElement)?.value)"
				/>
			</div>
			<div v-if="(clearable || type === 'password') && type !== 'textarea'" class="flex items-center space-x-1.5">
				<button
					v-if="type === 'password'"
					type="button"
					class="rounded-full p-2 text-gray-light ring-gray hover:text-gray focus-visible:ring-1"
					tabindex="-1"
					@click="showPassword = !showPassword"
				>
					<i-heroicons-eye-slash v-if="!showPassword" class="h-3.5 w-3.5" />
					<i-heroicons-eye v-if="showPassword" class="h-3.5 w-3.5" />
				</button>
				<button v-if="clearable && modelValue" tabindex="-1" class="rounded-full p-2 text-gray-light hover:text-gray" type="button" @click="clearInput">
					<i-heroicons-x-mark-20-solid class="h-4 w-4" />
				</button>
			</div>
		</div>
		<div v-if="error" class="mt-1 flex items-center gap-x-1 text-xs font-medium text-danger">
			<i-heroicons-exclamation-circle class="h-5 w-5 shrink-0" />
			<span v-text="error" />
		</div>
	</div>
</template>
