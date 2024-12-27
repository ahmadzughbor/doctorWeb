<script setup lang="ts">
const appointments = useProperty('appointments')
const isDoctor = useProperty('is_doctor')
const showBookingDialog = ref(false)

interface Appointment {
  id: number
  doctor: {
    user: {
      name: string
    }
    speciality: string
  }
  starts_at: string
  status: string
}

const handleBooking = () => {
  console.log('Opening booking dialog')
  showBookingDialog.value = true
}
</script>

<template layout>
  <div class="min-h-screen bg-gray-50 pt-16 pb-12">
    <base-container>
      <div class="mb-8 flex items-center justify-between">
        <div>
          <h1 class="text-3xl font-bold text-gray">
            {{ isDoctor ? 'My Schedule' : 'My Appointments' }}
          </h1>
          <p class="mt-2 text-gray-light">
            {{ isDoctor ? 'View your upcoming appointments' : 'View and manage your appointments' }}
          </p>
        </div>
        
        <!-- Show booking button only for patients -->
        <base-button 
          v-if="!isDoctor"
          variant="primary"
          @click="handleBooking"
        >
          Book Appointment
        </base-button>
      </div>

      <!-- Appointments List -->
      <div class="space-y-4">
        <div 
          v-for="appointment in appointments" 
          :key="appointment.id"
          class="rounded-lg border border-ocre-lightest bg-white p-6"
        >
          <div class="flex items-start justify-between">
            <div>
              <h3 class="font-medium text-gray">
                Dr. {{ appointment.doctor.user.name }}
              </h3>
              <p class="mt-1 text-sm text-gray-light">
                {{ appointment.doctor.speciality }}
              </p>
              <p class="mt-2 text-sm text-gray">
                {{ new Date(appointment.starts_at).toLocaleString() }}
              </p>
            </div>
            <span 
              class="rounded-full px-3 py-1 text-sm"
              :class="{
                'bg-blue-lightest text-blue': appointment.status === 'scheduled',
                'bg-green-100 text-green-800': appointment.status === 'completed',
                'bg-red-100 text-red-800': appointment.status === 'cancelled'
              }"
            >
              {{ appointment.status }}
            </span>
          </div>
        </div>
      </div>

      <!-- Empty State -->
      <div 
        v-if="appointments.length === 0"
        class="flex flex-col items-center justify-center rounded-lg border border-ocre-lightest bg-white py-12"
      >
        <i-heroicons-calendar class="h-12 w-12 text-gray-light" />
        <h3 class="mt-4 text-lg font-medium text-gray">
          No appointments yet
        </h3>
        <p class="mt-1 text-gray-light">
          Book your first appointment with a doctor
        </p>
      </div>
    </base-container>

    <!-- Booking Dialog -->
    <book-appointment-dialog 
      :show="showBookingDialog"
      @close="showBookingDialog = false"
    />
  </div>
</template> 