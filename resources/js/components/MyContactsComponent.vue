<template>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-success">
              <div class="card-body text-center text-white">
                <strong>CONTACTOS</strong>
              </div>
            </div>


              <table class="table mt-3">
              <thead class="thead-dark">

                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Email</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col">Acciones</th>
                </tr>

              </thead>
              <tbody>

                  <table-component v-for= "(contact,index)  in contacts"  :key="contact.id" :contact = "contact" @delete ="deleteContact(index)"></table-component>

              </tbody>
            </table>

          
          
            <form-component @new="addContact"></form-component>


              



        </div>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
           this.getContacts();
        },
        
        data(){
          return{
            contacts: []
          }
        },
        methods:{
          getContacts(){
           var urlContacts= "contacts";
           axios.get(urlContacts).then(response=>{
            this.contacts = response.data
           });   

          },


           deleteContact(index){
              this.contacts.splice(index,1);
             },

           addContact(contact){
                this.contacts.unshift(contact);
            },   


      
       }

    }
</script>

