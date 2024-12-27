<script setup lang="ts">
const currentRoute = useProperty('security.current_route')
const user = useProperty('auth.user')

// Compute authentication state based on user presence
const isAuthenticated = computed(() => !!user.value)

const isAdmin = computed(() => user.value?.role === 'admin')
const isDoctor = computed(() => user.value?.role === 'doctor')
const isPatient = computed(() => user.value?.role === 'patient')

const showAppointments = computed(() => isPatient.value || isDoctor.value)

const showRegisterDialog = ref(false)
const showLoginDialog = ref(false)

const logout = async () => {
  try {
    await router.delete(route('logout'))
    window.location.href = '/' // Force a full page reload to the home page
  } catch (error) {
    console.error('Logout failed:', error)
  }
}
</script>

<template>
	<header class="fixed inset-x-0 top-0 z-50 bg-white shadow-sm">
		<nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Top">
			<div class="flex h-16 items-center justify-between">
				<div class="flex items-center">
					<router-link href="/" class="text-2xl font-bold text-blue">
						MedBook
					</router-link>
				</div>

				<div class="ml-10 flex items-center space-x-4">
					<div v-if="isAuthenticated" class="flex items-center gap-4">
						<template v-if="isPatient">
							<router-link
								href="/doctors"
								class="text-gray hover:text-gray-light focus:outline-none focus-visible:ring-2 focus-visible:ring-gray"
							>
								Find Doctors
							</router-link>
							
							<router-link
								href="/appointments"
								class="text-gray hover:text-gray-light focus:outline-none focus-visible:ring-2 focus-visible:ring-gray"
							>
								My Appointments
							</router-link>
						</template>

						<template v-if="isDoctor">
							<router-link
								href="/appointments"
								class="text-gray hover:text-gray-light focus:outline-none focus-visible:ring-2 focus-visible:ring-gray"
							>
								My Schedule
							</router-link>
						</template>

						<router-link
							href="/profile"
							class="text-gray hover:text-gray-light focus:outline-none focus-visible:ring-2 focus-visible:ring-gray"
						>
							My Profile
						</router-link>

						<base-button 
							as="button" 
							variant="plain" 
							class="!font-sans text-gray hover:text-gray-light" 
							@click="logout"
						>
							Logout
						</base-button>
					</div>

					<div v-else class="flex items-center gap-4">
						<base-button 
							as="button" 
							variant="plain" 
							class="!font-sans" 
							@click="showLoginDialog = true"
						>
							Login
						</base-button>
						<base-button 
							as="button" 
							variant="primary" 
							class="!font-sans" 
							@click="showRegisterDialog = true"
						>
							Register
						</base-button>
					</div>
				</div>
			</div>
		</nav>

		<register-dialog 
			:show="showRegisterDialog" 
			@close="showRegisterDialog = false" 
		/>
		<login-dialog 
			:show="showLoginDialog" 
			@close="showLoginDialog = false" 
		/>
	</header>
</template>
