<template>
  <div id="row">
      <div v-for="guest in guests" :key="guest.id">
          <div class="card mb-3">
              <div class="card-body">
                  <div class="card-title">
                      {{guest.name}}
                  </div>
                  <div class="card-text">
                      <p>{{guest.email}}</p>
                      <p>{{guest.body}}</p>
                  </div>
              </div>
          </div>
      </div>

  </div>
</template>

<script>

export default {
    name: 'Guests',
    data(){
        return {

        }
    },
    props: {
        guests: Array
    }
}
</script>

<style scoped>
.card{
    border:2px darkcyan solid;
}
.card-title{
    color: green;
}

</style>
