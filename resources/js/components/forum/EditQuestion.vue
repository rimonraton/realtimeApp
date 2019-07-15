<template>
	<v-container fluid>
	  	<v-card>
	  	  <form @submit.prevent="update">
    	    <v-text-field
    	      label="Title"
    	      v-model="form.title"
    	      data-vv-name="title"
    	      type="title" 
    	      required
    	    ></v-text-field>
    	    <vue-simplemde v-model="form.body" />
    	    <v-card-actions>
    	      <v-btn icon slall type="submit">
				<v-icon color="teal">save</v-icon>
    	      </v-btn>
    	      <v-btn icon slall @click="cancelEdit">
				<v-icon >cancel</v-icon>
    	      </v-btn>
    	    </v-card-actions>
	  	</form>
	  	</v-card>
	</v-container>
</template>

<script>
export default {

  name: 'EditQuestion',
  props: ['data'],

  data () {
    return {
    	form:{
    		title: null,
    		body:null
    	},
    }
  },
  created(){
  	this.form = this.data
  },
  methods:{
  	cancelEdit(){
	  	EventBus.$emit('cancelEditing')
	},
	update(){
		axios.patch(`/api/question/${this.form.slug}`, this.form)
		.then(res => this.cancelEdit())
	}
  } 
  
}
</script>

<style lang="css" scoped>
</style>