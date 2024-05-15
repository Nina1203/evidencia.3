<template>
  <div class="container">
    <h1>Order Registration</h1>
    <form @submit.prevent="submitOrder">
      <label for="invoiceNumber">Invoice Number:</label>
      <input type="text" v-model="invoiceNumber" id="invoiceNumber" name="invoiceNumber">
      <label for="customerName">Customer Name:</label>
      <input type="text" v-model="customerName" id="customerName" name="customerName">
      <label for="customerNumber">Customer Number:</label>
      <input type="text" v-model="customerNumber" id="customerNumber" name="customerNumber">
      <label for="fiscalData">Fiscal Data:</label>
      <textarea v-model="fiscalData" id="fiscalData" name="fiscalData"></textarea>
      <label for="orderDate">Order Date:</label>
      <input type="date" v-model="orderDate" id="orderDate" name="orderDate">
      <label for="deliveryAddress">Delivery Address:</label>
      <textarea v-model="deliveryAddress" id="deliveryAddress" name="deliveryAddress"></textarea>
      <label for="notes">Notes:</label>
      <textarea v-model="notes" id="notes" name="notes"></textarea>
      <button type="submit">Submit Order</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      invoiceNumber: '',
      customerName: '',
      customerNumber: '',
      fiscalData: '',
      orderDate: '',
      deliveryAddress: '',
      notes: ''
    };
  },
  methods: {
    submitOrder() {
      // Prepare data for submission
      const formData = {
        status: 'Pending', // Adjust as needed
        notes: this.notes,
        data_time: new Date().toISOString(), // Adjust as needed
        invoice_number: this.invoiceNumber,
        customer_number: this.customerNumber,
        customer_name: this.customerName,
        fiscal_data: this.fiscalData,
        order_date: this.orderDate,
        delivery_address: this.deliveryAddress
      };

      // Send data to server
      fetch('http://localhost:8000/api/v1/orders', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
      })
      .then(response => response.json())
      .then(data => {
        console.log('Success:', data);
        alert("Order submitted successfully!");
        this.resetForm();
      })
      .catch((error) => {
        console.error('Error:', error);
        alert("Error submitting order!");
      });
    },
    resetForm() {
      // Reset form fields
      this.invoiceNumber = '';
      this.customerName = '';
      this.customerNumber = '';
      this.fiscalData = '';
      this.orderDate = '';
      this.deliveryAddress = '';
      this.notes = '';
    }
  }
};
</script>

<style>
body {
  font-family: 'Roboto', sans-serif; /* Cambiado el tipo de fuente */
  background-color: #f9f9f9; /* Añadido color de fondo al body */
  margin: 0;
  padding: 0;
}
.container {
  max-width: 600px; /* Reducido el tamaño máximo del contenedor */
  margin: 40px auto; /* Añadido margen superior */
  padding: 30px; /* Aumentado padding */
  background-color: #fff; /* Añadido color de fondo blanco */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Añadido sombra */
  border-radius: 8px; /* Aumentado borde redondeado */
}
h1 {
  text-align: center;
  color: #333; /* Cambiado color del texto */
  margin-bottom: 20px; /* Añadido margen inferior */
}
form {
  margin-bottom: 20px;
}
label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold; /* Añadido negrita */
  color: #666; /* Cambiado color del texto */
}
input[type="text"],
input[type="date"],
textarea {
  width: 100%;
  padding: 10px; /* Aumentado padding */
  margin-bottom: 15px; /* Aumentado margen inferior */
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-size: 16px; /* Aumentado tamaño de fuente */
}
button {
  background-color: #007bff; /* Cambiado color de fondo */
  color: white;
  padding: 12px 20px; /* Ajustado padding */
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px; /* Aumentado tamaño de fuente */
}
button:hover {
  background-color: #0056b3; /* Cambiado color de fondo en hover */
}
</style>
