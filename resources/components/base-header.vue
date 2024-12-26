<script setup lang="ts">
const currentRoute = useProperty('security.current_route')
const isAuthenticated = useProperty('security.is_authenticated')

const isScrollingDown = ref(false)
const prevScroll = ref(0)

const open = ref(false)
const isLocked = useScrollLock(document.body)

watch(open, (val) => {
	isLocked.value = val
})

useEventListener('scroll', () => {
	if (currentRoute.value !== 'index') {
		return
	}

	const isScrolling = window.scrollY > 0
	isScrollingDown.value = isScrolling && window.scrollY > prevScroll.value
	prevScroll.value = window.scrollY
})

registerHook('navigated', () => open.value = false)

const showRegisterDialog = ref(false)
const showLoginDialog = ref(false)
</script>

<template>
	<header
		id="header"
		class="fixed inset-x-0 top-0 z-40 bg-white/50 backdrop-blur-xl transition-all duration-300"
		:class="{
			'-top-20': isScrollingDown,
		}"
	>
		<base-container as="div" class="relative z-30" :fluid="true">
			<div class="-mx-2 flex items-center justify-between py-3 lg:mx-0 lg:py-2">
				<div class="flex items-center">
					<!-- Logo link -->
					<router-link href="/" class="flex items-center gap-x-2 text-lg focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-dark">
						<svg class="h-12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M20 6H16V4C16 2.9 15.1 2 14 2H10C8.9 2 8 2.9 8 4V6H4C2.9 6 2 6.9 2 8V20C2 21.1 2.9 22 4 22H20C21.1 22 22 21.1 22 20V8C22 6.9 21.1 6 20 6ZM10 4H14V6H10V4ZM16 15H13V18H11V15H8V13H11V10H13V13H16V15Z" fill="#2DD4BF" />
						</svg>
						<p>Doctor<span class="text-teal-500">Web</span></p>
					</router-link>
				</div>

				<register-dialog :show="showRegisterDialog" @close="showRegisterDialog = false" />
				<login-dialog :show="showLoginDialog" @close="showLoginDialog = false" />

				<div class="hidden lg:block">
					<a
						v-if="isAuthenticated"
						href="/admin"
						class="text-gray hover:text-gray-light focus:outline-none focus-visible:ring-2 focus-visible:ring-gray"
					>
						Dashbaord
					</a>
					<div v-else class="flex items-center gap-4">
						<base-button as="button" variant="plain" class="!font-sans" @click="showLoginDialog = true">
							<i-custom-user-circle class="mr-1.5 h-6 w-6 text-orange" />
							Login
						</base-button>

						<base-button as="button" variant="secondary" @click="showRegisterDialog = true">
							Register
						</base-button>
					</div>
				</div>

				<!-- Mobile menu button -->
				<div class="lg:hidden">
					<button
						type="button"
						class="relative -m-1 flex items-center justify-center p-1 text-gray hover:text-gray-dark focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-dark"
						@click="open = !open"
					>
						<i-custom-vertical-three-dots class="absolute h-5 shrink-0 transition-transform duration-200" :class="{ 'rotate-45':open }" />
						<i-custom-vertical-two-dots class="h-5 shrink-0 transition-transform duration-200" :class="{ '-rotate-45':open }" />
					</button>
				</div>
			</div>
		</base-container>

		<!-- Mobile menu -->
		<transition
			enter-active-class="ease-linear duration-200"
			enter-from-class="-translate-y-full"
			enter-to-class="opacity-100 scale-100"
			leave-active-class="ease-linear duration-200"
			leave-from-class="opacity-100 scale-100"
			leave-to-class="-translate-y-full"
		>
			<div v-if="open" class="fixed inset-0 z-20 h-screen bg-blue-lighter pt-16 transition-all lg:hidden">
				<div class="flex h-full flex-col justify-between">
					<div class="flex flex-col border-t border-blue">
						<router-link
							href="/#reach"
							class="border-b border-blue px-4 py-5 text-gray transition-colors duration-100 focus-within:ring-gray-dark hover:text-gray-light focus:outline-none focus-visible:ring-2"
						>
							Reach out to your doctors
						</router-link>
					</div>

					<div v-if="isAuthenticated">
						<base-button variant="secondary" as="link" link-type="a" href="/admin">
							Dashbaord
						</base-button>
					</div>
					<div v-else class="flex gap-x-11 p-4">
						<base-button as="button" variant="plain" class="flex-1 bg-white !font-sans hover:bg-white/80" @click="showLoginDialog = true">
							<i-custom-user-circle class="mr-1.5 h-6 w-6 text-orange" />
							Login
						</base-button>

						<base-button as="button" variant="secondary" class="flex-1" @click="showRegisterDialog = true">
							Register
						</base-button>
					</div>
				</div>
			</div>
		</transition>
	</header>
</template>
