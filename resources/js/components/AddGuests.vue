<template>
    <div class="row mb-4">
        <div class="col-md-6 offset-md-3">
            <form @submit.prevent="addGuest">
            <div class="form-group">
                <input type="text" class="form-control"
                placeholder="guest name"
                v-model="name"
                >
            </div>
            <div class="form-group">
                <input type="email" class="form-control"
                placeholder="guest email address"
                v-model="email"
                >
            </div>
            <div class="form-group">
                <input type="text" class="form-control"
                placeholder="body"
                v-model="body"
                >
            </div>
            <button class="btn btn-block btn-info" type="submit">Save</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'AddGuests',
    data(){
        return {
            name: null,
            email: null,
            body: null
        }
    },
    methods: {
        addGuest(){
            let newGuest = {
                name : this.name,
                email: this.email,
                body: this.body
            };

            axios.post('api/signatures',newGuest)
            .then( res => {
                alert(res.data.message);
                //reset
                this.name = null;
                this.email = null;
                this.body = null;
                this.$emit('guest-added-event');
            })
            .catch( err => console.log(err));

        }
    }

}
</script>

<style scoped>
h2{
    text-align: center;
}
</style>
