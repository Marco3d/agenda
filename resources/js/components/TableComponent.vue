<template>

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
    <tr v-for= "contact in contacts">
      <th scope="row">{{ contact.id}}</th>
      <td>{{ contact.name}}</td>
      <td>{{ contact.email}}</td>
      <td>{{ contact.phone}}</td>

      <td><button type="button" class="btn btn-success btn-sm">Editar</button>
          <button type="button" class="btn btn-danger btn-sm" v-on:click.prevent = "deleteContacts(contact)">Eliminar</button>
      </td>
    </tr>
  

  </tbody>
</table>

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

        deleteContacts(contact){
            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                var url = 'contacts/' + contact.id;
                      axios.delete(url).then(response =>{
                        this.getContacts();
                      });
                swal(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
              }
            })
         }
       }

    }
</script>









