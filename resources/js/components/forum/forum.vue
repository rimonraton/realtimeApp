<template>
	<v-container fluid grid-last-md>
	  <v-layout row wrap>
	    <v-flex xs8>
	      <question
	      v-for="question in questions"
	      :key="question.path"
	      :data=question
	      ></question>
	    </v-flex>
	  </v-layout>
	</v-container>
</template>

<script>
import question from './question'
export default {
  name: 'forum',
  data () {
    return {
    	questions: {}
    }
  },
  components:{question},

  created(){
  	axios.get('/api/question')
  	.then(res => this.questions = res.data.data)
  	.catch(error => console.log(error.responses.data))
  }

  
}
</script>

<style lang="css" scoped>
</style>