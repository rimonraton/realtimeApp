<template>
	<v-container>
	  	<form @submit.prevent="signup">
	  	    <v-text-field
	  	      v-model="form.name"
	  	      label="Name"
	  	      data-vv-name="name"
	  	      type="text"
	  	      
	  	    ></v-text-field>
	  	    <v-text-field
	  	      v-model="form.email"
	  	      label="Email"
	  	      data-vv-name="email"
	  	      type="email"
	  	      
	  	    ></v-text-field>
	  	    <v-text-field
	  	      v-model="form.password"
	  	      label="Password"
	  	      data-vv-name="password"
	  	      type="password"
	  	      
	  	    ></v-text-field>
	  	    <v-text-field
	  	      v-model="form.password_confirmation"
	  	      label="Password"
	  	      data-vv-name="password"
	  	      type="password"
	  	      
	  	    ></v-text-field>

	  	    <v-btn color="green" type="submit">Sign Up</v-btn>
	  	    <router-link to='login'>
		        <v-btn color="blue">Login</v-btn>
		    </router-link>
	    	</form>
	</v-container>
</template>

<script>
export default {

  name: 'signup',

  data () {
    return {
    	form :{
    		name:null,
    		email:null,
    		password:null,
    		password_confirmation:null,
    	}

    }
  },
  created(){
  	if(User.loggedIn()){
  		this.$router.push({name:'forum'})
  	}
  },
  methods : {
  	signup(){
  		axios.post('/api/auth/signup', this.form)
  		.then(res => {
  			User.responseAfterLogin(res)
  			this.$router.push({name:'forum'})
  		})
  		.catch(error => console.log(error.response.data))

  	}
  }
}
</script>

<style lang="css" scoped>
</style>