<template>
	<div>
		<reply 
		  v-for="(reply, index) in content" 
		  :data="reply"
		  :key="reply.id"
		  :index=index
		  v-if="question"
		  ></reply>
	</div>
</template>

<script>
import Reply from './reply'

export default {
  props:['question'],

  components:{Reply},

  name: 'replies',

  data () {
    return {
    	content:this.question.replies
    }
  },
  created(){
  	this.listen()
  },
  methods:{
  	listen(){
  		EventBus.$on('newReply', (reply) =>{
	  		this.content.unshift(reply)
	  		window.scrollTo(0,0)
	  	})

	  	EventBus.$on('deleteReply', (index) =>{
	  		axios.delete(`/api/question/${this.question.slug}/reply/${this.content[index].id}`)
	  		.then(res => {
	  			this.content.splice(index, 1)
	  		})
	  	})
  	}
  }
}
</script>

<style lang="css" scoped>
</style>