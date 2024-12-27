<script setup lang="ts">
const doctor = useProperty('doctor')
const user = useProperty('auth.user')
const showBookingDialog = ref(false)

const isPatient = computed(() => user.value?.role === 'patient')

const handleBooking = () => {
  console.log('Opening booking dialog for doctor:', doctor.value)
  showBookingDialog.value = true
}
</script>

<template layout>
  <div class="py-12">
    <base-container>
      <div class="overflow-hidden rounded-lg border border-ocre-lightest bg-white">
        <!-- Doctor Header -->
        <div class="border-b border-ocre-lightest bg-white p-8">
          <div class="flex items-start justify-between">
            <div>
              <h1 class="text-3xl font-bold text-gray">
                Dr. {{ doctor.user.name }}
              </h1>
              <p class="mt-2 text-lg text-gray-light">
                {{ doctor.speciality }}
              </p>
            </div>
            <div class="flex h-20 w-20 items-center justify-center rounded-full bg-blue-lightest">
              <i-custom-user-circle class="h-10 w-10 text-blue" />
            </div>
          </div>
        </div>

        <!-- Doctor Details -->
        <div class="p-8">
          <div class="space-y-8">
            <!-- Qualification -->
            <div>
              <h2 class="text-xl font-semibold text-gray">
                Qualification
              </h2>
              <p class="mt-2 text-gray">
                {{ doctor.qualification }}
              </p>
            </div>

            <!-- Book Appointment Button -->
            <div v-if="isPatient" class="flex justify-end">
              <base-button 
                variant="primary"
                @click="handleBooking"
              >
                Book Appointment
              </base-button>
            </div>
          </div>
        </div>
      </div>
    </base-container>

    <!-- Booking Dialog -->
    <book-appointment-dialog 
      :show="showBookingDialog"
      :doctor="doctor"
      @close="showBookingDialog = false"
    />
  </div>
</template>
