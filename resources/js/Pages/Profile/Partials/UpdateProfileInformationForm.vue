<script setup>
import {
    mdiAccount,
    mdiEmail,
    mdiAccountStar,
    mdiTrashCan,
    mdiContentSave,
    mdiDomain,
} from "@mdi/js";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import JetInputError from "@/Components/InputError.vue";
import { useForm } from '@inertiajs/vue3';
import { computed, inject } from "vue";

// Inyectamos el usuario desde el componente padre
const user = inject('user');

// Aseguramos que roles siempre sea un array
const roles = computed(() => (user.roles ?? []).map(role => role.name));

// Formulario reactivo con Inertia
const form = useForm({
    _method: 'patch',
    id: user.id,
    name: user.name,
    email: user.email,
    institution: user.institution?.name ?? 'Sin registro',
    photo: null,
});

// Computed para la imagen de perfil
const getImage = computed(() => {
    if (form.photo) return URL.createObjectURL(form.photo);
    if (user.file) return user.file.path;
    return 'img/user.jpg';
});

// Manejo de carga de archivo
const handleFileInput = (event) => {
    form.photo = event.target.files[0];
};

// Guardar cambios
const saveForm = () => {
    form.post(route('profile.update'), {
        onError: (errors) => console.log(errors),
    });
};

// Eliminar foto
const deletePhoto = () => {
    form.delete(route('profile.destroyPhoto'), {
        onError: (errors) => console.log(errors),
    });
};
</script>

<template>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-slate-100">Información personal</h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-slate-400">
            Actualice la información del perfil y la dirección de correo electrónico de su cuenta.
        </p>
    </header>

    <form @submit.prevent="saveForm" class="mt-6 space-y-6">
        <div class="md:flex md:space-x-4 mb-5">
            <!-- Imagen de perfil -->
            <div class="md:w-1/4 max-lg:mb-5">
                <img :src="getImage" class="rounded w-full h-60 object-cover">
                <div class="mt-2 flex space-x-2">
                    <FormControl @input="handleFileInput" type="file" height="h-10.5" />
                    <BaseButton class="w-1/4" :icon="mdiTrashCan" color="danger" @click="deletePhoto" />
                </div>
                <JetInputError :message="form.errors.photo" />
            </div>

            <!-- Datos personales -->
            <div class="md:w-3/4">
                <FormField label="Nombre completo:" :error="form.errors.name">
                    <FormControl v-model="form.name" :icon="mdiAccount" placeholder="Nombre completo" disabled />
                </FormField>

                <FormField label="Correo Electrónico:" :error="form.errors.email">
                    <FormControl v-model="form.email" :icon="mdiEmail" placeholder="Correo Electrónico" disabled />
                </FormField>

                <FormField label="Institución:" :error="form.errors.institution_id">
                    <FormControl v-model="form.institution" :icon="mdiDomain" placeholder="Institución de procedencia" disabled />
                </FormField>
            </div>
        </div>

        <!-- Roles -->
        <div class="md:flex md:space-x-4">
            <FormField class="w-full" label="Rol en el sistema:">
                <FormControl disabled v-model="roles" :icon="mdiAccountStar" />
            </FormField>
        </div>

        <!-- Botón guardar -->
        <div class="flex items-center gap-4">
            <BaseButton title="Guardar" @click="saveForm" :icon="mdiContentSave" color="success"
                label="Guardar foto" />
            <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Guardado.</p>
            </Transition>
        </div>
    </form>
</section>
</template>
