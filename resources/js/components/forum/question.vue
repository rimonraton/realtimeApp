<template>
	<v-card class="mt-2">
	  <v-card-title primary-title>
	  	<div>
	  		<h3 class="headline mb-0">
	  			<router-link :to="data.path">
	  				{{ data.title }}
	  			</router-link>
	  		</h3>
	  		<div class="grey--text">
	  			{{ data.user }} said {{ data.created_at }}
	  		</div>
	  	</div>
	  </v-card-title>
	  <v-card-text v-html="body">
	  </v-card-text>
	</v-card>
</template>

<script>
export default {

  	name: 'question',
	props:['data'],
	computed:{
	  	body(){
	  		return md.parse(this.data.body)
	  	}
	}
}
</script>

<style lang="css" scoped>
</style>