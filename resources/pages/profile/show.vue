<script setup lang="ts">
const user = useProperty('user')
const isDoctor = computed(() => user.value?.role === 'doctor')
const isPatient = computed(() => user.value?.role === 'patient')

const form = useForm({
  method: 'POST',
  url: route('profile.update'),
  fields: {
    name: user.value?.name || '',
    email: user.value?.email || '',
    gender: user.value?.gender || '',
    speciality: user.value?.doctor?.speciality || '',
    qualification: user.value?.doctor?.qualification || '',
    medical_history: user.value?.patient?.medical_history || '',
    allergies: user.value?.patient?.allergies || '',
    current_medications: user.value?.patient?.current_medications || '',
  }
})
</script>

<template layout>
  <div class="min-h-screen bg-gray-50 pt-16 pb-12">
    <base-container>
      <div class="mx-auto max-w-3xl">
        <h1 class="text-3xl font-bold text-gray">
          My Profile
        </h1>

        <form @submit.prevent="form.submit" class="mt-8 space-y-6">
          <!-- Common Fields -->
          <div class="space-y-4">
            <div>
              <label class="text-sm text-gray">Name</label>
              <base-input
                v-model="form.fields.name"
                type="text"
                class="mt-1"
              />
            </div>

            <div>
              <label class="text-sm text-gray">Email</label>
              <base-input
                v-model="form.fields.email"
                type="email"
                class="mt-1"
              />
            </div>

            <div>
              <label class="text-sm text-gray">Gender</label>
              <select
                v-model="form.fields.gender"
                class="mt-1 block w-full rounded-md border-gray-300"
              >
                <option value="">Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>

          <!-- Doctor Fields -->
          <div v-if="isDoctor" class="space-y-4">
            <div>
              <label class="text-sm text-gray">Speciality</label>
              <base-input
                v-model="form.fields.speciality"
                type="text"
                class="mt-1"
              />
            </div>

            <div>
              <label class="text-sm text-gray">Qualification</label>
              <base-textarea
                v-model="form.fields.qualification"
                class="mt-1"
              />
            </div>
          </div>

          <!-- Patient Fields -->
          <div v-if="isPatient" class="space-y-4">
            <div>
              <label class="text-sm text-gray">Medical History</label>
              <base-textarea
                v-model="form.fields.medical_history"
                class="mt-1"
              />
            </div>

            <div>
              <label class="text-sm text-gray">Allergies</label>
              <base-textarea
                v-model="form.fields.allergies"
                class="mt-1"
              />
            </div>

            <div>
              <label class="text-sm text-gray">Current Medications</label>
              <base-textarea
                v-model="form.fields.current_medications"
                class="mt-1"
              />
            </div>
          </div>

          <div class="flex justify-end">
            <base-button
              type="submit"
              variant="primary"
              :loading="form.processing"
            >
              Update Profile
            </base-button>
          </div>
        </form>
      </div>
    </base-container>
  </div>
</template> 