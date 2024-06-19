<template>
    <div>
      <h2>{{ video.title }}</h2>
      <video :src="video.path" controls></video>
      <p>{{ video.description }}</p>
      <div>
        <h3>Комментарии</h3>
        <ul>
          <li v-for="comment in video.comments" :key="comment.id">{{ comment.content }}</li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    props: {
      id: {
        type: string,
        required: true
      }
    },
    data() {
      return {
        video: {
          title: '',
          path: '',
          description: '',
          comments: []
        }
      };
    },
    async created() {
      try {
        const response = await axios.get(`/api/videos/${this.id}`);
        this.video = response.data;
      } catch (error) {
        console.error('Ошибка загрузки видео:', error);
      }
    }
  };
  </script> 
  