<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { mdiAccount, mdiAsterisk, mdiEmail } from "@mdi/js";
import LayoutGuest from "@/Layouts/LayoutGuest.vue";
import SectionFullScreen from "@/Components/SectionFullScreen.vue";
import CardBox from "@/Components/CardBox.vue";
import FormValidationErrors from "@/Components/FormValidationErrors.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import HeadLogo from "@/Components/HeadLogo.vue";

const form = useForm({
  name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post(route("register")); // Cambiar según tu ruta de register normal
};
</script>

<template>
  <HeadLogo title="Registro" />
  <LayoutGuest>
    <SectionFullScreen bg="white">
      <div class="w-[450px] mx-auto py-10">
        <CardBox rounded="rounded-lg" padding="p-6" is-form @submit.prevent="submit">
          <h1 class="mb-4 text-center text-2xl lg:text-3xl font-bold dark:text-white">
            Crear una cuenta
          </h1>

          <FormValidationErrors class="mt-4" />

          <!-- Nombre -->
          <FormField required textClass="dark:text-white" label="Nombre completo:" :error="form.errors.name">
            <FormControl v-model="form.name" :icon="mdiAccount" placeholder="Nombre completo" required />
          </FormField>

          <!-- Email -->
          <FormField required textClass="dark:text-white" label="Correo electrónico:" :error="form.errors.email">
            <FormControl v-model="form.email" :icon="mdiEmail" type="email" placeholder="Correo electrónico" required />
          </FormField>

          <!-- Password -->
          <FormField required textClass="dark:text-white" label="Contraseña:" :error="form.errors.password">
            <FormControl v-model="form.password" :icon="mdiAsterisk" type="password" placeholder="Contraseña" required />
          </FormField>

          <!-- Confirmar Password -->
          <FormField required textClass="dark:text-white" label="Confirmar contraseña:" :error="form.errors.password_confirmation">
            <FormControl v-model="form.password_confirmation" :icon="mdiAsterisk" type="password" placeholder="Confirmar contraseña" required />
          </FormField>

          <BaseButtons class="mt-6">
            <BaseButton
              class="w-full"
              type="submit"
              color="info"
              label="Crear cuenta"
              :class="{ 'opacity-25': form.processing }"
              :procesing="form.processing"
            />
          </BaseButtons>
        </CardBox>
      </div>
    </SectionFullScreen>
  </LayoutGuest>
</template>
