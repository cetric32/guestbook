<template>
  <div>
      <h1>GuestBook</h1>
      <AddGuests @guest-added-event="getGuests"></AddGuests>
      <Guests :guests="guests"></Guests>
  </div>
</template>

<script>
import Guests from './Guests.vue';
import AddGuests from './AddGuests.vue';

import axios from 'axios';

export default {
    name: 'Signature',
    components: {
        Guests,
        AddGuests
    },
    data(){
        return {
            guests: {}
        }
    },
    methods: {
        getGuests(){
            axios.get('api/signatures').then(resp => {
            this.guests = resp.data;
            })
            .catch(err => console.log(err));
        }
    },
    created(){
        this.getGuests();
    }
}
</script>

<style scoped>
h1{
    text-align: center;
}
</style>
