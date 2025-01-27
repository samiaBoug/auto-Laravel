# **Integration Guide:**

1. Create a new Laravel project:
```shell
composer create-project laravel/laravel example-app
```

2. Install Laravel related npm dependencies:
```shell
npm i
```

3. install Vue.js:
```shell
npm install vue vue-router@4 @vitejs/plugin-vue
```

4. add Vite’s plugin for Vue in `vite.config.js` file:
```shell
import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
	plugins: [
		vue(),
		laravel({
			 input: ["resources/css/app.css", "resources/js/app.js"],
			 refresh: true,
		}),
	],
	resolve: {
		alias: {
			vue: "vue/dist/vue.esm-bundler.js",
		},
	},
});
```

6. Create `App.vue` file in `./resources/js`:
```vue
<template>
	<router-view v-slot="{ Component, route }">
		<div :key="route.name">
			<Component :is="Component" />
		</div>
	</router-view>
</template>
```

7. Modify `./resources/js/app.js` file:
```js
import "./bootstrap";
import router from "./router/router";
import { createApp } from "vue";

import App from "./App.vue";
	
createApp(App).use(router).mount("#app");
```

8. Change `./resources/views/welcome.blade.php` file to:
```html
<head>
	@vite(['resources/js/app.js'])
</head>

<body>
	<div id="app"></div>
</body>
```

9. Create `./resources/js/Pages/HomeRoute.vue` :
```
<template> 
	<h2>HOME</h2>
	<router-link to="/test"> Take me to Test page </router-link>
</template>
```

10. create another page `./resources/js/Pages/TestRoute.vue`:
```vue
<template>
	<p>I'm here to test!</p>
</template>
```

12. create a new file `./resources/js/router.js`:
```js
import { createRouter, createWebHistory } from "vue-router";

const routes = [
	{
	 path: "/",
	 component: () => import("./Pages/HomeRoute.vue"),
	},
	{
	 path: "/test",
	 component: () => import("./Pages/TestRoute.vue"),
	},

	// other routes
];

export default createRouter({ 
	history: createWebHistory(),
	routes,
});
```

## Sending/Resaving data from server:

11. Install axios:
```shell
npm install axios
```

12. Create a testing API endpoint in `routes/web.php` :
```php
Route::get("/hello", function () {
	return response()->json(['message' => 'Hello World']);
});
```

13. Add `getValue()` function to `HomeRoute.vue` page:
```vue
<script setup>
import axios from "axios";
import { ref } from "vue";

// Define the ref
const response = ref(null);

// Function to fetch data from the API
const getValue = async () => {
    response.value = await axios.get("/hello");
};
</script>

<template>
    <div>
        <h2>HOME</h2>
        <router-link to="/test">Take me to Test page</router-link>
        <button @click.prevent="getValue">Trigger Endpoint</button>
        <p v-if="response">{{ response.data.message }}</p>
    </div>
</template>
```
