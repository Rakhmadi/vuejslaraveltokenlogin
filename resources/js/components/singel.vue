<template>
    <div>
       <p>{{datas.id}}</p>
       <p>{{datas.name}}</p>
       <p>{{datas.stock}}</p>
       <p>{{datas.created_at}}</p>
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
            }
        }
    },
  mounted() {
      console.log('mounted');
  },
  created(){
      var  v=this;
      axios.get(`http://127.0.0.1:8000/api/singel/${this.$route.params.id}`).then(function(res) {
          v.datas=res.data;
          console.log(res.data);
      }).catch(function(err) {
          v.datas=err;
          console.log(err);
      })
  },
}
</script>