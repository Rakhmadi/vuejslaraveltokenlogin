<template>
    <div>
         <div v-show="loading"> <img src="http://127.0.0.1:8000/loading.gif" width='50px' alt=""></div>
       <p>{{datas.id}}</p>
       <p>{{datas.name}}</p>
       <p>{{datas.stock}}</p>
       <p>{{datas.created_at}}</p>
       <img src="https://3.bp.blogspot.com/-Vcue-aRpaZU/Wi4atyGVy6I/AAAAAAAAAWg/t-GUrdbS-bY-R4OWuxRP3wMXoH2Nz0rFQCPcBGAYYCw/s1600/afdsfaefsdfaefa.png" width='100px' alt="">
    </div>
</template>
<script>
  import axios from 'axios'
export default {
    data() {
        return {
            datas:{
                id:0,
                name:'N/A',
                stock:'N/A',
                created_at:'N/A'
            },
            loading:true
        }
    },
  mounted() {
      console.log('mounted');
  },
  created(){
      var  v=this;
      v.loading=true;    
      axios.defaults.headers.common['Access-Control-Allow-Origin']='*';
      axios.get(`http://127.0.0.1:8000/api/singel/${this.$route.params.id}`).then(function(res) {
          v.datas=res.data;
          console.log(res.data);
          v.loading=false;    
      }).catch(function(err) {
          v.datas=err;
          console.log(err);
      })
      
  },
}
</script>