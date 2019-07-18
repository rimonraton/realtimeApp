<template>
	<v-container>
	  	<form @submit.prevent="submit">
    	    <v-text-field
    	      v-model="form.name"
    	      label="Category"
    	      type="text"
    	      required
    	    ></v-text-field>
    	    <v-btn color="orange" type="submit" v-if="editSlug">Update</v-btn>
    	    <v-btn color="green" type="submit" v-else>Create</v-btn>
	  	</form>
  		<v-card>
  		  <v-toolbar color="primary" dense>
  		    <v-toolbar-title>
  		     Category
  		    </v-toolbar-title>
  		  </v-toolbar>
  		  <v-list>
  		  	<div v-for="category in categories" :key="category.id">
	  		    <v-list-tile>
	  		    	<v-list-tile-action>
	  		    	  <v-btn icon small @click="editCategory(category)">
	  		    	  	<v-icon color="orange">edit</v-icon>
	  		    	  </v-btn>
	  		    	</v-list-tile-action>
	  		      <v-list-tile-content>
	  		        <v-list-tile-title>{{ category.name }}</v-list-tile-title>
	  		      </v-list-tile-content>
	  		      <v-list-tile-action>
	  		    	  <v-btn icon small @click="destroy(category.slug)">
	  		    	  	<v-icon color="red">delete</v-icon>
	  		    	  </v-btn>
	  		    	</v-list-tile-action>
	  		    </v-list-tile>
	  		    <v-divider></v-divider>
	  		</div>
  		  </v-list>
  		</v-card>

	</v-container>
</template>

<script>
export default {

  name: 'createCategory',

  data () {
    return {
    	form:{
    		name:null
    	},
    	categories:{},
    	editSlug:null
    }
  },
  created(){
  	User.admin() ? '' : this.$router.push('/forum')
  	axios.get('/api/category')
  	.then(res => {
  		this.categories = res.data.data
  		console.log(this.categories)
  	} )
  },
  methods:{
  	submit(){
  		this.editSlug ? this.update() : this.create()
	},
	create(){
		axios.post('/api/category', this.form)
	  	.then(res => {
	  		this.categories.unshift(res.data)
	  		this.form.name = null
	  	})
	},
	update(){
		axios.patch(`/api/category/${this.editSlug}`, this.form)
	  	.then(res => {
	  		this.categories.unshift(res.data)
	  		this.form.name = null
	  		this.editSlug = null
	  	})
	},
	destroy(slug, index){
		axios.delete(`/api/category/${slug}`)
		.then(res => this.categories.splice(index, 1))
	},
	editCategory(category){
		this.form.name = category.name
		this.editSlug = category.slug
		this.categories.splice(category, 1)
	}

  },

}
</script>

<style lang="css" scoped>
</style>