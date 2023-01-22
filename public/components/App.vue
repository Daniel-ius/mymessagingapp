<template>
  <div class="container py-5 px-4">

    <div class="row rounded-lg overflow-hidden shadow">
      <!-- Chat Box-->
      <div class="col-12 px-0">
        <div class="px-4 py-5 chat-box bg-white">
          <MessageList></MessageList>
        </div>

        <!-- Typing area -->
        <form action="#" class="bg-light">
          <div class="input-group">
            <SendNewMessage></SendNewMessage>
          </div>
        </form>

      </div>
    </div>
  </div>
</template>

<script>
import SendNewMessage from "./SendNewMessage.vue"
import MessageList from "./MessageList.vue";
export default {
  name: "App",
  components: {
    MessageList,
    SendNewMessage
  }
}
</script>

<style scoped>

</style>