<template>
	<v-container>
	  	<form @submit.prevent="create">
    	    <v-text-field
    	      v-model="form.title"
    	      label="Title"
    	      data-vv-name="title"
    	      type="title"
    	      required
    	    ></v-text-field>
    	    <v-autocomplete
    	      :items="categories"
    	      v-model="form.category_id"
    	      item-text="name"
    	      item-value="id"
    	      label="Category"
    	    ></v-autocomplete>
    	    <vue-simplemde v-model="form.body" />
    	    <v-btn color="green" type="submit">Create</v-btn>
	  	</form>
	</v-container>
	
</template>

<script>
	import VueSimplemde from 'vue-simplemde'
export default {

  name: 'create',

  data () {
    return {
    	form:{
    		title: null,
    		category_id: null,
    		body:null
    	},
    	categories:[],
    	errors:[]
    }
  },

  created(){
  	axios.get('/api/category')
  	.then(res => this.categories = res.data.data )
  },
  methods:{
  	create(){
  		axios.post('/api/question', this.form)
  		.then(res => this.$router.push(res.data.path))
  		.catch(error => this.errors = error.response.data.error)

  	}
  }
}
</script>

<style lang="css" scoped>
</style>