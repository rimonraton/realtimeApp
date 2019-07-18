<template>
	<div class="mt-3">
		<vue-simplemde v-model="reply.reply" />
		<v-card-actions>
	  	  <v-btn icon small @click="update">
	  	  	<v-icon color="green">save</v-icon>
	  	  </v-btn>
	  	  <v-btn icon small @click="cancel">
	  	  	<v-icon color="black">cancel</v-icon>
	  	  </v-btn>
	  	</v-card-actions>
		
	</div>
</template>

<script>
export default {

  name: 'editReply',

  props:['reply'],

  data () {
    return {
    }
  },
  methods:{
  	update(){
  		axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`, {body: this.reply.reply})
  		.then(res => this.cancel())
  	},
  	cancel(){
  		EventBus.$emit('cancelEditReply')
    	console.log(this.reply)
  	}
  }
}
</script>

<style lang="css" scoped>
</style>