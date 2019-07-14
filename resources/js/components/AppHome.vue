<template>
	<div>
		<toolbar></toolbar>
		<router-view></router-view>
		<app-footer></app-footer>
	</div>
</template>

<script>
import toolbar from './Toolbar';
import AppFooter from './AppFooter';
import Login from './Login/Login';
import Forum from './forum/forum';
export default {

  name: 'AppHome',
  components:{toolbar, AppFooter, Login},

  data () {
    return {

    }
  }
}
</script>

<style lang="css" scoped>
</style>