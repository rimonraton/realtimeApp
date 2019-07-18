<template>
	<div class="mt-3">
		<v-card>
		  <v-card-title primary-title>
		    <div class="headline"> {{ data.user }}</div>
		    <div class="ml-2"> said {{ data.created_at }}</div>
		  </v-card-title>
		  <v-divider></v-divider>
		  <edit-reply 
		  v-if="editing"
		  :reply=data ></edit-reply>
		  <div v-else>
		  	<v-card-text v-html="reply" ></v-card-text>
		  	<v-divider></v-divider>
		  	<v-card-actions v-if="own">
		  	  <v-btn icon small @click="edit">
		  	  	<v-icon color="orange">edit</v-icon>
		  	  </v-btn>
		  	  <v-btn icon small @click="destroy">
		  	  	<v-icon color="red">delete</v-icon>
		  	  </v-btn>
		  	</v-card-actions>
		  </div>
		  
		</v-card>
	</div>
</template>

<script>
import EditReply from './editReply'

export default {
  props:['data', 'index'],	

  components:{EditReply},

  name: 'reply',

  data () {
    return {
    	editing:false
    }
  },

  computed:{
  	own(){
  		return User.own(this.data.user_id)
  	},
  	reply(){
  		return md.parse(this.data.reply)
  	},
  },
  created(){
  	this.listen()
  },
  methods:{
  	destroy(){
  		EventBus.$emit('deleteReply', this.index)
  	},
  	edit(){
  		this.editing=true
  	},
  	listen(){
  		EventBus.$on('cancelEditReply', () => {
  			this.editing=false
  		})
  	}
  }
}
</script>

<style lang="css" scoped>
</style>