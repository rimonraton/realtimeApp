<template>
	<v-container>
	  	<form @submit.prevent="login">
	  	    <v-text-field
	  	      v-model="form.email"
	  	      label="Email"
	  	      data-vv-name="email"
	  	      type="email"
	  	      required
	  	    ></v-text-field>
	  	    <v-text-field
	  	      v-model="form.password"
	  	      label="Password"
	  	      data-vv-name="password"
	  	      type="password"
	  	      required
	  	    ></v-text-field>

	  	    <v-btn color="green" type="submit">submit</v-btn>
	  	    <v-btn >clear</v-btn>
	    	</form>
	</v-container>
</template>

<script>
export default {

  name: 'Login',

  data () {
    return {
    	form : {
    		email:null,
    		password:null
    	}
    }
  },
  methods:{
  	login(){
  		User.login(this.form)
  	}

  }
}
</script>

<style lang="css" scoped>
</style>