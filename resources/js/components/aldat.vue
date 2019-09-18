<template>
    <div>
       <div v-show="loading"> <img src="http://127.0.0.1:8000/loading.gif" width='50px' alt=""></div>
        <ul v-if='datad'>
        <li v-for="data in datad" v-bind:key='data.id'>{{data.id}} {{data.name}} {{data.stock}} {{data.created_at}}
            <router-link :to="{name:'singel',params:{id:data.id}}">Visit</router-link>
        </li>
        </ul>
    </div>
</template>
<script>
function seters(x,y,z) {
    return x+y+z
}
import axios from 'axios'
export default {
    data(){
        return{
            datad:{
                id:0,  
                name:'N/A',
                stock:'N/A',
                created_at:'N/A',
                nad:''
            },
            loading:true,
        }
    },
    created(){
        
        var ed=this;
        
       console.log(seters(12,3,1))
        console.log('maontedsys');
        ed.loading=true;
        axios.get('http://127.0.0.1:8000/api/show').then(function(resp){
            ed.datad=resp.data.data;
            console.log(resp.data);
            ed.loading=false;
        }).catch(function (err) {
            ed.datad=err;
            console.log(err);
        })
    },
}
</script>