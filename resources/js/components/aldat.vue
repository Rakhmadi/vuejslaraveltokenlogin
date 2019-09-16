<template>
    <div>
        <ul v-if='datad'>
        <li v-for="data in datad" v-bind:key='data.id'>{{data.id}} {{data.name}} {{data.stock}} {{data.created_at}}
            <router-link :to="{name:'singel',params:{id:data.id}}">Visit</router-link>
        </li>
        </ul>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data(){
        return{
            datad:{
                id:0,
                name:'N/A',
                stock:'N/A',
                created_at:'N/A'
            },
        }
    },
    created(){
        var ed=this;
        console.log('maontedsys');
        axios.get('http://127.0.0.1:8000/api/show').then(function(resp){
            ed.datad=resp.data.data;
            console.log(resp.data);
        }).catch(function (err) {
            ed.datad=err;
            console.log(err);
        })
    },
}
</script>