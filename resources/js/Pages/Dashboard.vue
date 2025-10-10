<script setup>
import { Head } from "@inertiajs/vue3";
import { mdiChartTimelineVariant, mdiAccount, mdiMail, mdiChartPie } from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionMain from "@/Components/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import CardBoxWidget from "@/Components/CardBoxWidget.vue";
import CardBox from "@/Components/CardBox.vue";


</script>

<template>
  
  <Head title="Dashboard" />

  
  <LayoutAuthenticated>
    
    <SectionMain>
      
      
      <SectionTitleLineWithButton
        :icon="mdiChartTimelineVariant"
        title="Dashboard"
        main
      >
        
      </SectionTitleLineWithButton>

     
      <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 mb-6">
        <CardBoxWidget
          trend="12%"
          trend-type="up"
          color="text-emerald-500"
          :icon="mdiAccount"
          :number="512"
          label="Clientes"
        />
        <CardBoxWidget
          trend="12%"
          trend-type="down"
          color="text-blue-500"
          :icon="mdiMail"
          :number="777"
          label="Ventas"
        />
        <CardBoxWidget
          trend="Overflow"
          trend-type="alert"
          color="text-red-500"
          :icon="mdiChartPie"
          :number="256"
          suffix="%"
          label="Rendimiento"
        />
      </div>

      <!-- Contenedor principal para contenido más complejo como gráficos o tablas -->
      <CardBox>
        <div class="p-6 text-center">
          <h2 class="text-xl font-semibold mb-2 dark:text-white">
            ¡Bienvenido a tu Dashboard!
          </h2>
          <p class="text-gray-500 dark:text-slate-400">
            Este es un espacio de trabajo limpio. Puedes empezar a agregar tus propios
            componentes, gráficos y tablas aquí.
          </p>
        </div>
      </CardBox>

    </SectionMain>
  </LayoutAuthenticated>
</template>