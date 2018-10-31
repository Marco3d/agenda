<template>
  <div class="card mt-4">
          
    <div class="card-block">
      <div class="card-header text-center text-white bg-info"><h3>Ingreso datos</h3></div>
      <form action=""  class="p-3" v-on:submit.prevent="newContact()"  >
          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control"  v-model = "name">
          </div>
          
          <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control"  v-model = "email">
          </div>

          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control"  v-model = "phone">
          </div>
         
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      
    </div>
  </div>
</template>

<script>

     import toastr from 'toastr'

    export default {
        mounted() {
            console.log('Component mounted.')
        },

         data(){
          return{
            name:'',
            email:'',
            phone:'',
            contacts:[]
          
           
          }
        },

        methods: {


          reset(){

              this.name = '';
              this.email = '';
              this.phone = '';

            
          },



          newContact(){

             const params = {
             name: this.name,
             email: this.email,
             phone: this.phone,
             

               };

            
           axios.post('/contacts', params).then(response =>{


                 const contact = response.data;
                 this.$emit('new',contact);
                 this.reset();






           });



          }


        }


    }
</script>






