<template>
<div>
     <input type="text" v-model="name">
     <input type="text" v-model="password">
     <button v-on:click='login'>Login</button>
     <br><p style="color:red" v-text="day.name"></p>
     <p style="color:red" v-text="day.password"></p>
     <p style="color:red" v-text="day.msg"></p>
     <p style="color:blue" v-text="day.status"></p>
     <p style="color:blue" v-text="day.token"></p>
     <h2>---------------------------</h2>
     <input type="text" v-model="names">
     <input type="text" v-model="stock">
     <button @click='post'>saves</button>
     <br><p style="color:blue" v-text="msg.msg"></p>
</div>
</template>
<script>
axios.defaults.headers.common['Accept']='aplication/json';
    export default {
        data(){
            return{
                name:'',
                password:'',
                datasd:[],
                day:{
                    name:null,
                    password:null,
                    msg:null,
                    status:null,
                    token:null,
                },
                names:'',
                stock:'',
                msg:{
                    msg:null
                }
                               
                               }
        },
        methods:{
            login(){
                var rt=this;
                axios.post('api/login',{
                    name:this.name,
                    password:this.password
                }).then(function (response) {
                    rt.day = response.data;
                    console.log(response.data);
                    if (rt.day.status === 'success') {
                        alert('Loged')
                        window.localStorage.setItem('token', rt.day.token);
                    }
                })
                .catch(function (error) {
                    rt.day = error;
                });
            },
            post(){
                var n=this;
                var ns=window.localStorage.getItem('token');
                axios.post('api/post',{
                    name:this.names,
                    stock:this.stock,
                    api_token:ns
                },{
                    headers:{
                        'Accept':'application/json',
                        'Content-Type':'application/json'}
                        },{
                            params:{
                                api_token:''
                            }
                        }).then(function(resp){
                    n.msg=resp.data;
                    console.log(resp.data);
                    
                }).catch(function(error){
                    n.msg=error.response.status;
                     console.log(error.response.status);
                     if (error.response.status === 401) {
                         alert('Login terlebih dahulu')
                     }
                })                
            }
        },
        mounted() {
            console.log('Sys.mounted');
         
                }
    }
</script>
