<template>
  <div class="container">
    <h1>Delivery Page</h1>
    <form @submit.prevent="searchDelivery">
      <div class="form-group">
        <label for="invoiceNumber">Invoice number:</label>
        <input type="text" v-model="invoiceNumber" id="invoiceNumber" name="invoiceNumber">
      </div>
      <div class="form-group">
        <label for="customerNumber">Customer Number:</label>
        <input type="text" v-model="customerNumber" id="customerNumber" name="customerNumber">
      </div>
      <button type="submit">Search</button>
    </form>
    <div class="delivery-status">
      <h2>Delivery Status</h2>
      <p v-if="deliveryInfo">{{ deliveryInfo }}</p>
      <img v-if="showDeliveryPhoto" class="delivery-photo" :src="deliveryPhotoURL" alt="Delivery Photo">
      <p v-if="errorMessage" class="error">{{ errorMessage }}</p>
    </div>
  </div>
  <router-link class="login-link" to="/login">Login</router-link>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      invoiceNumber: '',
      customerNumber: '',
      deliveryInfo: '',
      showDeliveryPhoto: false,
      deliveryPhotoURL: '',
      errorMessage: ''
    };
  },
  methods: {
    searchDelivery() {
      axios.get('http://localhost:8000/api/v1/orders/show', {
          params: {
            invoiceNumber: this.invoiceNumber,
            customerNumber: this.customerNumber
          }
        })
        .then(response => {
          this.errorMessage = '';
          const data = response.data;
          if (data.error) {
            this.deliveryInfo = '';
            this.showDeliveryPhoto = false;
            this.deliveryPhotoURL = '';
            this.errorMessage = data.error;
          } else {
            this.deliveryInfo = data.status;
            this.showDeliveryPhoto = data.status === 'Delivered';
            this.deliveryPhotoURL = data.photo_url ? data.photo_url : '';
          }
        })
        .catch(error => {
          this.deliveryInfo = '';
          this.showDeliveryPhoto = false;
          this.deliveryPhotoURL = '';
          this.errorMessage = 'Error fetching delivery status';
          console.error(error);
        });
    }
  }
};
</script>

<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f9;
}
.container {
  margin: 0 auto;
  padding: 20px;
  max-width: 600px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
  text-align: center;
}
h1 {
  color: #333;
  margin-bottom: 20px;
}
form {
  margin-bottom: 20px;
}
.form-group {
  margin-bottom: 15px;
}
label {
  display: inline-block;
  margin-bottom: 5px;
  font-weight: bold;
}
input[type="text"] {
  width: calc(100% - 22px);
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}
button {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
}
button:hover {
  background-color: #0056b3;
}
.delivery-status {
  margin-top: 20px;
}
.delivery-photo {
  max-width: 100%;
  height: auto;
  margin-top: 20px;
  border: 1px solid #ddd;
  border-radius: 4px;
}
.error {
  color: red;
  font-weight: bold;
}
.login-link {
  display: inline-block;
  margin-top: 20px;
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border-radius: 4px;
  text-decoration: none;
}
.login-link:hover {
  background-color: #0056b3;
}
</style>
