<script setup lang="ts">
withDefaults(
	defineProps<{
		as?: 'section' | 'div'
		fluid?: boolean
	}>(),
	{
		as: 'section',
		fluid: false,
	},
)
</script>

<template>
	<component
		:is="as"
		class="px-6"
		:class="{
			'mx-auto max-w-[1100px]': !fluid,
		}"
	>
		<slot />
	</component>
</template>
