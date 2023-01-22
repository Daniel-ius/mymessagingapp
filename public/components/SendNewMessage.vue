<template>
  <div class="col-12 px-0">
    <form @submit.prevent="createMessage">
      <input type="text" v-model="newMessage.username" placeholder="Username" />
      <input type="text" v-model="newMessage.message" placeholder="Message" />
      <button type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
    </form>
  </div>



</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      newMessage: {
        username: '',
        message: ''
      }
    }
  },
  methods: {
    createMessage() {
      this.newMessage.message=this.newMessage.message.replace(':)','😊')
      axios.post('http://localhost:8000/create_message', this.newMessage)
          .then(response => {
            console.log(response);
            this.newMessage.message='';
            this.newMessage.username='';
          })
          .catch(error => {
            console.log(error);
          });
    },
  }
}
</script>
