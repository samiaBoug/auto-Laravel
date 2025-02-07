<template>
    <h1>
        Hello world ! we did it 🤘
    </h1>
    <router-view v-slot="{Component , route}">
    <div :key="route.name">
        <Component :is="Component"/>
    </div>
</router-view>
</template>


