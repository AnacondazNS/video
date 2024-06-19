<template>
    <div>
      <h2>Загрузить видео</h2>
      <form @submit.prevent="uploadvideo">
        <div>
          <label for="title">Заголовок:</label>
          <input type="text" id="title" v-model="title" required>
        </div>
        <div>
          <label for="description">Описание:</label>
          <textarea id="description" v-model="description" required></textarea>
        </div>
        <div>
          <label for="video">Видео:</label>
          <input type="file" id="video" @change="handlefilechange" required>
        </div>
        <button type="submit">Загрузить</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        title: '',
        description: '',
        video: null
      };
    },
    methods: {
      handlefilechange(event) {
        this.video = event.target.files[0];
      },
      async uploadvideo() {
        const formdata = new formdata();
        formdata.append('title', this.title);
        formdata.append('description', this.description);
        formdata.append('video', this.video);
  
        try {
          const response = await axios.post('/api/videos', formdata, {
            headers: {
              'content-type': 'multipart/form-data'
            }
          });
          console.log('Видео загружено:', response.data);
          // перенаправление на страницу видео или домашнюю страницу
        } catch (error) {
          console.error('Ошибка загрузки видео:', error);
        }
      }
    }
  };
  </script> 
  