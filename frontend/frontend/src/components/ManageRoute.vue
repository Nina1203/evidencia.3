<template>
  <div class="container">
    <h1>Route Management</h1>

    <h2>Upload Photo of Loaded Unit</h2>
    <form @submit.prevent="uploadLoadedUnitPhoto">
      <label for="loadedUnitPhoto">Upload Photo:</label>
      <input type="file" id="loadedUnitPhoto" name="loadedUnitPhoto" accept="image/*">
      <button type="submit">Upload Photo</button>
    </form>

    <h2>Upload Photo of Unloaded Material</h2>
    <form @submit.prevent="uploadUnloadedMaterialPhoto">
      <label for="unloadedMaterialPhoto">Upload Photo:</label>
      <input type="file" id="unloadedMaterialPhoto" name="unloadedMaterialPhoto" accept="image/*">
      <button type="submit">Upload Photo</button>
    </form>
  </div>
</template>

<script>
export default {
  methods: {
    uploadLoadedUnitPhoto() {
      alert("Photo of Loaded Unit Uploaded Successfully!");
    },
    uploadUnloadedMaterialPhoto() {
      alert("Photo of Unloaded Material Uploaded Successfully!");
    }
  }
};
</script>

<style>
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Cambiado tipo de fuente */
  background-color: #f0f2f5; /* Añadido color de fondo */
  margin: 0;
  padding: 0;
}

.container {
  max-width: 600px; /* Reducido el tamaño máximo */
  margin: 40px auto; /* Añadido margen superior */
  padding: 30px; /* Aumentado el padding */
  background-color: #fff; /* Añadido color de fondo blanco */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Añadido sombra */
  border-radius: 8px; /* Aumentado el borde redondeado */
}

h1 {
  text-align: center;
  color: #333; /* Cambiado color del texto */
  margin-bottom: 30px; /* Añadido margen inferior */
}

h2 {
  color: #555; /* Cambiado color del texto */
  margin-bottom: 20px; /* Añadido margen inferior */
}

form {
  margin-bottom: 30px; /* Aumentado margen inferior */
}

label {
  display: block;
  margin-bottom: 10px; /* Aumentado margen inferior */
  font-weight: bold; /* Añadido negrita */
  color: #666; /* Cambiado color del texto */
}

input[type="file"] {
  display: block; /* Asegurado que el input sea un bloque */
  margin-bottom: 20px; /* Aumentado margen inferior */
  padding: 5px; /* Añadido padding */
  border: 1px solid #ccc; /* Añadido borde */
  border-radius: 4px; /* Añadido borde redondeado */
}

button {
  background-color: #007bff; /* Cambiado color de fondo */
  color: white;
  padding: 10px 15px; 
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #0056b3; 
}
</style>
