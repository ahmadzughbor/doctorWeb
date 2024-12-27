<script setup lang="ts">
import { Dialog, DialogPanel } from '@headlessui/vue'
import { ref, watch } from 'vue'

const emit = defineEmits<{
  (e: 'close'): void
}>()

const props = defineProps<{
  show: boolean,
  doctor?: {
    id: number
    user: {
      name: string
    }
    speciality: string
  }
}>()

const doctors = useProperty('available_doctors')
const errorMessage = ref('')

// Initialize form using the same pattern as register-dialog
const form = useForm({
  method: 'POST',
  url: route('appointments.store'),
  preserveScroll: true,
  fields: {
    doctor_id: props.doctor?.id?.toString() || '',
    date: '',
    time: ''
  },
  hooks: {
    success() {
      emit('close')
    },
    error(errors) {
      console.error('Validation errors:', errors)
      if (typeof errors === 'object' && errors !== null) {
        errorMessage.value = Object.values(errors)[0] as string
      } else {
        errorMessage.value = 'An error occurred while booking the appointment'
      }
    }
  }
})

// Watch for doctor changes
watch(() => props.doctor, (newDoctor) => {
  if (newDoctor) {
    form.fields.doctor_id = newDoctor.id.toString()
  }
}, { immediate: true })

// Reset form when dialog closes
watch(() => props.show, (isOpen) => {
  if (!isOpen) {
    form.reset()
  }
})

const submit = () => {
  errorMessage.value = ''
  
  // Validate form
  if (!form.fields.doctor_id) {
    errorMessage.value = 'Please select a doctor'
    return
  }
  if (!form.fields.date) {
    errorMessage.value = 'Please select a date'
    return
  }
  if (!form.fields.time) {
    errorMessage.value = 'Please select a time'
    return
  }

  form.submit()
}
</script>

<template>
  <Dialog 
    :open="show"
    as="div" 
    class="relative z-50"
    @close="emit('close')"
  >
    <div class="fixed inset-0 bg-black/30" />

    <div class="fixed inset-0 overflow-y-auto">
      <div class="flex min-h-full items-center justify-center p-4">
        <DialogPanel class="w-full max-w-md rounded-lg bg-white p-6">
          <h2 class="text-xl font-bold text-gray">
            Book Appointment
          </h2>

          <!-- Error Message -->
          <div 
            v-if="errorMessage"
            class="mt-4 rounded-md bg-red-50 p-4 text-sm text-red-700"
          >
            {{ errorMessage }}
          </div>

          <form 
            class="mt-6 space-y-4" 
            @submit.prevent="submit"
          >
            <div v-if="!doctor">
              <label class="text-sm text-gray">Select Doctor</label>
              <select 
                v-model="form.fields.doctor_id"
                class="mt-1 block w-full rounded-md border-gray-300"
              >
                <option value="">Select a doctor</option>
                <option 
                  v-for="doctor in doctors"
                  :key="doctor.id"
                  :value="doctor.id"
                >
                  {{ doctor.user.name }} - {{ doctor.speciality }}
                </option>
              </select>
            </div>

            <div>
              <label class="text-sm text-gray">Date</label>
              <input 
                v-model="form.fields.date"
                type="date"
                :min="new Date().toISOString().split('T')[0]"
                class="mt-1 block w-full rounded-md border-gray-300"
              >
            </div>

            <div>
              <label class="text-sm text-gray">Time</label>
              <input 
                v-model="form.fields.time"
                type="time"
                class="mt-1 block w-full rounded-md border-gray-300"
              >
            </div>

            <div class="mt-6 flex justify-end gap-4">
              <base-button 
                variant="plain"
                type="button"
                @click="emit('close')"
              >
                Cancel
              </base-button>
              <base-button 
                type="submit"
                variant="primary"
                :loading="form.processing"
              >
                Book Appointment
              </base-button>
            </div>
          </form>
        </DialogPanel>
      </div>
    </div>
  </Dialog>
</template> 