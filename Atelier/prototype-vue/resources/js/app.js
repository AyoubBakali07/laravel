import { createApp } from 'vue';
// import ExampleComponent from './components/ExampleComponent.vue';
import App from './App.vue';
const app = createApp(App);
// app.component('example-component', ExampleComponent);
app.mount('#app'); // This should match the <div id="app"> in your Blade file
