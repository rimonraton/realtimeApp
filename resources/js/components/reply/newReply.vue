<template>
	<div class="mt-3">
		<vue-simplemde v-model="body" />
		<v-btn color="green" dark @click="submit">Reply</v-btn>
	</div>
</template>

<script>
export default {

  name: 'newReply',
  props:['questionSlug'],

  data () {
    return {
    	body:null
    }
  },
  methods:{
  	submit(){
  		axios.post(`/api/question/${this.questionSlug}/reply`, {body: this.body})
  		.then(res => {
  			this.body = '' 
  			EventBus.$emit('newReply', res.data.reply)
  		})
  	}
  }
}
</script>

<style lang="css" scoped>
</style>