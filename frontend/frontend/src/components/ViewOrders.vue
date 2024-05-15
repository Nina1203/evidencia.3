<template>
  <div class="main-container">
    <h1>Order Overview</h1>
    <h2>Current Orders</h2>
    <table>
      <thead>
        <tr>
          <th>Invoice No.</th>
          <th>Client ID</th>
          <th>Photo Reference</th>
          <th>Order Date</th>
          <th>Order Status</th>
          <th>Manage</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(order, index) in orders" :key="index">
          <td>{{ order.invoice_number }}</td>
          <td>{{ order.customer_id }}</td>
          <td>{{ order.photo_id }}</td>
          <td>{{ order.data_time }}</td>
          <td>{{ order.status }}</td>
          <td>
            <button @click="removeOrder(order.id)">Remove</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      orders: []
    };
  },
  mounted() {
    this.retrieveOrders();
  },
  methods: {
    retrieveOrders() {
      axios.get('http://localhost:8000/api/v1/orders/')
        .then(response => {
          this.orders = response.data;
        })
        .catch(error => {
          console.error('Error retrieving orders:', error);
        });
    },
    removeOrder(orderId) {
      // Implement remove functionality here if needed
    }
  }
};
</script>

<style>
body {
  font-family: 'Verdana', sans-serif; /* Cambiado el tipo de fuente */
  background-color: #e8f0fe; /* Añadido color de fondo */
  margin: 0;
  padding: 0;
}
.main-container {
  max-width: 850px; /* Ajustado el tamaño máximo del contenedor */
  margin: 30px auto; /* Añadido margen superior */
  padding: 25px;
  background-color: #ffffff; /* Añadido color de fondo blanco */
  box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); /* Añadido sombra ligera */
  border-radius: 10px; /* Añadido borde redondeado */
}
h1, h2 {
  text-align: center;
  color: #444; /* Cambiado color del texto */
}
table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 25px;
}
th, td {
  border: 1px solid #ddd;
  padding: 14px; /* Aumentado padding */
  text-align: left;
}
th {
  background-color: #ececec;
  font-weight: bold; /* Añadido negrita */
}
tbody tr:nth-child(even) {
  background-color: #fafafa; /* Añadido color de fondo a filas pares */
}
button {
  background-color: #ff6b6b; /* Cambiado color de fondo del botón */
  color: white;
  padding: 9px 18px; /* Ajustado padding */
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button:hover {
  background-color: #e05a5a; /* Cambiado color de fondo del botón en hover */
}
</style>
