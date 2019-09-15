<template>
    <div>
        <router-link :to="{ name :'home'}">home</router-link>
        <router-link :to="{ name :'singel'}">singel</router-link>
         <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>