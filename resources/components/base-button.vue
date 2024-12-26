<script setup lang="ts">
import { RouterLink } from 'hybridly/vue'

withDefaults(defineProps<{
	as?: 'button' | 'link'
	linkType?: 'a' | 'router-link'
	buttonType?: 'button' | 'submit'
	variant?: 'primary' | 'secondary' | 'white' | 'plain'
	loading?: boolean
	disabled?: boolean
}>(), {
	as: 'button',
	linkType: 'router-link',
	buttonType: 'button',
})
</script>

<template>
	<component
		:is="as === 'link' ? linkType === 'router-link' ? RouterLink : 'a' : 'button'"
		:type="as === 'link' ? undefined : buttonType"
		class="relative flex h-10 items-center justify-center px-4 font-display transition-colors duration-100 focus:outline-none [&_svg]:shrink-0"
		:class="{
			'bg-blue-light font-bold text-gray hover:bg-blue-dark focus-visible:ring-2 focus-visible:ring-blue-dark focus-visible:ring-offset-2 disabled:bg-blue-lightest': variant === 'primary',
			'bg-gray font-bold text-white hover:bg-gray-dark focus-visible:ring-2 focus-visible:ring-gray-dark focus-visible:ring-offset-2 disabled:bg-gray-lighter': variant === 'secondary',
			'text-gray hover:opacity-90 focus-visible:ring-2 focus-visible:ring-gray-dark': variant === 'white' || variant === 'plain',
			'bg-white': variant === 'white',
		}"
		:disabled="disabled || loading"
	>
		<i-svg-spinners-bars-rotate-fade v-if="loading" class="h-5 w-5 text-white" />
		<slot v-else />
	</component>
</template>
