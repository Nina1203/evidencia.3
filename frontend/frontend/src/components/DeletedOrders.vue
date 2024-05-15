<template>
  <div class="container">
    <h1>Deleted Orders</h1>
    <table>
      <thead>
        <tr>
          <th>Invoice Number</th>
          <th>Customer Number</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(order, index) in deletedOrders" :key="index">
          <td>{{ order.invoiceNumber }}</td>
          <td>{{ order.customerNumber }}</td>
          <td>{{ order.date }}</td>
          <td>{{ order.status }}</td>
          <td>
            <button class="edit-button" @click="editDeletedOrder(order.invoiceNumber)">Edit</button>
            <button class="restore-button" @click="restoreOrder(order.invoiceNumber)">Restore</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      deletedOrders: [
        { invoiceNumber: "003", customerNumber: "789", date: "2024-04-03", status: "Deleted" }
        // Agrega más pedidos eliminados aquí si es necesario
      ]
    };
  },
  methods: {
    editDeletedOrder(invoiceNumber) {
      // Lógica para editar un pedido eliminado
      alert("Editing deleted order with invoice number: " + invoiceNumber);
    },
    restoreOrder(invoiceNumber) {
      // Muestra una alerta de confirmación
      alert("The Order has been restored to the Orders List");

      // Encuentra el índice del pedido a restaurar
      const index = this.deletedOrders.findIndex(order => order.invoiceNumber === invoiceNumber);

      // Elimina el pedido de la lista de pedidos eliminados
      const restoredOrder = this.deletedOrders.splice(index, 1)[0];

      // Agrega el pedido restaurado a la lista de pedidos
      // Aquí deberías implementar la lógica para agregar el pedido restaurado a la lista de pedidos activos
      // Por ejemplo, podrías emitir un evento o llamar a un método del componente padre
    }
  }
};
</script>

<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
}
.container {
  max-width: 900px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}
h1 {
  text-align: center;
  color: #333;
  margin-bottom: 20px;
}
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}
th, td {
  border: 1px solid #ddd;
  padding: 12px;
  text-align: left;
}
th {
  background-color: #f7f7f7;
  font-weight: bold;
}
tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}
button {
  padding: 8px 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button.edit-button {
  background-color: #2196F3;
  color: white;
  margin-right: 5px;
}
button.edit-button:hover {
  background-color: #1976D2;
}
button.restore-button {
  background-color: #4CAF50;
  color: white;
}
button.restore-button:hover {
  background-color: #45a049;
}
</style>
