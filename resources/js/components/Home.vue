  
<template>   
<div><h2>Домашняя страница</h2>     
<ul><li v-for="video in videos" :key="video.id">
 <router-link :to="{ name: "ViewVideo", params: { id: video.id } }">{{ video.title }}</router-link>
 </li> 
 </ul>
 </div> 
 </template>  
 <script> import axios from "axios";  
 export default {   
    data() {     
        return {       
            videos: []     
            };   
            },   
            async created() {     
                try {      
                    const response = await axios.get("/api/videos");
                           this.videos = response.data;
                                } catch (error) {
                                           console.error("Ошибка загрузки видео:", error);
                                                }   } 
                                                }; 
                                                </script>
