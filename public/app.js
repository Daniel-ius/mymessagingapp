import {createApp} from "vue";
import App from "./components/App.vue";
import SendNewMessage from "./components/SendNewMessage.vue";
import MessageList from "./components/MessageList.vue";

const apps=createApp(App)
apps.component('SendNewMessage', SendNewMessage)
apps.component('MessageList',MessageList)
apps.mount("#app");