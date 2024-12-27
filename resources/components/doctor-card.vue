<script setup lang="ts">
import { ref } from 'vue'

const props = defineProps<{
  doctor: {
    id: number
    user: {
      name: string
    }
    speciality: string
    qualification: string
  }
}>()

const showBookingDialog = ref(false)

const handleBooking = () => {
  console.log('Opening booking dialog for doctor:', props.doctor)
  showBookingDialog.value = true
}
</script>

<template>
  <div class="overflow-hidden rounded-lg border border-ocre-lightest bg-white shadow-sm transition-all hover:shadow-md">
    <div class="p-6">
      <div class="flex items-start justify-between">
        <div>
          <h3 class="text-lg font-medium text-gray">
            Dr. {{ doctor.user.name }}
          </h3>
          <p class="mt-1 text-sm text-gray-light">
            {{ doctor.speciality }}
          </p>
        </div>
        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-lightest">
          <i-custom-user-circle class="h-6 w-6 text-blue" />
        </div>
      </div>
      
      <div class="mt-4">
        <p class="text-sm text-gray">
          {{ doctor.qualification }}
        </p>
      </div>
      
      <div class="mt-6 flex gap-2">
        <base-button 
          as="link" 
          :href="route('doctors.show', { id: doctor.id })"
          variant="secondary"
          class="flex-1"
        >
          View Profile
        </base-button>
        <base-button 
          variant="primary"
          class="flex-1"
          @click="handleBooking"
        >
          Book Now
        </base-button>
      </div>
    </div>

    <!-- Booking Dialog -->
    <book-appointment-dialog 
      :show="showBookingDialog"
      :doctor="doctor"
      @close="showBookingDialog = false"
    />
  </div>
</template> 