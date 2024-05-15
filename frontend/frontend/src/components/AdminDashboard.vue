<template>
  <div class="container">
    <h1>Admin Dashboard</h1>
    <form @submit.prevent="registerUser">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" v-model="name" id="name" name="name">
      </div>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" v-model="username" id="username" name="username">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" v-model="password" id="password" name="password">
      </div>
      <div class="form-group">
        <label for="role">Role:</label>
        <select v-model="role" id="role" name="role">
          <option value="1">Admin</option>
          <option value="2">Sales</option>
          <option value="3">Purchasing</option>
          <option value="4">Warehouse</option>
          <option value="5">Route</option>
        </select>
      </div>
      <button type="submit">Register User</button>
    </form>
    <h2>User List</h2>
    <ul class="user-list">
      <li v-for="(user, index) in userList" :key="index">
        <span>Name: {{ user.name }}</span>,
        <span>Username: {{ user.user_name }}</span>,
        <span>Role: {{ user.role_id }}</span>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      username: '',
      password: '',
      role: '', 
      userList: []
    };
  },
  methods: {
    registerUser() {
      const newUser = {
        name: this.name,
        user_name: this.username,
        password: this.password,
        role_id: this.role
      };

      fetch('http://localhost:8000/api/v1/workers/', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
        body: JSON.stringify(newUser)
      })
      .then(response => {
        if (!response.ok) {
          throw new Error('Error al registrar el usuario.');
        }
        return response.json();
      })
      .then(data => {
        this.userList.push(data);
        this.name = '';
        this.username = '';
        this.password = '';
        this.role = 1; // Restablecer el rol al valor predeterminado (Admin)
      })
      .catch(error => {
        console.error('Error:', error);
      });
    }
  }
};
</script>

<style>
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f9f9f9;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
h1 {
  text-align: center;
  color: #333;
}
form {
  margin-bottom: 20px;
}
.form-group {
  margin-bottom: 15px;
}
label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}
input[type="text"],
input[type="password"],
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button:hover {
  background-color: #45a049;
}
.user-list {
  list-style-type: none;
  padding: 0;
}
.user-list li {
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 10px;
  margin-bottom: 10px;
  background-color: #fff;
  display: flex;
  justify-content: space-between;
}
.user-list span {
  margin-right: 10px;
}
</style>
