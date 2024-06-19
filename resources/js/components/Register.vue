<template>
    <div>
      <h2>Регистрация</h2>
      <form @submit.prevent="register">
        <div>
          <label for="name">Имя:</label>
          <input type="text" id="name" v-model="name" required>
        </div>
        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="email" required>
        </div>
        <div>
          <label for="password">Пароль:</label>
          <input type="password" id="password" v-model="password" required>
        </div>
        <button type="submit">Зарегистрироваться</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        name: '',
        email: '',
        password: ''
      };
    },
    methods: {
      async register() {
        try {
          const response = await axios.post('/api/register', {
            name: this.name,
            email: this.email,
            password: this.password
          });
          console.log('Регистрация успешна:', response.data);
          // Перенаправление на страницу входа или домашнюю страницу
        } catch (error) {
          console.error('Ошибка регистрации:', error);
        }
      }
    }
  };
  </script>
  