<script setup>
defineProps({
  msg: {
    type: String,
    required: true
  }
})
</script>

<template>
  <div class="greetings">
    <h1 class="highlight">{{ msg }}</h1>
    <h3>
      You’ve successfully created a project with
      <a href="https://vitejs.dev/" target="_blank" rel="noopener">Vite</a> +
      <a href="https://vuejs.org/" target="_blank" rel="noopener">Vue 3</a>.
    </h3>
  </div>
</template>

<style scoped>
h1 {
  font-weight: 600; /* Incrementado el peso de la fuente */
  font-size: 2.8rem; /* Incrementado el tamaño de la fuente */
  position: relative;
  top: 0; /* Ajustado para una mejor alineación */
  margin-bottom: 20px; 
}

h3 {
  font-size: 1.4rem; /* Incrementado el tamaño de la fuente */
  margin-top: 10px; /* Añadido margen superior */
}

.greetings h1,
.greetings h3 {
  text-align: center;
  color: #2c3e50; /* Color de texto cambiado */
}

.greetings h1 {
  color: #42b983; /* Color especial para el h1 */
}

a {
  color: #3498db; /* Color del enlace */
  text-decoration: none; /* Eliminado el subrayado */
}

a:hover {
  text-decoration: underline; /* Subrayado en hover */
}

@media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: left;
    margin-left: 20px; /* Añadido margen izquierdo para mayor separación en pantallas grandes */
  }
}
</style>
