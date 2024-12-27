<script setup lang="ts">
const doctors = useProperty('doctors')

// Optional: Add search functionality
const search = ref('')
const filteredDoctors = computed(() => {
  if (!search.value) return doctors.value
  
  const searchTerm = search.value.toLowerCase()
  return doctors.value.filter(doctor => 
    doctor.user.name.toLowerCase().includes(searchTerm) ||
    doctor.speciality.toLowerCase().includes(searchTerm)
  )
})
</script>

<template layout>
  <div class="min-h-screen bg-gray-50 pt-16 pb-12">
    <base-container>
      <!-- Header -->
      <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray">
          Find a Doctor
        </h1>
        <p class="mt-2 text-gray-light">
          Browse through our list of qualified medical professionals
        </p>
      </div>

      <!-- Search -->
      <div class="mb-8">
        <base-input
          v-model="search"
          type="search"
          placeholder="Search by name or speciality..."
          class="max-w-xl"
        >
          <template #prefix>
            <i-heroicons-magnifying-glass class="h-5 w-5 text-gray-light" />
          </template>
        </base-input>
      </div>

      <!-- Doctors Grid -->
      <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <doctor-card
          v-for="doctor in filteredDoctors"
          :key="doctor.id"
          :doctor="doctor"
        />
      </div>

      <!-- Empty State -->
      <div 
        v-if="filteredDoctors.length === 0" 
        class="flex flex-col items-center justify-center rounded-lg border border-ocre-lightest bg-white py-12"
      >
        <i-heroicons-user-group class="h-12 w-12 text-gray-light" />
        <h3 class="mt-4 text-lg font-medium text-gray">
          No doctors found
        </h3>
        <p class="mt-1 text-gray-light">
          {{ search ? 'Try adjusting your search terms' : 'Check back later for available doctors' }}
        </p>
      </div>
    </base-container>
  </div>
</template>
