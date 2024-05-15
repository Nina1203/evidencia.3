<template>
  <div class="container">
    <h1>Order Management</h1>
    <h2>Orders in Process and Pending</h2>
    <ul class="order-list">
      <li v-for="(order, index) in filteredOrders" :key="index">
        <div class="order-info">
          <span>Invoice Number: {{ order.invoice_number }},</span>
          <span v-if="order.customer">Customer Name: {{ order.customer.name }},</span>
          <span>Status: {{ order.status }}</span>
        </div>
        <button @click="updateOrderStatus(order)">Change Status</button>
      </li>
    </ul>
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
    this.fetchOrders();
  },
  methods: {
    fetchOrders() {
      axios.get('http://localhost:8000/api/v1/orders')
        .then(response => {
          this.orders = response.data;
        })
        .catch(error => {
          alert('Error: ' + error.message);
        });
    },
    updateOrderStatus(order) {
      let newStatus = order.status === 'In process' ? 'In route' : 'In process';
      axios.put(`http://localhost:8000/api/v1/orders/${order.id}`, { status: newStatus })
        .then(response => {
          if (response.data.message) {
            order.status = newStatus;
            alert(response.data.message);
          } else {
            alert('Error: ' + response.data.error);
          }
        })
        .catch(error => {
          alert('Error: ' + error.message);
        });
    }
  },
  computed: {
    filteredOrders() {
      return this.orders.filter(order => order.status === 'In process' || order.status === 'Pending');
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
  margin: 40px auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

h1, h2 {
  text-align: center;
  color: #333;
}

.order-list {
  list-style-type: none;
  padding: 0;
}

.order-list li {
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 15px;
  margin-bottom: 15px;
  transition: transform 0.2s, box-shadow 0.2s;
}

.order-list li:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.order-info {
  margin-bottom: 10px;
  color: #555;
}

.order-info span {
  display: inline-block;
  margin-right: 15px;
}

button {
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 10px;
  display: block;
  width: fit-content;
  margin-left: auto;
  margin-right: auto;
}

button:hover {
  background-color: #0056b3;
}
</style>

