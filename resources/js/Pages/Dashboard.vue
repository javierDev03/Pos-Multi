<script setup>
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import CardBox from "@/Components/CardBox.vue";
import TemplatesGuide from "@/Components/TemplatesGuide.vue";
import HeadLogo from "@/Components/HeadLogo.vue";

const props = defineProps({
  data: { type: Object, default: null },
  role: { type: String, required: true },
});

const getTrendPostulants = () => {
  const trendNumber = props.data?.newPostulantsThisWeek || 0;
  return trendNumber > 0 ? `+${trendNumber} esta semana` : "Sin nuevos registros";
};
</script>

<template>
  <Head title="Dashboard" />
  <HeadLogo title="Inicio" />
  <LayoutAuthenticated>
    <div class="space-y-6">
      <template v-if="role === 'Admin' || role === 'Editor'">
        <CardBox>
          <div class="text-center py-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">
              Postulantes Totales: {{ data?.postulants ?? 0 }}
            </h3>
            <p class="text-gray-600 dark:text-gray-400">
              {{ getTrendPostulants() }}
            </p>
          </div>
        </CardBox>
      </template>

      <template v-else-if="role === 'Postulante'">
        <CardBox>
          <TemplatesGuide />
        </CardBox>
      </template>

      <template v-else>
        <CardBox>
          <div class="text-center py-12">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-2">
              Bienvenido al sistema
            </h3>
            <p class="text-gray-600 dark:text-gray-400">
              Selecciona una opción del menú para comenzar
            </p>
          </div>
        </CardBox>
      </template>
    </div>
  </LayoutAuthenticated>
</template>

<style scoped>
/* Puedes agregar estilos básicos aquí si quieres */
</style>
