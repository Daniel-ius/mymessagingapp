<script>
import axios from "axios";

export default {
  data() {
    return {
      messages: []
    }
  },
  created() {
    axios.get('http://localhost:8000/show_message')
        .then(response => {
          this.messages = response.data;
        })
        .catch(error => {
          console.log(error);
        });
      setInterval(()=>{
        axios.get('http://localhost:8000/show_message')
            .then(response => {
              this.messages = response.data;
            })
            .catch(error => {
              console.log(error);
            });
      },5000)
    }
}
</script>
<template>
  <div>
    <div v-for="message in messages" :key="message.id">
      <div class="media-body ml-3">
        <div class="bg-light rounded py-2 px-3 mb-2">
      <p class="text-small mb-0 text-black">
        {{ message.username }}: {{ message.message }}</p>
        </div>
      </div>
    </div>
  </div>
</template>