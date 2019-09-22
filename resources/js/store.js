import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
const state={
  title:''
}
const getters={

}
const mutations={
    CHANGE_TITLE(state,title){
      state.title=title
    }
}
const action={

}
export default new Vuex.Store({
  state,
  getters,
  mutations,
  action
})