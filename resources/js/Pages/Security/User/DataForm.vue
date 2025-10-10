<script setup>
import { inject, ref } from "vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import JetInputError from "@/Components/InputError.vue";
import BaseButton from "@/Components/BaseButton.vue";

const form = inject("form");
const propsData = inject("propsData");

// Funciones para manejar roles
const checkedRole = (role) => {
    return form.roles.includes(role.id);
};

const toggleRole = (role) => {
    const index = form.roles.indexOf(role.id);
    if (index === -1) {
        form.roles.push(role.id);
    } else {
        form.roles.splice(index, 1);
    }
};
</script>

<template>
    <!-- Nombre -->
    <FormField required label="Nombre completo:" :error="form.errors.name">
        <FormControl v-model="form.name" placeholder="Nombre completo" />
    </FormField>

    <!-- Email -->
    <FormField required label="Correo electrónico:" :error="form.errors.email">
        <FormControl v-model="form.email" type="email" placeholder="Correo electrónico" />
    </FormField>

    <!-- Password -->
    <FormField required label="Contraseña:" :error="form.errors.password">
        <FormControl v-model="form.password" type="password" placeholder="Contraseña" />
    </FormField>

    <!-- Confirmar Password -->
    <FormField required label="Confirmar contraseña:" :error="form.errors.password_confirmation">
        <FormControl v-model="form.password_confirmation" type="password" placeholder="Confirmar contraseña" />
    </FormField>

    <!-- Roles -->
    <FormField required label="Selecciona un rol:" help="Puedes asignarle uno o más roles al usuario">
        <table class="mb-5">
            <thead>
                <tr>
                    <th>Seleccionar</th>
                    <th>Nombre de Rol</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="role in propsData.roles" :key="role.id">
                    <td>
                        <input type="checkbox" :id="'role_' + role.id" :checked="checkedRole(role)" @change="toggleRole(role)" />
                    </td>
                    <td>{{ role.name }}</td>
                    <td>{{ role.description }}</td>
                </tr>
            </tbody>
        </table>
    </FormField>
</template>
