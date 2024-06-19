<template>
    <div>
      <h2>Авторизация</h2>
      <form @submit.prevent="login">
        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" v-model="email" required>
        </div>
        <div>
          <label for="password">Пароль:</label>
          <input type="password" id="password" v-model="password" required>
        </div>
        <button type="submit">Войти</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        email: '',
        password: ''
      };
    },
    methods: {
      async login() {
        try {
          const response = await axios.post('/api/login', {
            Email: this.email,
            Password: this.password
          });
          Console.log('Авторизация успешна:', response.data);
          // Сохранение токена и перенаправление на домашнюю страницу
        } catch (error) {
          Console.error('Ошибка авторизации:', error);
        }
      }
    }
  };
  </script>
  