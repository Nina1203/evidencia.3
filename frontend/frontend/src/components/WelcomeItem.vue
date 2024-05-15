<template>
  <div class="card">
    <i>
      <slot name="icon"></slot>
    </i>
    <div class="content">
      <h3>
        <slot name="title"></slot>
      </h3>
      <slot></slot>
    </div>
  </div>
</template>

<style scoped>
.card {
  margin-top: 2.5rem; /* Aumentado margen superior */
  display: flex;
  position: relative;
  background-color: #f9f9f9; /* Añadido color de fondo */
  border-radius: 10px; /* Añadido borde redondeado */
  padding: 1rem; /* Añadido padding */
}

.content {
  flex: 1;
  margin-left: 1.5rem; /* Aumentado margen izquierdo */
}

i {
  display: flex;
  align-items: center; /* Cambiado place-items a align-items */
  justify-content: center; /* Cambiado place-content a justify-content */
  width: 36px; /* Aumentado ancho */
  height: 36px; /* Aumentado alto */
  background-color: #e0e0e0; /* Añadido color de fondo */
  border-radius: 50%; /* Añadido borde redondeado completo */
  color: var(--color-icon, #000); /* Añadido color por defecto */
}

h3 {
  font-size: 1.4rem; /* Aumentado tamaño de fuente */
  font-weight: 600; /* Cambiado peso de la fuente */
  margin-bottom: 0.5rem; /* Aumentado margen inferior */
  color: var(--color-title, #333); /* Añadido color por defecto */
}

@media (min-width: 1024px) {
  .card {
    margin-top: 0;
    padding: 1rem 0 1.2rem calc(var(--section-gap) / 2);
    background-color: #fff; /* Cambiado color de fondo */
  }

  i {
    top: calc(50% - 25px);
    left: -28px; /* Ajustado posición */
    position: absolute;
    border: 2px solid var(--color-border, #ccc); /* Aumentado borde y color por defecto */
    background: var(--color-bg, #fff); /* Añadido color de fondo por defecto */
    border-radius: 12px; /* Ajustado borde redondeado */
    width: 52px; /* Aumentado ancho */
    height: 52px; /* Aumentado alto */
  }

  .card:before {
    content: '';
    border-left: 2px solid var(--color-border, #ccc); /* Aumentado borde y color por defecto */
    position: absolute;
    left: 0;
    bottom: calc(50% + 26px);
    height: calc(50% - 26px);
  }

  .card:after {
    content: '';
    border-left: 2px solid var(--color-border, #ccc); /* Aumentado borde y color por defecto */
    position: absolute;
    left: 0;
    top: calc(50% + 26px);
    height: calc(50% - 26px);
  }

  .card:first-of-type:before {
    display: none;
  }

  .card:last-of-type:after {
    display: none;
  }
}
</style>
